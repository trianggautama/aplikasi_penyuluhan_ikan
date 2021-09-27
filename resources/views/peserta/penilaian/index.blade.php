@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Peserta ({{Auth::user()->peserta->nama}})</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Penilaian Peserta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{Route('report.penilaian_peserta',Auth::user()->peserta->id)}}" class="btn btn-info" target="__blank"><i class="fa fa-print"></i> Cetak Form Penilaian</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Objek Penilaian</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penilaian as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->objek_penilaian->uraian}}</td>
                                    <td>{{$d->nilai}}</td>
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