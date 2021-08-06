@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Penyuluh</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">User Penyuluh</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{Route('report.penyuluh')}}" class="btn btn-info" target="__blank"><i class="fa fa-print"></i> Cetak Data</a>
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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Tempat, tanggal lahir</th>
                                    <th>status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->penyuluh->nip}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->penyuluh->tempat_lahir}},
                                        {{carbon\carbon::parse($d->penyuluh->tanggal_lahir)->translatedFormat('d F Y')}}
                                    </td>
                                    <td>
                                        @if ($d->status == 1)
                                        <a href="" class="btn btn-sm btn-primary">Aktif</a>
                                        @else
                                        <a href="" class="btn btn-sm btn-danger">Tidak Aktif</a>
                                        @endif
                                    </td>
                                    <td>{{$d->penyuluh->jk}}</td>
                                    <td>{{$d->penyuluh->pendidikan_terakhir}}</td>
                                    <td>
                                        <form action="{{ route('userAdmin.penyuluh.destroy',$d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-info mb-1"
                                                href="{{Route('report.penyuluh_detail',$d->id)}}" target="_blank"><i
                                                    class="fa fa-print"></i>&nbsp;Biodata</a>
                                            <a class="btn btn-sm btn-warning mb-1"
                                                href="{{Route('userAdmin.penyuluh.edit',$d->id)}}"><i
                                                    class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('userAdmin.penyuluh.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan </label>
                        <select name="jabatan_id" id="" class="form-control" required>
                            <option value="">- pilih jabatan -</option>
                            @foreach ($jabatan as $d)
                            <option value="{{$d->id}}">{{$d->nama_jabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
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
                        <label for="">Status </label>
                        <select name="status" id="" class="form-control" required>
                            <option value="">- pilih status -</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pendidikan Terakhir </label>
                        <select name="pendidikan_terakhir" id="" class="form-control" required>
                            <option value="">- pilih pendidikan terakhir -</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="S-1">S-1</option>
                            <option value="S-2">S-2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <input type="hidden" name="role" value="2">
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