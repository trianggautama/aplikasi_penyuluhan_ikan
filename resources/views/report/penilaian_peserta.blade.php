<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
      }
      th{
        text-align: center;
      }
      td{
        /* text-align: center; */
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 110px;
         padding: 0px;
     }
     .pemko{
         width:70px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 18%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 72%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 3px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:65%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .text-center{
         text-align:center;
     }
     .isi{
         padding:10px;
     }
     .border{
        border: 1px solid black;
     }
    </style>
</head>
<body>
    <div class="header">
            <div class="logo">
                    <img  class="pemko" src="logo.png">
            </div>
            <div class="headtext">
                <h3 style="margin:0px;">PEMERINTAH KABUPATEN HULU SUNGAI UTARA</h3>
                <h3 style="margin:0px;">DINAS PERIKANAN DAN KELAUTAN</h3>
                <p style="margin:0px;">Jl. Brigjen H. Hasan Baseri, Kebun Sari, Amuntai Tengah, Kabupaten Hulu Sungai Utara, Kalimantan Selatan 71414</p>
            </div>
            <br>
    </div>
    <div class="container">
    <hr style="margin-top:1px;">
        <div class="isi">
            <h2 style="text-align:center;">DATA PENILAIAN PESERTA </h2>
            <br>
            <p style="margin:0px;"><b>Data Peserta</b></p>
            <table class="table table-striped" style="margin-top:10px;">
                <tr>
                    <td width="25%">Nama </td> 
                    <td width="3%">:</td>
                    <td>{{$peserta->nama}}</td>
                </tr>   
                <tr>
                    <td width="25%">NIK</td>
                    <td width="3%">:</td>
                    <td>{{$peserta->nik}}</td>
                </tr>
                <tr>
                    <td width="25%">Tempat, tanggal lahir</td>
                    <td width="3%">:</td>
                    <td>{{$peserta->tempat_lahir}},
                        {{carbon\carbon::parse($peserta->tanggal_lahir)->translatedFormat('d F Y')}}</td>
                </tr>
                <tr>
                    <td width="25%">Jenis kelamin</td>
                    <td width="3%">:</td>
                    <td>{{$peserta->jenis_kelamin}}</td>
                </tr>
            </table>
            <br>
            <p style="margin:0px;"><b>Data Kegiatan Penyuluhan</b></p>
            <table class="table table-striped" style="margin-top:10px;">
                    <tr>
                        <td width="25%">Nama Pelatihan</td> 
                        <td width="3%">:</td>
                        <td>{{$peserta->penyuluhan->nama_penyuluhan}}</td>
                    </tr>   
                    <tr>
                        <td width="25%">Keterangan</td>
                        <td width="3%">:</td>
                        <td>{{$peserta->penyuluhan->keterangan}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Penyuluh</td>
                        <td width="3%">:</td>
                        <td>{{$peserta->penyuluhan->penyuluh->user->nama}}</td>
                    </tr>
                    <tr>
                            <td width="25%">Kelurahan - Kecamatan</td>
                            <td width="3%">:
                            </td>
                            <td>{{$peserta->penyuluhan->kelurahan->nama_kelurahan}}
                                {{$peserta->penyuluhan->kelurahan->kecamatan->nama_kecamatan}}</td>
                        </tr> 
                        <tr>
                            <td width="25%">Tanggal Pelaksanaan</td>
                            <td width="3%">:</td>
                            <td>{{carbon\carbon::parse($peserta->penyuluhan->tgl_mulai)->translatedFormat('d F Y')}} -
                                {{carbon\carbon::parse($peserta->penyuluhan->tgl_selesai)->translatedFormat('d F Y')}}</td>
                        </tr>
                        <tr>
                            <td width="25%">Tempat pelatihan</td>
                            <td width="3%">:</td>
                            <td>{{$peserta->penyuluhan->tempat_pelatihan}}</td>
                        </tr>
                </table>
            <br>
                <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center border">No</th>
                                    <th class="text-center border">Objek Penilaian</th>
                                    <th class="text-center border">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data->isNotEmpty())
                                @foreach ($data as $d)
                                <tr>
                                    <td class="text-center border">{{$loop->iteration}}</td>
                                    <td class="text-center border">{{$d->objek_penilaian->uraian}}</td>
                                    <td class="text-center border">{{$d->nilai}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-center border">Rata-rata</td>
                                    <td class="text-center border">
                                        @php
                                            $rata_rata = $data->sum('nilai') / $data->count();
                                        @endphp
                                        {{$rata_rata}}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="3" class="text-center border">Nilai Belum di Input</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                <br>
                <br>
                <div class="ttd">
                <p style="margin:0px"> Amuntai,</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Kepala Dinas Perikanan </h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">(...........................)</h5>
                <!-- <h5 style="margin:0px">NIP. 19620606 199203 2 007</h5> -->
                </div>
            </div>
        </div>
    </body>
</html>