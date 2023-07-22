@extends('layouts.new_app')
<title>SI-KMK | Usul kenaikan Pangkat PNS Jabatan Pelaksana/Staf - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Usul Kenaikan Pangkat PNS Jabatan Pelaksana/Staf</strong></h3>
                    <p>Silahkan Isi Data yang diperlukan</p>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                         <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nip" class="form-label">NIP</label>
                                <input class="form-control " type="text" id="nip" name="nip" value="{{ $user->nip }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama PNS</label>
                                <input class="form-control " type="text" id="name" name="name" value="{{ $user->name }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Tempat, Tanggal lahir</label>
                                <div class="d-flex">
                                    <input class="form-control" name="t_lahir" value="{{ $user->t_lahir }}" readonly/>
                                    <p>,</p>
                                    <input class="form-control" type="date"  name="tgl_lahir" value="{{ $user->tgl_lahir }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input class="form-control " type="text" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="golongan" class="form-label">Golongan</label>
                                <input class="form-control " type="text" id="golongan" name="golongan" value="{{ $user->golongan }}" readonly/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="pangkat_lama" class="form-label text-primary">Pangkat Lama</label>
                                <input class="form-control" type="text" id="pangkat_lama" name="pangkat_lama" value="{{ $user->pangkat }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gaji_id" class="form-label text-info">Pangkat Baru</label>
                                <select name="pangkat_id" class="form-select @error('pangkat_id') is-invalid @enderror">
                                    <option value="" selected disabled>---Pilih Pangkat Baru---</option>
                                          @foreach ($pangkat as $pang)
                                              @if (old('pangkat_id') == $pang->pangkat_id)
                                              <option value="{{ $pang->id_pangkat }}">{{ $pang->nama_pangkat }}</option>
                                              @else
                                              <option value="{{ $pang->id_pangkat }}">{{ $pang->nama_pangkat }}</option>
                                              @endif
                                          @endforeach
                                </select>
                                @error('gaji_id')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                 @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                <input class="form-control" type="text" id="masa_kerja" name="masa_kerja" value="{{ $user->masa_kerja }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="mulai_tanggal" class="form-label">Mulai Tanggal</label>
                                <input class="form-control @error('mulai_tanggal') is-invalid @enderror" type="date" id="mulai_tanggal" name="mulai_tanggal" value="{{ old('mulai_tanggal') }}" />
                                @error('mulai_tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>

                            <div class="mb-3 col-md-6 mb-4">
                                <label for="naik_selanjutnya" class="form-label">Tanggal Kenaikan Selanjutnya</label>
                                <input class="form-control @error('naik_selanjutnya') is-invalid @enderror" type="date" id="naik_selanjutnya" name="naik_selanjutnya" value="{{ old('naik_selanjutnya') }}" />
                                @error('naik_selanjutnya')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>
                        <p><h5><strong>Surat Pengantar :</strong></h5></p>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="sk_pangkat_terakhir"> SK Kenaikan Pangkat Terakhir</label>
                                    <input type="file" class="form-control col-4 @error('sk_pangkat_terakhir') is-invalid @enderror" id="sk_pangkat_terakhir" name="sk_pangkat_terakhir" >
                                    @error('sk_pangkat_terakhir')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="skp_2021"> SKP 2021</label>
                                    <input type="file" class="form-control col-4 @error('skp_2021') is-invalid @enderror" id="skp_2021" name="skp_2021" >
                                    @error('skp_2021')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="skp_2022"> SKP 2022</label>
                                    <input type="file" class="form-control col-4 @error('skp_2022') is-invalid @enderror" id="skp_2022" name="skp_2022" >
                                    @error('skp_2022')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_cpns"> SK CPNS</label>
                                    <input type="file" class="form-control col-4 @error('sk_cpns') is-invalid @enderror" id="sk_cpns" name="sk_cpns" >
                                    @error('sk_cpns')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_pns"> SK PNS</label>
                                    <input type="file" class="form-control col-4 @error('sk_pns') is-invalid @enderror" id="sk_pns" name="sk_pns" >
                                    @error('sk_pns')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sttp_prajabatan"> STTP Diklat Prajabatan</label>
                                    <input type="file" class="form-control col-4 @error('sttp_prajabatan') is-invalid @enderror" id="sttp_prajabatan" name="sttp_prajabatan" >
                                    @error('sttp_prajabatan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="serti_lulus_dinas"> Sertifikat Tanda Lulus Ujian Dinas</label>
                                    <input type="file" class="form-control col-4 @error('serti_lulus_dinas') is-invalid @enderror" id="serti_lulus_dinas" name="serti_lulus_dinas" >
                                    @error('serti_lulus_dinas')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="karpeg">Kartu pegawai</label>
                                    <input type="file" class="form-control col-4 @error('karpeg') is-invalid @enderror" id="karpeg" name="karpeg" >
                                    @error('karpeg')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_pemangku_pelaksana"> SK Pemangku Jabatan Pelaksana</label>
                                    <input type="file" class="form-control col-4 @error('sk_pemangku_pelaksana') is-invalid @enderror" id="sk_pemangku_pelaksana" name="sk_pemangku_pelaksana" >
                                    @error('sk_pemangku_pelaksana')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                           </div>
                            <p><h5><strong>Pencatuman Gelar Pendidikan bagi yang memiliki ijazah baru dan belum tercantum di SK Kenaikan pangkat Terakhir :</strong></h5></p>
                            <div class="mb-3 col-md-6">
                                <label for="surat_belajar">Surat Belajar</label>
                                    <input type="file" class="form-control col-4 @error('surat_belajar') is-invalid @enderror" id="surat_belajar" name="surat_belajar" >
                                    @error('surat_belajar')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_tugas_belajar">SK Tugas Belajar</label>
                                    <input type="file" class="form-control col-4 @error('sk_tugas_belajar') is-invalid @enderror" id="sk_tugas_belajar" name="sk_tugas_belajar" >
                                    @error('sk_tugas_belajar')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="ijazah_transkrip">Ijazah & Transkrip Nilai Terakhir</label>
                                    <input type="file" class="form-control col-4 @error('ijazah_transkrip') is-invalid @enderror" id="ijazah_transkrip" name="ijazah_transkrip" >
                                    @error('ijazah_transkrip')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="surat_gelar">Surat Pencantuman Gelar</label>
                                    <input type="file" class="form-control col-4 @error('surat_gelar') is-invalid @enderror" id="surat_gelar" name="surat_gelar" >
                                    @error('surat_gelar')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <hr class="dropdown-divider">
                            <div class="mb-3 col-md-6">
                                <label for="sk_henti_jafung">SK Pemberhentian Jafung</label>
                                    <input type="file" class="form-control col-4 @error('sk_henti_jafung') is-invalid @enderror" id="sk_henti_jafung" name="sk_henti_jafung" >
                                    @error('sk_henti_jafung')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_henti_struktural">SK Pemberhentian Struktural</label>
                                    <input type="file" class="form-control col-4 @error('sk_henti_struktural') is-invalid @enderror" id="sk_henti_struktural" name="sk_henti_struktural" >
                                    @error('sk_henti_struktural')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_pmk">SK PMK</label>
                                    <input type="file" class="form-control col-4 @error('sk_pmk') is-invalid @enderror" id="sk_pmk" name="sk_pmk" >
                                    @error('sk_pmk')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sk_mutasi">SK Mutasi</label>
                                    <input type="file" class="form-control col-4 @error('sk_mutasi') is-invalid @enderror" id="sk_mutasi" name="sk_mutasi" >
                                    @error('sk_mutasi')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="tgl_usulan" class="form-label">Tanggal Diusulkan</label>
                                <input class="form-control @error('tgl_usulan') is-invalid @enderror" type="date" id="tgl_usulan" name="tgl_usulan" value="{{ old('tgl_usulan') }}" />
                                @error('tgl_usulan')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                             @enderror
                            </div>
                        </div>
                         <button type="submit" class="btn btn-info ">Simpan</button>
                         <a href="{{ route('menu.pangkat.pestaf') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
