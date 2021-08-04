@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Penyuluh</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Penyuluh</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profil</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('user.jpg')}}" alt="" width="100%">
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
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#exampleModal" id="#myBtn">
                                <i class="fa fa-edit"></i> Edit Data
                            </button>
                            <a href="{{Route('userAdmin.peserta.index')}}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td width="24%">Nama </td>
                            <td width="2%">:</td>
                            <td>{{$user->nama}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Jabatan</td>
                            <td width="2%">:</td>
                            <td>{{$user->penyuluh->jabatan->nama_jabatan}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Tempat, tanggal lahir</td>
                            <td width="2%">:</td>
                            <td>{{$user->penyuluh->tempat_lahir}},
                                {{Carbon\carbon::parse($user->penyuluh->tanggal_lahir)->format('d - m - Y')}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Jenis kelamin</td>
                            <td width="2%">:</td>
                            <td>{{$user->penyuluh->jk}}</td>
                        </tr>
                        <tr>
                            <td width="24%">Alamat</td>
                            <td width="2%">:</td>
                            <td>{{$user->penyuluh->alamat}}</td>
                        </tr>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('userPenyuluh.profil.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
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
                                    <option value="{{$d->id}}"
                                        {{$user->penyuluh->jabatan_id == $d->id ? 'selected' : ''}}>
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
                                        <input type="date" name="tanggal_lahir"
                                            value="{{$user->penyuluh->tanggal_lahir}}" class="form-control" required>
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
                                    <option value="SD"
                                        {{$user->penyuluh->pendidikan_terakhir == 'SD' ? 'selected' :''}}>SD
                                    </option>
                                    <option value="SMP"
                                        {{$user->penyuluh->pendidikan_terakhir == 'SMP' ? 'selected' :''}}>
                                        SMP</option>
                                    <option value="SMA"
                                        {{$user->penyuluh->pendidikan_terakhir == 'SMA' ? 'selected' :''}}>
                                        SMA</option>
                                    <option value="S-1"
                                        {{$user->penyuluh->pendidikan_terakhir == 'S-1' ? 'selected' :''}}>
                                        S-1</option>
                                    <option value="S-2"
                                        {{$user->penyuluh->pendidikan_terakhir == 'S-2' ? 'selected' :''}}>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>

    @endsection
    @section('script')

    @endsection