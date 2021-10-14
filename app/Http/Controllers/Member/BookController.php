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
        $book->load(['bookCategory' => function ($query) {
            return $query->with('category');
        }], 'bookCode');


        // Book Code
        $book_codes = BookCode::with('borrowed')->where('book_id', $book->id)->where('on_loan', 0)->get();

        // Book Rekomendasi        
        $books = BookCategory::with('book')->where('category_id', $book->bookCategory[0]->category_id)->where('book_id', '<>', $book->id)->get();

        // Rekomendasi Kategori
        $categories = Category::with('book')->withCount('book')->orderBy('book_count', 'desc')->get();


        $book_code_borrowed = BookCode::with('borrowed')->where('book_id', $book->id)->where('on_loan', 1)->first();
        if (isset(Auth::user()->id) && $book_code_borrowed != null) {
            $is_borrowed = (bool) Borrowing::where('user_id', Auth::user()->id)->where('book_code_id', $book_code_borrowed->id)->first();
        } else {
            $is_borrowed = false;
        }

        $total_borrow_user = Borrowing::where('user_id', Auth::user()->id)->where('return_at', null)->where('confirmed', 1)->get();
        if (count($total_borrow_user) > 1) {
            $is_borrowed = true;
        }

        return view('member.book.show', [
            'book' => $book,
            'books' => $books,
            'categories' => $categories,
            'book_codes' => $book_codes,
            'is_borrowed' => $is_borrowed,
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

        BookCode::where('id', $request->book_code_id)->update([
            'on_loan' => 1
        ]);

        return redirect()->route('book.show', $book->slug)->with('success', 'Silahkan bawa buku dan mendatangi petugas di lobby untuk konfirmasi peminjaman. Terimakasih');
    }
}
