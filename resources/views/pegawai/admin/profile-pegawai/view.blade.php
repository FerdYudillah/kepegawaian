@extends('layouts.new_app')
<title>SI-KMK | Profile PNS - Satpol PP & Damkar Tapin</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Data Pribadi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Data Kepegawaian</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Data Keluarga</button>
                        </li>

                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        @include('pegawai\admin\profile-pegawai\tab_pane\tab_pribadi')
                        @include('pegawai\admin\profile-pegawai\tab_pane\tab_kepegawaian')
                        @include('pegawai\admin\profile-pegawai\tab_pane\tab_keluarga')
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
