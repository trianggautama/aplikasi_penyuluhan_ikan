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
                            <a href="{{Route('userAdmin.penyuluhan.index')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                   </div>
                </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td width="20%">Nama Pelatihan</td>
                                <td width="2%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Keterangan</td>
                                <td width="2%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Lampiran</td>
                                <td width="2%">:</td>
                                <td><a href="" class="btn btn-sm btn-primary"><i class="fa fa-paperclip"></i> Lampiran</a></td>
                            </tr>
                            <tr>
                                <td width="20%">Penyuluh</td>
                                <td width="2%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Kelurahan - Kecamatan</td>
                                <td width="2%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Tanggal Pelaksanaan</td>
                                <td width="2%">:</td>
                                <td>1 Juli - 6 Juli 2021</td>
                            </tr>
                            <tr>
                                <td width="20%">Tempat pelatihan</td>
                                <td width="2%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Jumlah Peserta</td>
                                <td width="2%">:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td width="20%">Status Pelatihan</td>
                                <td width="2%">:</td>
                                <td><div class="badge badge-primary">belum mulai</div></td>
                            </tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection