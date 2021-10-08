<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rack.index', [
            'racks' => Rack::orderBy('name')->get()
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
        $data = $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
        ]);

        $data['slug'] = Str::slug($request->name) . '-' . Str::random(10);

        Rack::create($data);
        return redirect()->route('admin.rack.index')->withToastSuccess("Berhasil menambahkan rak $request->name!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function show(Rack $rack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function edit(Rack $rack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rack $rack)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
        ]);

        $data['slug'] = Str::slug($request->name) . '-' . Str::random(10);

        $rack->update($data);
        return redirect()->route('admin.rack.index')->withToastSuccess("Berhasil mengubah rak $request->name!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rack $rack)
    {
        $name = $rack->name;
        $rack->delete();
        return redirect()->route('admin.rack.index')->withToastSuccess("Berhasil menghapus rak $name!");
    }
}
