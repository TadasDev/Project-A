<?php

namespace App\Services;

use App\Models\Book;

class CartManager
{
    public function addToCart($id)
    {

        $book = Book::findorfail($id);

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    'book' => $book,
                    'quantity' => 1
                ]
            ];
            session()->put('cart', $cart);

        } elseif (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

        } else {
            $cart[$id] = [
                'book' => $book,
                'quantity' => 1
            ];
            session()->put('cart', $cart);
        }
    }
}
