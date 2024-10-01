<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [$id => ["product_id" => $product->id, "quantity" => 1]];
            session()->put('cart', $cart);
            session()->regenerate();
            return $cart;
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            session()->regenerate();
            return $cart;
        }
        // if item not exist in cart then add to cart with quantity = 1
        if (!isset($cart[$id])) {
            $cart[$id] = ["product_id" => $product->id, "quantity" => 1];
            session()->put('cart', $cart);
            session()->regenerate();
            return $cart;
        }
    }
    public function deleteItem($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->regenerate();
            return "Removed";
        }
    }

    public function addItem($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->regenerate();
            session()->put('cart', $cart);
            return $cart;
        }
    }
    public function decreaseItem($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] >= 2) {
                $cart[$id]['quantity']--;
                session()->put('cart', $cart);
                session()->regenerate();
                return $cart;
            }
        }
    }
}
