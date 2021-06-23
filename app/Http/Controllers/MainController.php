<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function admin_beranda()
    {

        return view('admin.index');
    }

    public function penyuluh_beranda()
    {

        return view('penyuluh.index');
    }
}
