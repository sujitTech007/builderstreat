<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ProductController extends Controller
{

    
    public function index(Request $request)
    {
        // Optionally filter by seller
        $sellerId = $request->get('seller_id');
        $query = Product::with('category', 'seller');
        if ($sellerId) {
            $query->where('seller_id', $sellerId);
        }
        $products = $query->paginate(20);
        $sellers = User::where('role', 2)->get();
        
        return view('admin.products.index', compact('products', 'sellers', 'sellerId'));
    }

    public function updateStatus(Request $request, Product $product)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
        
        try {
            $product->status = $request->status;
            $product->save();
            
            // Check if request is AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product status updated successfully!',
                    'status' => $product->status,
                    'status_text' => $product->status == '1' ? 'Active' : 'Inactive'
                ]);
            }
            
            return back()->with('success', 'Product status updated!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update product status.'
                ], 500);
            }
            
            return back()->with('error', 'Failed to update product status.');
        }
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/products'), $imageName);
            $data['image'] = 'assets/images/products/' . $imageName;
        }
        $product->update($data);
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function sellerProducts($sellerId)
    {
        $seller = \App\Models\User::findOrFail($sellerId);
        $products = Product::with('category')->where('seller_id', $sellerId)->paginate(20);
        return view('admin.products.seller_products', compact('products', 'seller'));
    }
    
     public function orders(Request $request)
    {
        $orders = \App\Models\Order::with('product', 'buyer', 'seller')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.order', compact('orders'));
    }
    
} 