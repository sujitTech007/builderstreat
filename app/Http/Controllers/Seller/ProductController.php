<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::where('seller_id', Auth::id())->with('category')->paginate(10);
        return view('sellerdashboard.products.index', compact('products'));
    }

    
    public function create()
    {
        $user = Auth::user();

        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'paid') // or 'active' depending on your enum values
            ->whereDate('end_date', '>=', now()) // check subscription not expired
            ->first();

        if (!$subscription) {
            return redirect()->route('seller.products.index');
                // ->with('success', 'Please buy a valid subscription plan before listing your product.');
        }

        $categories = Category::all();
        return view('sellerdashboard.products.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'nullable',
        //     'price' => 'required',
        //     'category_id' => 'required',
        //     'stock' => 'required',
        //     'image' => 'nullable',
        // ]);

        $data = $request->all();
        $data['seller_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/products'), $imageName);
            $data['image'] = 'assets/images/products/' . $imageName;
        }

        Product::create($data);
        return redirect()->route('seller.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $this->authorizeSeller($product);
        $categories = Category::all();
        return view('sellerdashboard.products.show', compact('product','categories'));
    }

    public function edit(Product $product)
    {
        $this->authorizeSeller($product);
        $categories = Category::all();
        return view('sellerdashboard.products.edit', compact('product', 'categories'));
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->authorizeSeller($product);
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'nullable',
        //     'price' => 'required|numeric',
        //     'category_id' => 'required|exists:categories,id',
        //     'stock' => 'required|integer',
        //     'image' => 'nullable|image|max:2048',
        // ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/products'), $imageName);
            $data['image'] = 'assets/images/products/' . $imageName;
        }
        $product->update($data);
        return redirect()->route('seller.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorizeSeller($product);
        $product->delete();
        return redirect()->route('seller.products.index')->with('success', 'Product deleted successfully.');
    }

    private function authorizeSeller(Product $product)
    {
        if ($product->seller_id !== Auth::id()) {
            abort(403);
        }
    }
}
