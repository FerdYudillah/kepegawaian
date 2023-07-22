<?php

namespace App\Http\Controllers;

use Hash;
use Alert;
use App\Models\Anak;
use App\Models\User;
use App\Models\Pangkat;
use App\Models\SuamiIstri;
use App\Models\Kepegawaian;
use App\Models\NaikPangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('pegawai.admin.index', compact('user'));
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
    public function show($id)
    {
        $user = User::find($id);
        return view('pegawai.admin.profile-pegawai.view',compact('user'));
    }

    public function showPegawai(User $user)
    {

        $user=User::with('anak_pns')->find(auth()->user()->id);
        // dd($user);
        return view('pegawai.pns.view',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = User::find(auth()->user()->id);
        return view('pegawai.pns.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    }

    //Function Update Data Pribadi PNS
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nohp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'email' => 'required',
            'status_kawin' => 'required',
            'pendidikan' => 'required',
            'jumlah_anak' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'no_rek' => 'required',
            'npwp' => 'required',
            'no_bpjs' => 'required',
            'no_karsu' => 'required',
        ]);

        // dd($request);
        $user = User::find($id);
        $user->update([
            'nip' => $request->nip,
            'name' => $request->name,
            't_lahir' => $request->t_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'nohp' => $request->nohp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'email' => $request->email,
            'status_kawin' => $request->status_kawin,
            'pendidikan' => $request->pendidikan,
            'jumlah_anak' => $request->jumlah_anak,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'no_rek' => $request->no_rek,
            'npwp' => $request->npwp,
            'no_bpjs' => $request->no_bpjs,
            'no_karsu' => $request->no_karsu,
            'password' => is_null($request->password) ? $user->password : Hash::make($request->password),
        ]);

        Alert::success('Sukses', 'Update Data Pegawai Berhasil');
        return redirect()->route('show.pegawai');

    }

    //Function Update Data Kepegawaian PNS
    public function updateKepegawaian(Request $request, $id)
    {
        $request->validate([
            'pangkat' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'jenis_jabatan' => 'required',
            'status_pegawai' => 'required',
            'masa_kerja' => 'required',
            'gaji' => 'required',
            'satuan_kerja' => 'required',
            'nomor_sk_cpns' => 'required',
            'tgl_sk_cpns' => 'required',
            'nomor_sk_pns' => 'required',
            'tgl_sk_pns' => 'required',
            'no_karpeg' => 'required',
        ]);

        $user = Kepegawaian::updateOrCreate(['user_id' => $request->id]);
        $user->pangkat = $request->pangkat;
        $user->golongan = $request->golongan;
        $user->jabatan = $request->jabatan;
        $user->jenis_jabatan = $request->jenis_jabatan;
        $user->status_pegawai = $request->status_pegawai;
        $user->masa_kerja = $request->masa_kerja;
        $user->gaji = $request->gaji;
        $user->satuan_kerja = $request->satuan_kerja;
        $user->nomor_sk_cpns = $request->nomor_sk_cpns;
        $user->tgl_sk_cpns = $request->tgl_sk_cpns;
        $user->nomor_sk_pns = $request->nomor_sk_pns;
        $user->tgl_sk_pns = $request->tgl_sk_pns;
        $user->no_karpeg = $request->no_karpeg;
        $user->save();

        Alert::success('Sukses', 'Update Data Pegawai Berhasil');
        return back();
    }

    public function updateSI (Request $request)
    {
        $request->validate([
            'nama_si' => 'required',
            'status_si' => 'required',
            'pekerjaan' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
            'umur' => 'required',
            'no_hp' => 'required',
        ]);

        $user = SuamiIstri::updateOrCreate(['user_id' => $request->id]);
        $user->nama_si = $request->nama_si;
        $user->status_si = $request->status_si;
        $user->pekerjaan = $request->pekerjaan;
        $user->t_lahir = $request->t_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->status_tunjangan = $request->status_tunjangan;
        $user->umur = $request->umur;
        $user->no_hp = $request->no_hp;
        $user->save();

        Alert::success('Sukses', 'Update Data Suami/Istri Berhasil');
        return back();
    }

    public function createAnak()
    {
        return view('pegawai.pns.anak.input_anak');
    }

    public function anakCreate(Request $request)
    {
        $request->validate([
            'nama_anak' => 'required',
            'status_anak' => 'required',
            'umur' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
        ]);

            $user = Anak::updateOrCreate(['user_id' => $request->id]);
            $user->nama_anak = $request->nama_anak;
            $user->status_anak = $request->status_anak;
            $user->umur = $request->umur;
            $user->t_lahir = $request->t_lahir;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->status_tunjangan = $request->status_tunjangan;
            $user->save();

            Alert::success('Sukses', 'Data Anak Berhasil Ditambahkan');
            return back();

    }

    public function editAnak($id)
    {
        // Anak::findOrFail($id);
        // dd(Anak);
        $user = auth()->id();
        // $anak = Anak::where('user_id', $user)->get();
        $anak = Anak::where('id', $id)->where('user_id', $user)->first();
        return view('pegawai.pns.anak.edit_anak', compact('anak'));
    }

    public function updateAnak(Request $request, $id)
    {
        $request->validate([
            'nama_anak' => 'required',
            'status_anak' => 'required',
            'umur' => 'required',
            't_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_tunjangan' => 'required',
        ]);

            $data = [
                'nama_anak' => $request->input('nama_anak'),
                'status_anak' => $request->input('status_anak'),
                'umur' => $request->input('umur'),
                't_lahir' => $request->input('t_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'status_tunjangan' => $request->input('status_tunjangan'),
            ];
            Anak::where('id',$id)->update($data);

            Alert::success('Sukses', 'Data Anak Berhasil Diupdate');
            return redirect()->route('show.pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchPadaringan(){
        set_time_limit(60);
        $token='5270c4c4b3308e7938692bbf04c00716';
        $response = Http::get('https://padaringan.bkpsdm.tapinkab.go.id/api/pns/',[
            'token'=>$token,
            'nip'=>auth()->user()->nip,
            'timeout' => 60.0,
        ],60);
        $data = $response->json();
        $user = User::find(auth()->user()->id);
        $db['nip']=$data['nip'];
        $db['name']=$data['nama_lengkap'];
        $db['t_lahir']=$data['tpt_lahir'];
        $db['tgl_lahir']=$data['tgl_lahir'];
        $db['jenis_kelamin']=$data['gender'];
        $db['alamat']=$data['alamat'];
        $db['nohp']=$data['hp'];
        $db['agama']=$data['agama'];
        $db['status_kawin']=$data['status_perkawinan'];
        $db['email']=$data['email'];
        $user->update($db);
        // dd($db);
        $dbpg['status_pegawai']=$data['status_kepegawaian'];
        $dbpg['jabatan']=$data['jabatan'];
        $dbpg['jenis_jabatan']=$data['jenis_jabatan'];
        $dbpg['pangkat']=$data['pangkat'];
        $dbpg['golongan']=$data['golongan'];
        $dbpg['nomor_sk_cpns']=$data['nomor_sk_cpns'];
        $dbpg['tgl_sk_cpns']=$data['tgl_sk_cpns'];
        $dbpg['nomor_sk_pns']=$data['nomor_sk_pns'];
        $dbpg['tgl_sk_pns']=$data['tgl_sk_pns'];
        $dbpg['satuan_kerja']=$data['satuan_kerja'];
        $user->kepegawaian_pns()->update($dbpg);

        // $dbsi['nama_si']=$data['nama_pasangan'];
        // $dbsi['t_lahir']=$data['tpt_lahir_pasangan'];
        // $dbsi['tgl_lahir']=$data['tgl_lahir_pasangan'];
        // $user->suami_istri()->update($dbsi);
        // dd($dbsi);
        return redirect()->back();
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

    public function changePassword(User $user)
    {
        // $user = User::findOrFail($user->id);
        $user = User::findOrFail(auth()->user()->id);
        return view('user.edit_pass', compact('user'));
    }

    public function updatePassword (Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $user->update([
            'password' => is_null($request->password) ? $user->password : Hash::make($request->password),
        ]);



        Alert::success('Sukses', 'Email Atau Password Berhasil Diupdate');
        return redirect()->route('home');
    }

}
