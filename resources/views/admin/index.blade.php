@extends('layouts.main')
    @section('content')
    <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Beranda</li>
            </ol>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Kecamatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kecamatan}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Kelurahan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kelurahan}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-map fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">jabatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jabatan}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">User Penyuluh</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$penyuluh}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Agenda Penyuluhan</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$agenda}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Peserta Penyuluhan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$peserta}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <div class="card">
                <div class="card-body">
                  <h5>Selamat Datang (Nama Admin)</h5>
                  <p>Di Aplikasi  Penyuluhan Periakanan Dinas Perikanan dan Kelautan Kabupaten Hulu Sungai Utara</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    @endsection
@section('script')
   
@endsection
