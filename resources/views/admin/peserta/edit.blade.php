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
                <form action="{{Route('userAdmin.penyuluhan.update',1)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Pelatihan</label>
                            <select name="" id="" class="form-control">
                                <option value="" >- pilih pelatihan -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nik</label>
                            <input type="text" name="kode_kecamatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama_kecamatan" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="">Tempat lahir</label>
                                    <input type="text" name="kode_kecamatan" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md"> 
                                <div class="form-group">
                                    <label for="">Tanggal lahir</label>
                                    <input type="date" name="kode_kecamatan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <label for="">Jenis Kelamin</label>
                        <div class="row mb-2">
                            <div class="col-md">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="jk" value="Laki-laki"
                                        class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio1">Laki-laki</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="jk" value="Perempuan"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" name="nama_kecamatan" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{Route('userAdmin.peserta.index')}}" class="btn btn-outline-primary"
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