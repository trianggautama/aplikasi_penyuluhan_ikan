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
        /* border: 1px solid black; */
      }

      .border{
                  border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: left;
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
     .text-center{
         text-align:center;
     }
     .isi{
         padding:10px;
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
            <h2 style="text-align:center; text-transform:uppercase;">DETAIL PENYULUH</h2>
            <br>
                <table class="table table-striped">
                    <tr>
                        <td rowspan="5" class="text-center"><img src="lampiran/foto-penyuluh/{{$data->foto}}" alt="" width="150"></td>
                        <td width="25%">NIP</td> 
                        <td width="3%">:</td>
                        <td>{{$data->nip}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Nama</td>
                        <td width="3%">:</td>
                        <td>{{$data->user->nama}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Tempat, Tanggal Lahir</td>
                        <td width="3%">:</td>
                        <td>{{$data->tempat_lahir}},
                                        {{carbon\carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y')}}</td>
                    </tr>
                    <tr>
                        <td width="25%">Jenis Kelamin</td>
                        <td width="3%">:</td>
                        <td>{{$data->jk }} </td>
                    </tr>
                    <tr>
                        <td width="25%">Pendidikan Terakhir</td>
                        <td width="3%">:</td>
                        <td>{{$data->pendidikan_terakhir }} </td>
                    </tr>
                </table>
                <br>
                <br>
                <h2 style="text-align:center; text-transform:uppercase;">DAFTAR PENYULUHAN</h2>
                <br>
                <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border text-center">No</th>
                                    <th class="border text-center">Nama Pelatihan</th>
                                    <th class="border text-center">Nama Penyuluh</th>
                                    <th class="border text-center">Kelurahan</th>
                                    <th class="border text-center">Tanggal Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penyuluhan as $d)
                                <tr>
                                    <td class="border text-center">{{$loop->iteration}}</td>
                                    <td class="border text-center">{{$d->nama_penyuluhan}}</td>
                                    <td class="border text-center">{{$d->penyuluh->user->nama}}</td>
                                    <td class="border text-center">{{$d->kelurahan->nama_kelurahan}}</td>
                                    <td class="border text-center">{{carbon\carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}} -
                                        {{carbon\carbon::parse($d->tgl_selesai)->translatedFormat('d F Y')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                <br>
                <br>
                <br>
                <div class="ttd">
                <p style="margin:0px"> Amuntai,</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Kepala Dinas Perikanan</h5>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">H. RIZANA MIRZA SH,. M.Kes</h5>
                <h5 style="margin:0px">NIP. 19660828 199303 1 007</h5>
                </div>
            </div>
        </div>
    </body>
</html>