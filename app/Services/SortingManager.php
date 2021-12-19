<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Http\Request;

class SortingManager
{
    /// need to finish validation for from < to
    public function sort(Request $request)
    {
        $from = $request->price_from;
        $to = $request->price_to;
        $sortBy = $request->sortBy;

        if ($from === null || $to === null) {
            $books = Book::orderBy('price', $sortBy)->paginate(12);
            return $books;
        }


        return Book::whereBetween('price', [$from, $to])->orderBy('price', $sortBy)->paginate(12);

    }


}
