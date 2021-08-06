<?php

namespace App\Http\Controllers;

use App\Models\PenilaianPeserta;
use App\Models\Penyuluh;
use App\Models\Penyuluhan;
use App\Models\Peserta;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function penyuluh()
    {
        $data   = Penyuluh::latest()->get();
        $pdf    = PDF::loadView('report.penyuluh', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Penyuluh.pdf');
    }

    public function penyuluh_detail($id)
    {
        $data       = Penyuluh::findOrFail($id);
        $penyuluhan = $data->penyuluhan;

        $pdf    = PDF::loadView('report.penyuluh_detail', ['data'=>$data, 'penyuluhan'=>$penyuluhan]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Penyuluh Detail.pdf');
    }

    public function penyuluhan()
    {
        $data   = Penyuluhan::latest()->get();
        $pdf    = PDF::loadView('report.penyuluhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Penyuluhan.pdf');
    }

    public function sk_penyuluhan($id)
    {
        $data   = Penyuluhan::findOrFail($id);
        $pdf    = PDF::loadView('report.sk_penyuluhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('SK Penyuluhan.pdf');
    }

    public function detail_penyuluhan($id)
    {
        $data   = Penyuluhan::findOrFail($id);
        $pdf    = PDF::loadView('report.detail_penyuluhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Detail Penyuluhan.pdf');
    }  

    public function peserta()
    {
        $data   = Peserta::latest()->get();
        $pdf    = PDF::loadView('report.peserta', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Peserta.pdf');
    }

    public function kartu_peserta($id)
    {
        $data   = Peserta::findOrFail($id);
        $pdf    = PDF::loadView('report.kartu_peserta', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Kartu Peserta.pdf');
    }

    public function penyuluhan_penyuluh()
    {
        $data   = Penyuluhan::where('penyuluh_id', Auth::user()->penyuluh->id)->latest()->get();
        $pdf    = PDF::loadView('report.penyuluhan_penyuluh', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Penyuluhan.pdf');
    }

    public function penilaian_peserta($id)
    {
        $peserta    = Peserta::findOrFail($id);
        $data       = PenilaianPeserta::wherePesertaId($id)->get();
        $pdf        = PDF::loadView('report.penilaian_peserta', ['data'=>$data,'peserta'=>$peserta]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Penilaian Peserta.pdf');
    }

}
 