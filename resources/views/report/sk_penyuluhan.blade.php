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
            <h2 style="text-align:center; text-transform:uppercase; text-decoration:underline;">SURAT PERINTAH TUGAS</h2>
            <p style="text-align:center; text-transform:uppercase; ">NOMOR : 530/ &nbsp;&nbsp;&nbsp;/Disperkin/{{Carbon\carbon::now()->translatedFormat('d F Y')}}</p>
            <br>
                <table>
                    <tr>
                        <td width="10%" style="vertical-align: top;">Dasar</td>
                        <td width="2%" style="vertical-align: top;">:</td>
                        <td><p style="text-align: justify; margin:0px;">Undang-undang No. 16 tahun 2006 tentang Penyuluhan (Pertanian, Perikanan, Kehutanan) yaitu proses pembelajaran bagi pelaku utama serta pelaku usaha mengorganisasikan dirinya dalam mengakses informasi pasar, teknologi permodalan, dan sumberdaya lainnya, sebagai upaya untuk meningkatkan produktivitas, efesiensi usaha, pendapatan dan kesejahteraannya, serta meningkatkan kesadaran dalam pelestarian fungsi lingkungan hidup.</p></td>
                    </tr>
                </table>
                <h4 style="text-align:center; text-transform:uppercase; text-decoration:underline;">MENUGASKAN </h4>
                <br>
                <table>
                    <tr>
                        <td width="10%" style="vertical-align: top;">Kepada</td>
                        <td width="2%" style="vertical-align: top;">:</td>
                        <td>
                        <table class="table table-striped">
                            <tr>
                                <td width="25%">NIP</td> 
                                <td width="3%">:</td>
                                <td>{{$data->penyuluh->nip}}</td>
                            </tr>
                            <tr>
                                <td width="25%">Nama</td>
                                <td width="3%">:</td>
                                <td>{{$data->penyuluh->user->nama}}</td>
                            </tr>
                            <tr>
                                <td width="25%">Tempat, Tanggal Lahir</td>
                                <td width="3%">:</td>
                                <td>{{$data->penyuluh->tempat_lahir}},  {{carbon\carbon::parse($data->penyuluh->tanggal_lahir)->translatedFormat('d F Y')}}</td>
                            </tr>
                            <tr>
                                <td width="25%">Jenis Kelamin</td>
                                <td width="3%">:</td>
                                <td>{{$data->penyuluh->jk }} </td>
                            </tr>
                            <tr>
                                <td width="25%">Pendidikan Terakhir</td>
                                <td width="3%">:</td>
                                <td>{{$data->penyuluh->pendidikan_terakhir }} </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td width="10%" style="vertical-align: top;">Untuk</td>
                        <td width="2%" style="vertical-align: top;">:</td>
                        <td>
                            <ul style="margin: 0px;">
                                <li style="margin: 0px;"><p style="text-align: justify; margin: 0px;">Untuk melaksanakan tugas sebagai penyuluh perikanan (PPL), pada penyuluhan {{$data->nama_penyuluhan}} pada {{carbon\carbon::parse($data->tgl_mulai)->translatedFormat('d F Y')}} -
                                        {{carbon\carbon::parse($data->tgl_selesai)->translatedFormat('d F Y')}} di {{$data->tempat_pelatihan}} Kelurahan {{$data->kelurahan->nama_kelurahan}} Kecamatan {{$data->kelurahan->kecamatan->nama_kecamatan}}</p></li>
                                <li style="margin: 0px;"><p style="text-align: justify; margin: 0px;">Apabila dikemudian hari terdapat kekeliruan dalam surat tugas ini akan dilakukan perbaikan</p></li>
                            </ul>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <br>
                <div class="ttd">
                <p style="margin:0px"> Banjarbaru,</p>
                <h6 style="margin:0px">Mengetahui</h6>
                <h5 style="margin:0px">Kepala Dinas Perikanan</h5>
                <br>
                <br>
                <br>
                <br>
                <h5 style="text-decoration:underline; margin:0px">H. RIZANA MIRZA SH,. M.Kes</h5>
                <h5 style="margin:0px">NIP. 19660828 199303 1 007</h5>
                </div>
            </div>
        </div>
    </body>
</html>