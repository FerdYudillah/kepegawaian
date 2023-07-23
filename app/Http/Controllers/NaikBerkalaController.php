<?php

namespace App\Http\Controllers;

use App\Models\FileNaikBerkala;
use App\Models\Gaji;
use App\Models\NaikBerkala;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class NaikBerkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexPegawai()
    {

        $user = auth()->id();
        $naikBerkala = NaikBerkala::where('user_id', $user)->get();
        return view('pegawai.pns.kenaikan.naik_gaji_berkala.riwayat',compact('naikBerkala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gaji = Gaji::get();
        return view('pegawai.pns.kenaikan.naik_gaji_berkala.create', [
            'user' => User::where('users.id','=',auth()->user()->id)->join('kepegawaians','kepegawaians.user_id','=','users.id')
            ->first(),
            'gaji' => $gaji,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function simpanData(Request $request)
    {
        $validateData = $request->validate([
            'gaji_id' => 'required',
            'mulai_tanggal' => 'required',
            'naik_selanjutnya' => 'required',
            'tgl_usulan' => 'required',
            'sk_berkala_terakhir' => 'required|max:2048',
            'sk_cpns' => 'required|max:2048',
        ]);


        

        if($request->file('sk_berkala_terakhir')){
            $fileModel = new FileNaikBerkala();
            $fileName = time().'_'.$request->file('sk_berkala_terakhir')->getClientOriginalName();
            $filePath = $request->file('sk_berkala_terakhir')->storeAs('uploads/skbt', $fileName, 'public');
            $fileModel->file_berkas_path = '/storage/' . $filePath;
            $fileModel->file_berkas=$fileName;
            $fileModel->user_id=$request->idUser;
            $fileModel->save();
        }

        if($request->file('sk_cpns')){
            $fileModel = new FileNaikBerkala();
            $fileName = time().'_'.$request->file('sk_cpns')->getClientOriginalName();
            $filePath = $request->file('sk_cpns')->storeAs('uploads/sk-cpns', $fileName, 'public');
            $fileModel->file_berkas_path = '/storage/' . $filePath;
            $fileModel->file_berkas=$fileName;
            $fileModel->user_id=$request->idUser;
            $fileModel->save();
        }

        $validateData['user_id'] = auth()->user()->id;
        NaikBerkala::create($validateData);
        Alert::success('Sukses', 'Email Atau Password Berhasil Diupdate');
        return redirect()->route('index.berkala');
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
        //
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
