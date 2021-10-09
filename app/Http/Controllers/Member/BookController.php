<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookCode;
use App\Models\Borrowing;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show(Book $book)
    {
        $book->load('bookCategory', 'bookCode');


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

        // Book Code
        $book_codes = BookCode::with('borrowed')->where('book_id', $book->id)->get();

        // Total buku tersedia
        $qty_books = 0;
        foreach ($book_codes as $code) {
            if (!$code->borrowed) {
                $qty_books++;
            }
        }

        foreach ($book_codes as $code) {
            $id[] = $code->id;
        }

        if (isset(Auth::user()->id)) {
            $is_borrowed = (bool) Borrowing::where('user_id', Auth::user()->id)->where('book_code_id', $id)->first();
        } else {
            $is_borrowed = false;
        }

        return view('member.book.show', [
            'book' => $book,
            'books' => $books,
            'categories' => $categories,
            'book_codes' => $book_codes,
            'is_borrowed' => $is_borrowed,
            'qty_books' => $qty_books,
        ]);
    }

    public function borrow(Book $book, Request $request)
    {
        $this->validate($request, [
            'book_code_id' => 'required'
        ]);

        Borrowing::create([
            'user_id' => Auth::user()->id,
            'book_code_id' => $request->book_code_id,
        ]);

        return redirect()->route('book.show', $book->slug)->with('success', 'Silahkan bawa buku dan mendatangi petugas di lobby untuk konfirmasi peminjaman. Terimakasih');
    }
}
