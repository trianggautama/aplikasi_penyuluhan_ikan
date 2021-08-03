@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Agenda Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            Detail Penyuluhan
                        </div>
                        <div class="col-md text-right">
                            <a href="{{Route('userAdmin.penyuluhan.index')}}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td width="20%">Nama Pelatihan</td>
                            <td width="2px">:</td>
                            <td>{{$data->nama_penyuluhan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Keterangan</td>
                            <td width="2px">:</td>
                            <td>{{$data->keterangan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Lampiran</td>
                            <td width="2%">: </td>
                            <td><a href="{{asset('lampiran/penyuluhan/'.$data->lampiran)}}"
                                    class="btn btn-sm btn-primary"><i class="fa fa-paperclip"></i> Lampiran</a>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">Penyuluh</td>
                            <td width="2%">:</td>
                            <td>{{$data->penyuluh->user->nama}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Kelurahan - Kecamatan</td>
                            <td width="2px">:
                            </td>
                            <td>{{$data->kelurahan->nama_kelurahan}}
                                {{$data->kelurahan->kecamatan->nama_kecamatan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Tanggal Pelaksanaan</td>
                            <td width="2px">:</td>
                            <td>{{carbon\carbon::parse($data->tgl_mulai)->translatedFormat('d F Y')}} -
                                {{carbon\carbon::parse($data->tgl_selesai)->translatedFormat('d F Y')}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Tempat pelatihan</td>
                            <td width="2px">:</td>
                            <td>{{$data->tempat_pelatihan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Jumlah Peserta</td>
                            <td width="2px">: </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="20%">Status Pelatihan</td>
                            <td width="2px">:</td>
                            <td>
                                {!! $data->status !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Peserta Pelatihan
                </div>
                <div class="card-body">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Pelatihan</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat,tanggal lahir</th>
                                <th>Jenis kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->peserta as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->penyuluhan->nama_penyuluhan}}</td>
                                <td>{{$d->nik}}</td>
                                <td>{{$d->nama}}</td>
                                <td>{{$d->tempat_lahir}},
                                    {{carbon\carbon::parse($d->tanggal_lahir)->translatedFormat('d F Y')}}</td>
                                <td>{{$d->jenis_kelamin}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection