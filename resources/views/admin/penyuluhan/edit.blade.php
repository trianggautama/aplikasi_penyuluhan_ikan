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
                <form action="{{Route('userAdmin.penyuluhan.update',$data->id)}}" enctype="multipart/form-data"
                    method="POST">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Pelatihan</label>
                            <input type="text" name="nama_penyuluhan" value="{{$data->nama_penyuluhan}}"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input value="{{$data->keterangan}}" type="text" name="keterangan" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Penyuluh</label>
                            <select name="penyuluh_id" id="" class="form-control" required>
                                <option value="">- pilih penyuluh -</option>
                                @foreach($penyuluh as $p)
                                <option value="{{$p->id}}" {{$p->id == $data->penyuluh_id ? 'selected' : ''}}>
                                    {{$p->user->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kelurahan</label>
                            <select name="kelurahan_id" id="" class="form-control" required>
                                <option value="">- pilih kelurahan -</option>
                                @foreach($kelurahan as $k)
                                <option value="{{$p->id}}" {{$p->id == $data->kelurahan_id ? 'selected' : ''}}>
                                    {{$k->nama_kelurahan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai</label>
                                    <input name="tgl_mulai" value="{{$data->tgl_mulai}}" type="date"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal Selesai</label>
                                    <input value="{{$data->tgl_selesai}}" type="date" name="tgl_selesai"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Pelatihan</label>
                            <input value="{{$data->tempat_pelatihan}}" type="text" name="tempat_pelatihan"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Lampiran</label>
                            <input type="file" name="lampiran" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
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