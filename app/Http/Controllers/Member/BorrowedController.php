<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowedController extends Controller
{
    public function index()
    {
        $loan_data = Borrowing::with('book_code.book', 'review')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('member.borrowed.index', compact('loan_data'));
    }

    public function rating(Request $request, Borrowing $borrowing)
    {
        dd($request);
    }
}
