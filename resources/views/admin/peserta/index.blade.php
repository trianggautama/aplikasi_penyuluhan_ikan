@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peserta Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Peserta Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        id="#myBtn">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Pelatihan</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat,tanggal lahir</th>
                                    <th>Jenis kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Pelatihan 1</td>
                                    <td>1215376253</td>
                                    <td>Peserta 1</td>
                                    <td>Banjaramsin , 1 Juni 1990</td>
                                    <td>Laki laki</td>
                                    <td>
                                        <form action="{{ route('userAdmin.peserta.destroy',1) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-info"
                                                href="{{Route('userAdmin.peserta.show',1)}}"><i
                                                    class="fa fa-info-circle"></i>&nbsp;Show</a>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{Route('userAdmin.peserta.edit',1)}}"><i
                                                    class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <button class="btn btn-sm btn-danger mt-1" type="submit"><i class="fa fa-trash"
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('userAdmin.peserta.store')}}" method="POST">
                <div class="modal-body">
                    @csrf 
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection