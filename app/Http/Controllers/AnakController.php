<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use Illuminate\Http\Request;
use Alert;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->id();
        $anak = anak::where('user_id', $user)->get();
        return view('pegawai.pns.view',compact('anak'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_anak' => 'required',
            'status_anak' => 'required',
            'umur' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        Anak::create($validateData);
        Alert::success('Sukses', 'Data Anak Berhasil Ditambahkan');
        return redirect()->route('show.pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
