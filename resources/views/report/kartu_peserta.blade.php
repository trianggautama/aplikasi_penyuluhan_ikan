<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p {
            font-size: 10px;
        }

        h4,
        h2 {
            font-family: serif;
        }

        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        br {
            margin-bottom: 5px !important;
        }

        .judul {
            text-align: center;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 80px;
            padding: 0px;
        }

        .pemko {
            width: 50px;
        }

        .logo {
            float: left;
            margin-right: 0px;
            width: 18%;
            padding: 0px;
            text-align: right;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 72%;
            padding-left: 0px;
            padding-right: 10%;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
            width: 100%;
        }

        .ttd {
            margin-left: 65%;
            text-align: center;
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .isi {
            padding: 10px;
        }

        @page {
            size: 12 cm 15 cm;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="pemko" src="logo.png">
        </div>
        <div class="headtext">
            <h6 style="margin:0px;">PEMERINTAH KABUPATEN HULU SUNGAI UTARA</h6>
            <h6 style="margin:0px;">DINAS PERIKANAN DAN KELAUTAN</h6>
            <p style="margin:0px;">Jl. Brigjen H. Hasan Baseri, Kebun Sari, Amuntai Tengah, Kabupaten Hulu Sungai Utara,
                Kalimantan Selatan 71414</p>
        </div>
    </div>
    <div class="container">
        <hr style="margin-top:0px;">
        <div class="isi">
            <h5 style="text-align:center;">KARTU PESERTA PELATIHAN {{$data->penyuluhan->nama_penyuluhan}}</h5>
            <div style="text-align:center;"><img src="lampiran/foto-peserta/{{$data->foto}}" alt="" width="30%"></div>
            <br>
            <h5 style="text-align:center; margin:0px;">Nama :{{$data->nama}}</h5>
            <h5 style="text-align:center; margin:0px;">NIK : {{$data->nik}}</h5>
        </div>
    </div>
</body>

</html>