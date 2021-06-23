@extends('layouts.main')
    @section('content')
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelurahan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Kelurahan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </div>

          <div class="row mb-3">
            <div class="col-md">
                <div class="card">
                    <div class="card-header text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                           <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kelurahan</th>
                                    <th>Nama Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <form action="{{ route('userAdmin.kelurahan.destroy','1') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning" href="{{Route('userAdmin.kelurahan.edit','1')}}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
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
                <div class="modal-body">
                    <form action="">
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
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan Data</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    @endsection
@section('script')
   
@endsection
