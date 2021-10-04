<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function verifIndex()
    {
        $members = Member::with('user')->where('status', 'MENUNGGU')->orWhere('status', 'DITOLAK')->latest()->get();
        // dd($members);

        return view('admin.member.verif_index', [
            'members' => $members
        ]);
    }

    public function verifShow(User $user)
    {
        return view('admin.member.verif_show', [
            'user' => $user
        ]);
    }

    public function verifUpdate(User $user, Request $request)
    {

        if ($request->description) {
            $data['description'] = $request->description;
        }

        if ($request->status == "true") {
            $data['status'] = "AKTIF";
            $user->member->update($data);
            return redirect()->route('admin.member.verif.index')->withToastSuccess("Akun $user->name diaktifkan");
        } else {
            $data['status'] = "DITOLAK";
            $user->member->update($data);
            return redirect()->route('admin.member.verif.index')->withToastSuccess("Akun $user->name ditolak");
        }
    }
}
