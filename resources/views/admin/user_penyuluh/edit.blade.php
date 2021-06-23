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
                    <div class="card-body">
                        <div class="form-group">
                                <label for="">NIP</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan </label>
                                <select name="kecamatan_id" id="" class="form-control">
                                    <option value="">- pilih jabatan -</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <label for="">Jenis Kelamin</label>
                            <div class="row mb-2">
                                <div class="col-md">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">First Radio</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Second Radio</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status </label>
                                <select name="kecamatan_id" id="" class="form-control">
                                    <option value="">- pilih status -</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pendidikan Terakhir </label>
                                <select name="kecamatan_id" id="" class="form-control">
                                    <option value="">- pilih pendidikan terakhir -</option>
                                </select>
                            </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{Route('userAdmin.penyuluh.index')}}" class="btn btn-outline-primary" data-dismiss="modal">Kembali</a>
                        <button type="button" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
          </div>
</div>
    @endsection
@section('script')
   
@endsection
