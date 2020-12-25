<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('admin.pages.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'id_buku' => 'required|string|unique:buku',
            'judul_buku' => 'required|string',
            'pengarang' => 'required|string',
            'penerbit' => 'required|string',
            'th_terbit' => 'required|numeric',
        ]);

        Book::create([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'th_terbit' => $request->th_terbit,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book = Book::firstWhere('id_buku', $book->id_buku);

        return view('admin.pages.books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // Validasi
        $request->validate([
            'judul_buku' => 'required|string',
            'pengarang' => 'required|string',
            'penerbit' => 'required|string',
            'th_terbit' => 'required|numeric',
        ]);

        $book = Book::where('id_buku', $book->id_buku)
                    ->update([
                        'judul_buku' => $request->judul_buku,
                        'pengarang' => $request->pengarang,
                        'penerbit' => $request->penerbit,
                        'th_terbit' => $request->th_terbit,
                    ]);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book = Book::find($book->id_buku);
        $book->delete();

        return redirect()->route('books.index');
    }
}
