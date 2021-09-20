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
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('bookCategory', 'bookCategory.category', 'rack', 'bookcode')->latest()->get();

        // dd($books[0]->bookCategory[0]->category);

        return view('admin.book.index', [
            'books' => $books
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
            'publish_at' => 'required',
            'cover' => 'image',
        ]);

        // Save the cover
        if (!$request->file('cover')) {
            $data['cover'] = 'assets/book-cover/default-cover.png';
        } else {
            $image          = $request->file('cover');
            $fileName       = $data['title'] . '.' . $image->getClientOriginalExtension();
            $request->file('cover')->storeAs(
                'assets/book-cover',
                $fileName,
                'public'
            );
        }

        $data['slug'] = Str::slug($request->title) . '-' . Str::random(10);
        $book = Book::create([
            'title' => $data['title'],
            'publisher' => $data['publisher'],
            'author' => $data['author'],
            'rack_id' => $data['rack_id'],
            'description' => $data['description'],
            'cover' => $fileName,
            'slug' => $data['slug'],
            'publish_at' => $data['publish_at'],
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

        return redirect()->route('admin.book.index')->withToastSuccess("Berhasil menambahkan buku $request->title!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.book.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.book.edit', [
            'book' => $book,
            'categories' => Category::orderBy('name', 'asc')->get(),
            'racks' => Rack::orderBy('name', 'asc')->get(),
        ]);
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
        $data = $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'rack_id' => 'required',
            'description' => 'required',
            'publish_at' => 'required',
            'cover' => 'image',
        ]);

        // Save the cover
        if ($request->file('cover')) {
            Storage::delete($book->cover, 'public');
            $image          = $request->file('cover');
            $fileName       = $data['title'] . '.' . $image->getClientOriginalExtension();
            $request->file('cover')->storeAs(
                'assets/book-cover',
                $fileName,
                'public'
            );
        } else {
            $fileName = $book->cover;
        }

        $data['slug'] = Str::slug($request->title) . '-' . Str::random(10);
        $book->update([
            'title' => $data['title'],
            'publisher' => $data['publisher'],
            'author' => $data['author'],
            'rack_id' => $data['rack_id'],
            'description' => $data['description'],
            'cover' => $fileName,
            'slug' => $data['slug'],
            'publish_at' => $data['publish_at'],
        ]);

        // Update Kategori
        BookCategory::where('book_id', $book->id)->delete();
        for ($i = 0; $i < count($request->category_id); $i++) {
            BookCategory::create([
                'book_id' => $book->id,
                'category_id' => $request->category_id[$i]
            ]);
        }

        return redirect()->route('admin.book.index')->withToastSuccess("Berhasil mengubah buku $request->title!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $name = $book->title;
        BookCategory::where('book_id', $book->id)->delete();
        BookCode::where('book_id', $book->id)->delete();
        $book->delete();
        return redirect()->route('admin.book.index')->withToastSuccess("Berhasil menghapus buku $name!");
    }
}
