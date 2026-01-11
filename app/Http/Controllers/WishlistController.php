<?php
namespace App\Http\Controllers;

use App\Models\Product;

class WishlistController extends Controller
{
public function index()
{
    $products = auth()->user()->wishlists()
        ->with(['category', 'images', 'primaryImage'])
        ->latest('wishlists.created_at')
        ->paginate(12);

    return view('wishlist.index', compact('products'));
}


public function toggle(Product $product)
{
    $user = auth()->user();

    if ($user->hasInWishlist($product)) {
        $user->wishlists()->detach($product->id);
        $message = 'Produk dihapus dari wishlist.';
    } else {
        $user->wishlists()->attach($product->id);
        $message = 'Produk ditambahkan ke wishlist!';
    }

    return redirect()->back()->with('success', $message);
}
}
