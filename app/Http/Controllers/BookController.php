<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::select();
        if ($request->has('sort-by') && $request->input('sort-by') == '') {
            $books = $books->orderBy($request->input('sort-by'));
        }
        if ($request->has(key: 'filter-by-date') && $request->input('filter-by-date') != '') {
            $wholeDate = explode(' - ', $request->input('filter-by-date'));
            $startDate = date('Y-m-d', strtotime($wholeDate[0]));
            $endDate = date('Y-m-d', strtotime($wholeDate[1]));

            $books = $books
                ->where('published_date', '>=', $startDate, 'and')
                ->where('published_date', '<=', $endDate);
        }

        $books = $books->get();

        return view('books.index', ['books' => $books]);
    }

    /**
     * Display a single resource.
     */
    public function show(Book $book)
    {
        return view('books.detail', ['book' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.add');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->safe()->all();
        $cloudinaryResponse = cloudinary()
            ->uploadApi()
            ->upload($request->file('cover_file')->getRealPath());

        $book = new Book([
            'cover_id' => $cloudinaryResponse['public_id'],
            'title' => $validated['title'],
            'author' => $validated['author'],
            'publisher' => $validated['publisher'],
            'published_date' => $validated['published_date'],
            'description' => $validated['description'],
        ]);


        if ($book->save()) {
            return redirect()->route('books.index');
        } else {
            return redirect()->route('books.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->safe()->all();

        if ($request->hasFile('cover_file')) {
            cloudinary()->adminApi()->deleteAssets($book->cover_id);
            $cloudinaryResponse = cloudinary()
                ->uploadApi()
                ->upload($request->file('cover_file')->getRealPath());

            $book->update([
                'cover_id' => $cloudinaryResponse['public_id']
            ]);
        }

        $updated = $book->update([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'publisher' => $validated['publisher'],
            'published_date' => $validated['published_date'],
            'description' => $validated['description'],
        ]);

        if ($updated) {
            return redirect()->route('books.show', ['book' => $book]);
        } else {
            return redirect()->route('books.edit', ['book' => $book]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        cloudinary()->adminApi()->deleteAssets($book->cover_id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
