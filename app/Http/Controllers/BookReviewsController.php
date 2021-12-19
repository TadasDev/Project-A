<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookReviewsController extends Controller
{
    public function store(StoreReviewRequest $request, $id)
    {
        $book = Book::find($id);

        $book->reviews()->create([
            'comment' => $request->review,
            'user_id' => Auth::id(),
        ]);

//        $reviews = $book->reviews()->get()->take(5);

        return redirect()->back()->with('message', 'Review added');

    }

}
