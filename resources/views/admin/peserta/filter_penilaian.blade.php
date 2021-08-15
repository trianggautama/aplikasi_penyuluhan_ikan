@extends('layouts.main')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian Peserta </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> Penilaian Peserta Penyuluhan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Filter Cetak</li>
        </ol>
    </div>

    <div class="row mb-3">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    Form Filter
                </div>
                <form action="{{Route('report.peserta_penilaian.filter')}}" enctype="multipart/form-data" method="GET" target="__blank">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Penyuluhan</label>
                            <select name="penyuluhan_id" id="penyuluhan_id" class="form-control" required>
                                <option value="">- pilih penyuluhan -</option>
                                @foreach ($penyuluhan as $d)
                                <option value="{{$d->id}}">
                                    {{$d->nama_penyuluhan}} ( {{carbon\carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} -
                                        {{carbon\carbon::parse($d->tgl_selesai)->translatedFormat('d F Y')}} )</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Peserta</label>
                            <select name="peserta_id" id="peserta_id" class="form-control" required>
                                <option value="">- pilih peserta -</option>
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
<script>
       $( "#penyuluhan_id" ).change(function() {
            let penyuluhan_id =   $( "#penyuluhan_id" ).val();
            let url       = '{{Route("api.peserta","")}}'
            axios.get( `${url}/${penyuluhan_id} `)
            .then(function (response) {
                $('#peserta_id').children('option:not(:first)').remove();
                $.each(response.data, function (index, value) {
                        $('#peserta_id').append(
                            '<option value="'+value.id+'">'+value.nama+'</option>'
                        )
                    }) 
            })
            .catch(function (error) {
                console.log(error);
            })
        }); 
</script>
@endsection