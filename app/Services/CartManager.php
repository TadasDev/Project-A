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
                    "title" => $book->title,
                    "quantity" => 1,
                    "price" => $book->price,
                ]
            ];
            session()->put('cart', $cart);

        } elseif (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

        } else {
            $cart[$id] = [
                "name" => $book->title,
                "quantity" => 1,
                "price" => $book->price,
            ];
            session()->put('cart', $cart);
        }
    }
}
