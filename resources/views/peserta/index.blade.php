@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Peserta</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Peserta</a></li>
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
                            <td>-</td>
                        </tr>
                        <tr>
                            <td width="24%">Jabatan</td>
                            <td width="2%">:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td width="24%">Tempat, tanggal lahir</td>
                            <td width="2%">:</td>
                            <td>-
                            </td>
                        </tr>
                        <tr>
                            <td width="24%">Jenis kelamin</td>
                            <td width="2%">:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td width="24%">Alamat</td>
                            <td width="2%">:</td>
                            <td>-</td>
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
                <form action="{{route('userPeserta.profil.update',1)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="card-body">
                            < <div class="form-group">
                        <label for="">Nik</label>
                        <input type="text" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tempat lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <label for="">Jenis Kelamin</label>
                    <div class="row mb-2">
                        <div class="col-md">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-laki"
                                    class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="foto" class="form-control" required>
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