@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Agenda Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show</li>
        </ol>
    </div> 

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            Detail Penyuluhan
                        </div>
                        <div class="col-md text-right">
                            <form action="{{Route('report.peserta.filter')}}" enctype="multipart/form-data" method="GET" target="__blank">
                                <a href="{{Route('report.daftar_hadir',$data->id)}}" class="btn btn-sm btn-primary" target="__blank"><i class="fa fa-print"></i> Daftar Hadir</a>
                                <a href="{{Route('report.detail_penyuluhan',$data->id)}}" class="btn btn-sm btn-primary" target="__blank"><i class="fa fa-print"></i> Detail Penyuluhan</a>
                               <input type="hidden" name="penyuluhan_id" value="{{$data->id}}">
                                <!-- <button type="submit" class="btn btn-sm btn-primary" target="__blank"><i class="fa fa-users"></i> Cetak Peserta Kegiatan Penyuluahan</button> -->
                                <a href="{{Route('userAdmin.penyuluhan.index')}}" class="btn btn-sm btn-secondary"><i
                                    class="fa fa-arrow-left"></i> kembali</a>
                            </form>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped"> 
                        <tr>
                            <td width="20%">Nama Pelatihan</td>
                            <td width="2px">:</td>
                            <td>{{$data->nama_penyuluhan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Keterangan</td>
                            <td width="2px">:</td>
                            <td>{{$data->keterangan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Lampiran</td>
                            <td width="2%">: </td>
                            <td><a href="{{asset('lampiran/penyuluhan/'.$data->lampiran)}}"
                                    class="btn btn-sm btn-primary"><i class="fa fa-paperclip"></i> Lampiran</a>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">Penyuluh</td>
                            <td width="2%">:</td>
                            <td>{{$data->penyuluh->user->nama}}</td> 
                        </tr>
                        <tr>
                            <td width="20%">Kelurahan - Kecamatan</td>
                            <td width="2px">:
                            </td>
                            <td>{{$data->kelurahan->nama_kelurahan}}
                                {{$data->kelurahan->kecamatan->nama_kecamatan}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Tanggal Pelaksanaan</td>
                            <td width="2px">:</td>
                            <td>{{carbon\carbon::parse($data->tgl_mulai)->translatedFormat('d F Y')}} -
                                {{carbon\carbon::parse($data->tgl_selesai)->translatedFormat('d F Y')}}</td>
                        </tr>
                        <tr>
                            <td width="20%">Tempat pelatihan</td>
                            <td width="2px">:</td>
                            <td>{{$data->tempat_pelatihan}}</td>
                        </tr> 
                        <tr>
                            <td width="20%">Jumlah Peserta</td>
                            <td width="2px">: </td>
                            <td>{{$data->peserta->count()}} Orang</td>
                        </tr>
                        <tr>
                            <td width="20%">Status Pelatihan</td>
                            <td width="2px">:</td>
                            <td>
                            @if($data->status == 0)
                                <div class="badge badge-warning">belum mulai</div>
                            @elseif($data->status == 1)
                                <div class="badge badge-primary">sedang berlangsung</div>
                            @else
                                <div class="badge badge-success">sudah selesai</div>
                            @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">Peserta Penyuluhan</div>
                        <div class="col-md text-right">
                            @if($data->status != 2)
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal" id="#myBtn">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat,tanggal lahir</th>
                                <th>Jenis kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->peserta as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->nik}}</td>
                                <td>{{$d->nama}}</td>
                                <td>{{$d->tempat_lahir}},
                                    {{carbon\carbon::parse($d->tanggal_lahir)->translatedFormat('d F Y')}}</td>
                                <td>{{$d->jenis_kelamin}}</td>
                                <td>
                                    <form action="{{ route('userAdmin.peserta.destroy',$d->id) }}"
                                        method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-sm btn-info"
                                            href="{{Route('userAdmin.peserta.show',$d->id)}}"><i
                                                class="fa fa-info-circle"></i>&nbsp;Show</a>
                                        @if($data->status != 2)
                                        <a class="btn btn-sm btn-warning m-1"
                                            href="{{Route('userAdmin.peserta.edit',$d->id)}}"><i
                                                class="fa fa-edit"></i>&nbsp;Edit</a>
                                        <button class="btn btn-sm btn-danger " type="submit"><i class="fa fa-trash"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"></i>&nbsp;Hapus</button>
                                        @endif
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
            <form action="{{Route('userAdmin.peserta.store')}}" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Pelatihan</label>
                        <select name="penyuluhan_id" id="" class="form-control" required readonly>
                            <option value="{{$data->id}}">{{$data->nama_penyuluhan}}</option>
                        </select>
                    </div>
                    <div class="form-group">
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
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection