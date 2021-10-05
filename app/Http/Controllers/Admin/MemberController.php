<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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


    public function index()
    {
        $members = Member::with('user')->where('status', 'AKTIF')->latest()->get();

        return view('admin.member.index', [
            'members' => $members
        ]);
    }

    public function create()
    {
        return view('admin.member.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name) . '-' . Str::random(30),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('member');

        // File Photo
        if ($request->file('photo')) {
            $image          = $request->file('photo');
            $fileNamePhoto       = $request->name . '.' . $image->getClientOriginalExtension();
            $request->file('photo')->storeAs(
                'assets/profil',
                $fileNamePhoto,
                'public'
            );
        } else {
            $fileNamePhoto = null;
        }

        // File Id Card
        if ($request->file('photoIdCard')) {
            $image          = $request->file('photoIdCard');
            $fileNameId       = $request->name . '.' . $image->getClientOriginalExtension();
            $request->file('photoIdCard')->storeAs(
                'assets/ID Card',
                $fileNameId,
                'public'
            );
        } else {
            $fileNameId = null;
        }

        Member::create([
            'user_id' => $user->id,
            'no_hp' => $request->no_hp,
            'address' => $request->address,
            'job' => $request->job,
            'photo' => $fileNamePhoto,
            'photo_IdCard' => $fileNameId,
            'status' => $request->status
        ]);

        return redirect()->route('admin.member.index')->withToastSuccess("$request->name ditambahkan sebagai member");
    }
}
