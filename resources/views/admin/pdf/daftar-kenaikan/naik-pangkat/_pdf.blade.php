<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Daftar PNS</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }
         td,
         th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
            tr:nth-child(even) {
            background-color: #dddddd;
            }
        .footer{
            position: fixed;
            bottom: 0;
            right: 0;
            height: 50px;
            text-align: right;
            font-size: 12px;
            color: #000;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">Laporan Daftar PNS</h2>
    <hr>
    <div>
    </div>
    <br>
    <table>
        <tr>
            <th>NO.</th>
            <th>NAMA PNS</th>
            <th>NIP</th>
            <th>JABATAN</th>
            <th>GOLONGAN</th>
            <th>PANGKAT LAMA</th>
            <th>PANGKAT BARU</th>
            <th>TANGGAL DIUSULKAN</th>
        </tr>
    @php
    $no = 1;
    @endphp
    @foreach ($naikPangkat as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->user_pegawai->nip }}</td>
            <td>{{ $item->user_pegawai->name }}</td>
            <td>{{ $item->user_pegawai->kepegawaian_pns->jabatan }}</td>
            <td>{{ $item->user_pegawai->kepegawaian_pns->golongan }}</td>
            <td>{{ $item->user_pegawai->kepegawaian_pns->pangkat }}</td>
            <td>{{ $item->pangkat_pns->nama_pangkat }}</td>
            <td>{{ $item->tgl_usulan }}</td>
        </tr>
    @endforeach
    </table>

    <div style="display: flex;">
        <div style="float: right;margin-right: 4rem;">
            <br>
            <br>
            <br>
            <br>
            <br>
            <p>Kepala Satuan <br>Drs. H. Mahyudin, M.Pd<br>Pembina UTama Muda/IVc<br>NIP. 196309161992031011</p>
        </div>
    </div>
    {{-- <div style="position: fixed;
    bottom: 500px;
    right: 400px;
    height: 50px;
    text-align: right;
    font-size: 12px;
    color: #000;">
        <p>test</p>
    </div> --}}
</body>
 </html>
