<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $book->load('bookCategory');


        // Book Rekomendasi
        $count['total'] = 0;
        foreach ($book->bookCategory as $item) {
            $cek = BookCategory::where('category_id', $item->category_id)->get();
            if (count($cek) > $count['total']) {
                $count['id'] = $item->category_id;
                $count['total'] = count($cek);
            }
        }
        $books = BookCategory::with('book')->where('category_id', $count['id'])->where('book_id', '<>', $book->id)->get();


        // Rekomendasi Kategori
        $categories = Category::with('book')->inRandomOrder()->limit(15)->get();

        return view('member.book.show', [
            'book' => $book,
            'books' => $books,
            'categories' => $categories
        ]);
    }
}
