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
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
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
     .isi{
         padding:10px;
     }

     .page-break { page-break-after: always; }

    </style>
</head>
    <body>
        @for ($i = 0; $i < $data->total_hari +1 ; $i++)
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
            <h2 style="text-align:center; margin:0px">DAFTAR KEHADIRAN PESERTA </h2>
            <h3 style="text-align:center; text-transform:uppercase; margin:0px;">PENYULUHAN {{$data->nama_penyuluhan}} ( {{Carbon\carbon::parse($data->tgl_mulai)->addDay($i)->translatedFormat('d F Y')}} )</h3>
            <br>
            <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>paraf</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->peserta as $d)
                                <tr>
                                    <td height="40px">{{$loop->iteration}}</td>
                                    <td>{{$d->nik}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforeach
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
        <div class="page-break"></div>
        @endfor
        <h2>Catatan :</h2>
    </body>
</html>