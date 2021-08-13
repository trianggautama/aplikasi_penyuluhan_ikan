@extends('layouts.main')
    @section('content')
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda Penyuluh</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Beranda</a></li>
              <li class="breadcrumb-item active" aria-current="page">Penyuluh</li>
            </ol>
          </div>

          <div class="row mb-3">
            <div class="col-md">
            <div class="card">
              <div class="card-body">
                <h3>Selamat Datang ( {{Auth::user()->nama}} )</h3>
                <p class="text-justify">Di Aplikasi Penyuluhan Dinas Perikanan dan Kelautan Hulu Sungai Utara</p>
              </div>
            </div>
            </div>            
          </div> 
        </div>
    @endsection
@section('script')
   
@endsection
 