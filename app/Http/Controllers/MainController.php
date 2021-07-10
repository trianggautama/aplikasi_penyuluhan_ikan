<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penyuluh;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function admin_beranda()
    {
        $kecamatan = Kecamatan::count();
        $kelurahan = Kelurahan::count();
        $jabatan   = Jabatan::count();
        $penyuluh  = Penyuluh::count();
        return view('admin.index',compact('kecamatan','kelurahan','jabatan','penyuluh'));
    }

    public function penyuluh_beranda()
    {

        return view('penyuluh.index');
    }
}
