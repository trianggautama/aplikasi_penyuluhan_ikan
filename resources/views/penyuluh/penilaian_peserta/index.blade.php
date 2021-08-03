@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Peserta (Nama Peserta)</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Penilaian Peserta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-right">
                    <a href="" class="btn btn-info"><i class="fa fa-print"></i> Cetak Form Penilaian</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        id="#myBtn">
                        <i class="fa fa-plus"></i> Tambah Penilaian
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Objek Penilaian</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium corrupti magni voluptatum deleniti veritatis quis in illo iste ab quasi molestias suscipit, aspernatur excepturi aut tempore officiis et quaerat dolores.</td>
                                    <td>80</td>
                                    <td>
                                        <form action="{{ route('userPenyuluh.penilaian_peserta.destroy', 1) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-warning m-1"
                                                href="{{Route('userPenyuluh.penilaian_peserta.edit', 1)}}"><i
                                                    class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
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
            <form action="{{route('userAdmin.jabatan.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Objek Penilaian</label>
                        <select name="" id="" class="form-control">
                            <option value="">-- pilih dari objek penilaian --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="text" name="nilai" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')

@endsection