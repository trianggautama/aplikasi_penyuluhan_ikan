@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peserta Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Peserta Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show</li>
        </ol>
    </div>

    <div class="row mb-3"> 
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    @if($data->foto)
                        <img src="{{asset('lampiran/foto-peserta/'. $data->foto)}}" alt="" width="100%">
                    @else
                        <img src="{{asset('user.jpg')}}" alt="" width="100%">
                    @endif
                    <a href="{{Route('report.kartu_peserta',$data->id)}}" class="btn btn-primary btn-block mt-2"><i class="fa fa-prin"></i>Cetak kartu peserta</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            Detail Biodata
                        </div>
                        <div class="col-md text-right">
                            <a href="{{Route('userPenyuluh.penyuluhan_penyuluh.show',$data->penyuluhan_id)}}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td width="24%">Nama Pelatihan</td>
                            <td width="2%">:</td>
                            <td>{{$data->penyuluhan->nama_penyuluhan}}</td>
                        </tr>
                        <tr>
                            <td width="24%">NIK</td>
                            <td width="2%">:</td>
                            <td>{{$data->nik}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Nama</td>
                            <td width="2%">:</td>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Tempat, tanggal lahir</td>
                            <td width="2%">:</td>
                            <td>{{$data->tempat_lahir}},
                                {{carbon\carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y')}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Jenis kelamin</td>
                            <td width="2%">:</td>
                            <td>{{$data->jenis_kelamin}}</td>
                        </tr>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection