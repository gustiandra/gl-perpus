<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('member.dashboard', [
            'user' => $user
        ]);
    }

    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('member.profile.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->name,
        ]);


        // File Photo
        if ($request->file('photo')) {
            Storage::delete('assets/profil/' . $user->member->cover, 'public');
            $image          = $request->file('photo');
            $fileNamePhoto       = $request->name . '.' . $image->getClientOriginalExtension();
            $request->file('photo')->storeAs(
                'assets/profil',
                $fileNamePhoto,
                'public'
            );
        } else {
            $fileNamePhoto = $user->member->photo;
        }

        // File Id Card
        if ($request->file('photoIdCard')) {
            Storage::delete('assets/ID Card/' . $user->member->cover, 'public');
            $image          = $request->file('photoIdCard');
            $fileNameId       = $request->name . '.' . $image->getClientOriginalExtension();
            $request->file('photoIdCard')->storeAs(
                'assets/ID Card',
                $fileNameId,
                'public'
            );
        } else {
            $fileNameId = $user->member->photo_IdCard;
        }

        $user->member->update([
            'no_hp' => $request->no_hp,
            'address' => $request->address,
            'job' => $request->job,
            'photo' => $fileNamePhoto,
            'photo_IdCard' => $fileNameId,
            'status' => 'MENUNGGU'
        ]);

        return redirect()->route('member.profile')->withToastSuccess("Profil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
