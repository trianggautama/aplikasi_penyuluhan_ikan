@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Agenda Penyuluhan</a></li>
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
                                    <th>Nama Pelatihan</th>
                                    <th>Nama Penyuluh</th>
                                    <th>Kelurahan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Penyuluhan Ikan air tawar</td>
                                    <td>Penyuluh 1</td>
                                    <td>Kelurahan 1</td>
                                    <td>1 Juni - 5 Juni 2021</td>
                                    <td>
                                        <form action="{{ route('userAdmin.penyuluhan.destroy',1) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-info"
                                                href="{{Route('userAdmin.penyuluhan.show',1)}}"><i
                                                    class="fa fa-info-circle"></i>&nbsp;Show</a>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{Route('userAdmin.penyuluhan.edit',1)}}"><i
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('userAdmin.penyuluhan.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Pelatihan</label>
                        <input type="text" name="kode_kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" name="nama_kecamatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Payuluh</label>
                        <select name="" id="" class="form-control">
                            <option value="">- pilih penyuluh -</option>
                            @foreach($penyuluh as $p)
                                <option value="{{$p->id}}">{{$p->user->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kelurahan</label>
                        <select name="" id="" class="form-control">
                            <option value="">- pilih kelurahan -</option>
                            @foreach($kelurahan as $k)
                                <option value="{{$p->id}}">{{$k->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" name="kode_kecamatan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" name="kode_kecamatan" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Pelatihan</label>
                        <input type="text" name="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Lampiran</label>
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