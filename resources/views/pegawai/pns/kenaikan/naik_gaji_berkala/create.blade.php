@extends('layouts.new_app')
<title>SI-KMK | Usul kenaikan Gaji Berkala - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Usul Kenaikan Gaji Berkala</strong></h3>
                    </div>
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
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Pangkat, Golongan</label>
                                <div class="d-flex">
                                    <input class="form-control" name="pangkat" value="{{ $user->pangkat }}" readonly/>
                                    <p>,</p>
                                    <input class="form-control"  name="golongan" value="{{ $user->golongan }}" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="gaji_lama" class="form-label">Gaji Lama</label>
                                <input class="form-control" type="text" id="gaji_lama" name="gaji_lama" value="{{ $user->gaji }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="gaji_id" class="form-label">Gaji Baru</label>
                                <select name="gaji_id" class="form-control @error('gaji_id') is-invalid @enderror">
                                    <option  value="">---Pilih Gaji Baru---</option>
                                        @foreach ($gaji as $item)
                                            @if (old('gaji_id') == $item->gaji_id)
                                                <option value="{{ $item->gaji_id }}" selected>{{ $item->gaji_pokok }}</option>
                                            @else
                                                <option value="{{ $item->gaji_id }}">{{ $item->gaji_pokok }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="masa_kerja" class="form-label">Masa Kerja</label>
                                <input class="form-control" type="text" id="masa_kerja" name="masa_kerja" value="{{ $user->masa_kerja }}" readonly/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="mulai_tanggal" class="form-label">Mulai Tanggal</label>
                                <input class="form-control" type="date" id="mulai_tanggal" name="mulai_tanggal" value="" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="naik_selanjutnya" class="form-label">Tanggal Kenaikan Selanjutnya</label>
                                <input class="form-control" type="date" id="naik_selanjutnya" name="naik_selanjutnya" value="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="foto">Fotocopy SK Berkala Terakhir</label>
                                    <input type="file" class="form-control col-4 " id="foto" name="foto" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="foto">SK CPNS</label>
                                    <input type="file" class="form-control col-4 " id="foto" name="foto" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="foto">SK Kenaikan Pangkat Terakhir</label>
                                    <input type="file" class="form-control col-4 " id="foto" name="foto" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="foto">SK Pemangku Jabatan</label>
                                    <input type="file" class="form-control col-4 " id="foto" name="foto" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="tgl_usulan" class="form-label">Tanggal Diusulkan</label>
                                <input class="form-control" type="date" id="tgl_usulan" name="tgl_usulan" value="" required/>
                            </div>
                        </div>
                         <button type="submit" class="btn btn-success ">Simpan</button>
                         <a href="{{ route('index.berkala') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
