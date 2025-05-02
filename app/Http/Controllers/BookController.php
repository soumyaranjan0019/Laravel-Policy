<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->price = $request->price;
        $book->user_id = Auth::id();

        $book->save();

        // Book::create([
        //     'title' => $request->title,
        //     'price' => $request->price,
        //     'user_id' => $request->user_id,
        // ]);

        return redirect()->route('books.index')
                         ->with('Success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Gate::authorize('view', $book);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book  = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Gate::authorize('update', $id);
        // if($request->user()->cannot('update', $id)){
        //     abort(403);
        // }

        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
        ]);

        $book  = Book::find($id);

        $book->title = $request->title;
        $book->price = $request->price;

        $book->save();

        return redirect()->route('books.index')->with('Success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Gate::authorize('delete', $book);

        $book->delete();
        return redirect()->route('books.index')->with('Success', 'Book deleted successfully.');
    }
}
