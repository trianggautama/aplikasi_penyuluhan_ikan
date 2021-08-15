@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Agenda Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{Route('report.penyuluhan_penyuluh')}}" class="btn btn-primary" target="__blank"> <i class="fa fa-print"></i> Cetak Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Nama Penyuluh</th>
                                    <th>Kelurahan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Status</th>
                                    <th>Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->nama_penyuluhan}}</td>
                                    <td>{{$d->penyuluh->user->nama}}</td>
                                    <td>{{$d->kelurahan->nama_kelurahan}}</td>
                                    <td>{{carbon\carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} -
                                        {{carbon\carbon::parse($d->tgl_selesai)->translatedFormat('d F Y')}}</td>
                                    <td>
                                        @if($d->status == 0)
                                            <div class="badge badge-warning">belum berlangsung</div>
                                        @elseif($d->status == 1)
                                            <div class="badge badge-primary">sedang berlangsung</div>
                                        @else
                                            <div class="badge badge-success">sudah lewat</div>
                                        @endif
                                    </td>
                                    <td>{{$d->peserta->count()}} Orang</td>
                                    <td>
                                            <a class="btn btn-sm btn-info"
                                                href="{{Route('userPenyuluh.penyuluhan_penyuluh.show',$d->id)}}"><i
                                                    class="fa fa-info-circle"></i>&nbsp;Show</a>
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection