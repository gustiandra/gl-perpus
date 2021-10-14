<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function verifIndex()
    {
        $loan_data = Borrowing::with(['book_code' => function ($query) {
            return $query->with('book');
        }])->where('confirmed', 0)->get();

        return view('admin.borrow.verif_index', [
            'loan_data' =>  $loan_data,
        ]);
    }

    public function verifUpdate(Borrowing $borrow)
    {
        $date_of_return = now();
        date_add($date_of_return, date_interval_create_from_date_string('4 weeks'));

        $borrow->update([
            'admin_id' => Auth::user()->id,
            'date_of_return' => $date_of_return,
            'confirmed' => 1
        ]);

        return redirect()->route('admin.borrow.verif.index')->withToastSuccess("Berhasil memverifikasi");
    }

    public function index()
    {
        $loan_data = Borrowing::where('return_at', null)->where('confirmed', 1)->with(['book_code' => function ($query) {
            return $query->with('book');
        }])->get();

        return view('admin.borrow.index', [
            'loan_data' => $loan_data
        ]);
    }

    public function returning_book(Borrowing $borrow)
    {
        $borrow->update([
            'return_at' => now(),
        ]);

        return redirect()->route('admin.borrow.index')->withToastSuccess("Buku Telah Dikembalikan!");
    }
}
