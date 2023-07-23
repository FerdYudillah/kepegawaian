<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;
use Alert;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $gaji = Gaji::all();
        return view('admin.master-data.data-gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master-data.data-gaji.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gaji = Gaji::create([
            'golongan' => $request->golongan,
            'masa_kerja' => $request->masa_kerja,
            'gaji_pokok' => $request->gaji_pokok,
            'tahun' => $request->tahun,
        ]);

        // dd($request);

        Alert::success('Sukses', 'Data Gaji Berhasil Ditambahkan');
        return redirect()->route('gaji.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        return view('admin.master-data.data-gaji.edit', compact('gaji'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'golongan' => 'required',
            'masa_kerja' => 'required',
            'gaji_pokok' => 'required',
            'tahun' => 'required',

        ]);

        // dd($request);
        $gaji = Gaji::find($id);
        $gaji->update([
            'golongan' => $request->golongan,
            'masa_kerja' => $request->masa_kerja,
            'gaji_pokok' => $request->gaji_pokok,
            'tahun' => $request->tahun
        ]);



        Alert::success('Info', 'Update Data Pegawai Berhasil');
        return redirect()->route('gaji.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->destroy($gaji->id);
        Alert::success('Hapus', 'Data Telah Berhasil Dihapus');
        return redirect()->route('gaji.index');
    }
}
