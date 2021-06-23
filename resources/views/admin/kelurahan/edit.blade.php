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
                            <label for="">Kecamatan</label>
                            <select name="kecamatan_id" id="" class="form-control">
                                <option value="">- pilih kecamatan -</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kelurahan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{Route('userAdmin.kecamatan.index')}}" class="btn btn-outline-primary" data-dismiss="modal">Kembali</a>
                        <button type="button" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>
          </div>
</div>
    @endsection
@section('script')
   
@endsection
