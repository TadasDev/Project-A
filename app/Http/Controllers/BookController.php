<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Services\SortingManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookController extends Controller
{
    private $sortingManager;

    public function __construct(
        SortingManager $sortingManager
    )
    {
        $this->sortingManager = $sortingManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book): View
    {
        $this->authorize('viewAny', $book);

        $books = Book::orderBy('created_at', 'desc')->paginate(12);

        return view('books.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(StoreBookRequest $request)
    {
        $user = Auth::user();
        $book = $user->books()->create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $path = $image->storePublicly('images', 'public');
                $book->images()->create([
                    'file_path' => $path
                ]);
            }
        }

        return redirect('/books')->with('message', 'Created new book successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show($id): View
    {
        $book = Book::find($id);

        return view('books.single', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect()->back()->with('message', 'Book Removed');

    }

    public function sortBy(SortRequest $request)
    {
        $books = $this->sortingManager->sort($request);

        return view('books.list', compact('books'));

    }

}
