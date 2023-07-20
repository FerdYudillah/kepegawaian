<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;
use Alert;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pangkat = Pangkat::all();
        return view('admin.master-data.data-pangkat.index', compact('pangkat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master-data.data-pangkat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pangkat = Pangkat::create([
            'nama_pangkat' => $request->nama_pangkat,
        ]);

        Alert::success('Sukses', 'Data Pangkat Berhasil Ditambahkan');
        return redirect()->route('pangkat.index');
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
    public function edit($id)
    {
        $pangkat = Pangkat::where('id_pangkat', $id)->first();
        return view('admin.master-data.data-pangkat.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pangkat'=> 'required|unique:pangkats'
        ]);
        $data = [
            'nama_pangkat' => $request->input('nama_pangkat')
        ];
        Pangkat::where('id_pangkat',$id)->update($data);

        Alert::success('Info', 'Update Data Pangkat Berhasil');
        return redirect()->route('pangkat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pangkat::where('id_pangkat',$id)->delete();
        Alert::success('Info', 'Data Pangkat Telah Dihapus');
        return redirect()->route('pangkat.index');
    }
}
