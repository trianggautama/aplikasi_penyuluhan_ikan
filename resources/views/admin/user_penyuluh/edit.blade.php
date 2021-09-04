@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kecamatan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Kecamatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    form edit
                </div>
                <form action="{{route('userAdmin.penyuluh.update',$user->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">NIP</label>
                            <input type="text" name="nip" value="{{$user->penyuluh->nip}}" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" value="{{$user->nama}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan </label>
                            <select name="jabatan_id" id="" class="form-control" required>
                                <option value="">- pilih jabatan -</option>
                                @foreach ($jabatan as $d)
                                <option value="{{$d->id}}" {{$user->penyuluh->jabatan_id == $d->id ? 'selected' : ''}}>
                                    {{$d->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{$user->penyuluh->tempat_lahir}}"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{$user->penyuluh->tanggal_lahir}}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <label for="">Jenis Kelamin</label>
                        <div class="row mb-2">
                            <div class="col-md">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="jk" value="Laki-laki"
                                        class="custom-control-input"
                                        {{$user->penyuluh->jk == 'Laki-laki' ? 'checked' :''}}>
                                    <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="jk" value="Perempuan"
                                        class="custom-control-input"
                                        {{$user->penyuluh->jk == 'Perempuan' ? 'checked' :''}}>
                                    <label class="custom-control-label" for="customRadio2"></label>Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status </label>
                            <select name="status" id="" class="form-control" required>
                                <option value="">- pilih status -</option>
                                <option value="1" {{$user->status == 1 ? 'selected' :''}}>Aktif</option>
                                <option value="0" {{$user->status == 0 ? 'selected' :''}}>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Pendidikan Terakhir </label>
                            <select name="pendidikan_terakhir" id="" class="form-control" required>
                                <option value="">- pilih pendidikan terakhir -</option>
                                <option value="SMA" {{$user->penyuluh->pendidikan_terakhir == 'SMA' ? 'selected' :''}}>
                                    SMA</option>
                                <option value="S-1" {{$user->penyuluh->pendidikan_terakhir == 'S-1' ? 'selected' :''}}>
                                    S-1</option>
                                <option value="S-2" {{$user->penyuluh->pendidikan_terakhir == 'S-2' ? 'selected' :''}}>
                                    S-2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">username</label>
                            <input type="text" name="username" value="{{$user->username}}" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Isi jika ingin mengubah password">
                        </div>
                        <div class="form-group">
                            <label for="">Foto Penyuluh</label>
                            <input type="file" name="foto" class="form-control" required>
                            <small class="text-danger">Isi jika ingin mengubah foto</small>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{Route('userAdmin.penyuluh.index')}}" class="btn btn-outline-primary"
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