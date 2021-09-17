<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookCode;
use App\Models\Category;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index', [
            'books' => Book::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create', [
            'categories' => Category::orderBy('name', 'asc')->get(),
            'racks' => Rack::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'rack_id' => 'required',
            'description' => 'required',
            'cover' => 'image',
        ]);

        $data['cover'] = $request->file('cover')->store('assets/book-cover', 'public');
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(10);
        $book = Book::create([
            'title' => $data['title'],
            'publisher' => $data['publisher'],
            'author' => $data['author'],
            'rack_id' => $data['rack_id'],
            'description' => $data['description'],
            'cover' => $data['cover'],
            'slug' => $data['slug'],
            'publish_at' => now(),
        ]);

        for ($i = 0; $i < count($request->category_id); $i++) {
            BookCategory::create([
                'book_id' => $book->id,
                'category_id' => $request->category_id[$i]
            ]);
        }

        for ($i = 0; $i < count($request->code) - 1; $i++) {
            BookCode::create([
                'book_id' => $book->id,
                'code' => $request->code[$i],
            ]);
        }

        return redirect()->route('admin.book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
