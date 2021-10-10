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
        $return_at = now();
        date_add($return_at, date_interval_create_from_date_string('4 weeks'));

        $borrow->update([
            'admin_id' => Auth::user()->id,
            'return_at' => $return_at,
            'confirmed' => 1
        ]);
        return redirect()->route('admin.borrow.verif.index')->withToastSuccess("Berhasil memverifikasi");
    }
}
