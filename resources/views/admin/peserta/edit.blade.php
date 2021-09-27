@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peserta Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Peserta Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    form edit
                </div>
                <form action="{{Route('userAdmin.peserta.update',$data->id)}}" enctype="multipart/form-data"
                    method="POST">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Pelatihan</label>
                            <select name="penyuluhan_id" id="" class="form-control" required>
                                <option value="">- pilih pelatihan -</option>
                                @foreach ($penyuluhan as $d)
                                <option value="{{$d->id}}" {{$d->id == $data->penyuluhan_id ? 'selected' : ''}}>
                                    {{$d->nama_penyuluhan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nik</label>
                            <input value="{{$data->nik}}" type="text" name="nik" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input value="{{$data->nama}}" type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tempat lahir</label>
                                    <input value="{{$data->tempat_lahir}}" type="text" name="tempat_lahir"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal lahir</label>
                                    <input value="{{$data->tanggal_lahir}}" type="date" name="tanggal_lahir"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <label for="">Jenis Kelamin</label>
                        <div class="row mb-2">
                            <div class="col-md">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-laki"
                                        class="custom-control-input"
                                        {{$data->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan"
                                        {{$data->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <small class="text-danger">isi jika ingin merubah foto</small>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{$data->user->username}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-danger">isi jika ingin merubah password</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{Route('userAdmin.peserta.index')}}" class="btn btn-outline-primary"
                            data-dismiss="modal">Batal</a>
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