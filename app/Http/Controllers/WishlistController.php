<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $productId)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first to add items to wishlist'
            ], 401);
        }

        // Check if user is a buyer
        if (!Auth::user()->isBuyer()) {
            return response()->json([
                'success' => false,
                'message' => 'Only buyers can add items to wishlist. Your role: ' . Auth::user()->role
            ], 403);
        }

        // Check if product exists
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }

        // Check if already in wishlist
        $existingWishlist = Wishlist::where('buyer_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($existingWishlist) {
            return response()->json([
                'success' => false,
                'message' => 'Product is already in your wishlist'
            ], 400);
        }

        // Add to wishlist
        Wishlist::create([
            'buyer_id' => Auth::id(),
            'product_id' => $productId
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product added to wishlist successfully'
        ]);
    }

    public function removeFromWishlist(Request $request, $productId)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first'
            ], 401);
        }

        // Remove from wishlist
        $wishlist = Wishlist::where('buyer_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if (!$wishlist) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found in wishlist'
            ], 404);
        }

        $wishlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from wishlist successfully'
        ]);
    }

    public function checkWishlistStatus($productId)
    {
        if (!Auth::check()) {
            return response()->json([
                'inWishlist' => false
            ]);
        }

        $inWishlist = Wishlist::where('buyer_id', Auth::id())
            ->where('product_id', $productId)
            ->exists();

        return response()->json([
            'inWishlist' => $inWishlist
        ]);
    }

    public function getWishlistCount()
    {
        if (!Auth::check()) {
            return response()->json([
                'count' => 0
            ]);
        }

        $count = Wishlist::where('buyer_id', Auth::id())->count();

        return response()->json([
            'count' => $count
        ]);
    }
}
