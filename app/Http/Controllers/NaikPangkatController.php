<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pangkat;
use App\Models\NaikPangkat;
use Illuminate\Http\Request;

class NaikPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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



    public function naikPangkatMenu()
    {
        return view('pegawai.pns.kenaikan.naik_pangkat.menu');
    }

    public function pangkatStrutural()
    {
        $user = auth()->id();
        $user = NaikPangkat::where('user_id', $user)->get();
        return view('pegawai.pns.kenaikan.naik_pangkat.eselon_struktural.riwayat',compact('user'));
    }

    public function tambahStruktural()
    {
        $pangkat = Pangkat::get();
        return view('pegawai.pns.kenaikan.naik_pangkat.eselon_struktural.create', [
            'user' => User::where('users.id','=',auth()->user()->id)->join('kepegawaians','kepegawaians.user_id','=','users.id')
            ->first(),
            'pangkat' => $pangkat,
        ]);
    }

    public function pangkatPelaksanaStaf()
    {
        $user = auth()->id();
        $user = NaikPangkat::where('user_id', $user)->get();
        return view('pegawai.pns.kenaikan.naik_pangkat.pelaksana_staf.riwayat',compact('user'));
    }

    public function tambahPelaksanaStaf()
    {
        $pangkat = Pangkat::get();
        return view('pegawai.pns.kenaikan.naik_pangkat.pelaksana_staf.create', [
            'user' => User::where('users.id','=',auth()->user()->id)->join('kepegawaians','kepegawaians.user_id','=','users.id')
            ->first(),
            'pangkat' => $pangkat,
        ]);
    }

    //Naik Pangkat PNS Jabatan Pelaksana/Staf Penyesuaian Ijazah :
    public function pangkatPeStafijazah()
    {
        $user = auth()->id();
        $user = NaikPangkat::where('user_id', $user)->get();
        return view('pegawai.pns.kenaikan.naik_pangkat.pelaksana_staf_ijazah.riwayat',compact('user'));
    }

    public function tambahPSI()
    {
        $pangkat = Pangkat::get();
        return view('pegawai.pns.kenaikan.naik_pangkat.pelaksana_staf_ijazah.create', [
            'user' => User::where('users.id','=',auth()->user()->id)->join('kepegawaians','kepegawaians.user_id','=','users.id')
            ->first(),
            'pangkat' => $pangkat,
        ]);
    }

    //Naik Pangkat PNS Jabatan Fungsional Tertentu :
    public function naikPangkatFt()
    {
        $user = auth()->id();
        $user = NaikPangkat::where('user_id', $user)->get();
        return view('pegawai.pns.kenaikan.naik_pangkat.fungsional_tertentu.riwayat',compact('user'));
    }

    public function tambahFt()
    {
        $pangkat = Pangkat::get();
        return view('pegawai.pns.kenaikan.naik_pangkat.fungsional_tertentu.create', [
            'user' => User::where('users.id','=',auth()->user()->id)->join('kepegawaians','kepegawaians.user_id','=','users.id')
            ->first(),
            'pangkat' => $pangkat,
        ]);
    }
}
