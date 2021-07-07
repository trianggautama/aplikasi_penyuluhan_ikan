@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Agenda Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    form edit
                </div>
                <form action="{{Route('userAdmin.penyuluhan.update',1)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pelatihan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Payuluh</label>
                            <select name="" id="" class="form-control">
                                <option value="">- pilih penyuluh -</option>
                                @foreach($penyuluh as $p)
                                    <option value="{{$p->id}}">{{$p->user->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kelurahan</label>
                            <select name="" id="" class="form-control">
                                <option value="">- pilih kelurahan -</option>
                                @foreach($kelurahan as $k)
                                    <option value="{{$p->id}}">{{$k->nama_kelurahan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai</label>
                                    <input type="date" name="kode_kecamatan" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai</label>
                                    <input type="date" name="kode_kecamatan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Pelatihan</label>
                            <input type="text" name="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Lampiran</label>
                            <input type="file" name="nama_kecamatan" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{Route('userAdmin.penyuluhan.index')}}" class="btn btn-outline-primary"
                            data-dismiss="modal">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection