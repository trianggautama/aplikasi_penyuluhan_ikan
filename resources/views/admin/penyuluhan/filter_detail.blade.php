@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cetak Detail Kegiatan Penyuluhan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Detail Kegiatan Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Filter Cetak</li>
        </ol>
    </div>
    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    Form Filter
                </div>
                <form action="{{Route('report.penyuluhan_detail.filter')}}" enctype="multipart/form-data" method="GET" target="__blank">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Penyuluhan</label>
                            <select name="penyuluhan_id" id="" class="form-control" required>
                                <option value="">- pilih penyuluh -</option>
                                @foreach ($penyuluhan as $d)
                                <option value="{{$d->id}}">{{$d->nama_penyuluhan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection