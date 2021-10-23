<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::with('bookCode.borrowed', 'bookCategory')->latest()->get();
        foreach ($books as $book) {
            $id = 0;
            foreach ($book->bookCode as $item) {
                $code[$book->id][] = $item->id;

                foreach ($item->borrowed as $borrow) {
                    if ($borrow->book_code_id == $code[$book->id][$id]) {
                        $borrows[$book->id][] = $item->borrowed;
                    }
                }
                $id += 1;
            }
        }

        return view('member.home', [
            'books' => $books,
            'borrows' => $borrows
        ]);
    }
}
