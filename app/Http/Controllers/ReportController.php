<?php

namespace App\Http\Controllers;

use App\Models\PenilaianPeserta;
use App\Models\Penyuluh;
use App\Models\Penyuluhan;
use App\Models\Peserta;
use App\Models\User;
use Carbon\Carbon;
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
        $now = Carbon::now();
        if (Carbon::parse($data->tgl_mulai) >= $now) {
            $data['status'] = '<div class="badge badge-info">Belum mulai</div>';
        } else {
            $data['status'] = '<div class="badge badge-primary">Sudah mulai</div>';

        }

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

    public function peserta_filter(Request $req)
    {
        $penyuluhan     = penyuluhan::findOrFail($req->penyuluhan_id);
        $data           = Peserta::where('penyuluhan_id', $penyuluhan->id)->get();
        $pdf            = PDF::loadView('report.peserta_filter', ['data'=>$data, 'penyuluhan'=>$penyuluhan]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Peserta Filter.pdf');
    }

    public function penyuluh_detail_filter(Request $req)
    {
        $data       = Penyuluh::findOrFail($req->penyuluh_id);
        $penyuluhan = $data->penyuluhan;

        $pdf    = PDF::loadView('report.penyuluh_detail', ['data'=>$data, 'penyuluhan'=>$penyuluhan]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Penyuluh Detail.pdf');
    }

    public function penyuluhan_detail_filter(Request $req)
    {
        $data   = Penyuluhan::findOrFail($req->penyuluhan_id);
        $now    = Carbon::now();

        if (Carbon::parse($data->tgl_mulai) >= $now) {
            $data['status'] = '<div class="badge badge-info">Belum mulai</div>';
        } else {
            $data['status'] = '<div class="badge badge-primary">Sudah mulai</div>';

        }

        $pdf    = PDF::loadView('report.detail_penyuluhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Penyuluh Detail.pdf');
    }

    public function penyuluhan_sk_filter(Request $req)
    {
        $data   = Penyuluhan::findOrFail($req->penyuluhan_id);
        $pdf    = PDF::loadView('report.sk_penyuluhan', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('SK Penyuluhan.pdf');
    }

    public function peserta_kartu_filter(Request $req)
    {
        $data   = Peserta::findOrFail($req->peserta_id);
        $pdf    = PDF::loadView('report.kartu_peserta', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Kartu Peserta.pdf');
    }

    public function peserta_penilaian_filter(Request $req)
    {
        $peserta    = Peserta::findOrFail($req->peserta_id);
        $data       = PenilaianPeserta::wherePesertaId($req->peserta_id)->get();
        $pdf        = PDF::loadView('report.penilaian_peserta', ['data'=>$data,'peserta'=>$peserta]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Penilaian Peserta.pdf');
    }

    public function daftar_hadir($id)
    {
        $data               = Penyuluhan::findOrFail($id);
        $tgl_mulai          = Carbon::parse($data->tgl_mulai);
        $data->total_hari   = $tgl_mulai->diffInDays(Carbon::parse($data->tgl_selesai));

        $pdf    = PDF::loadView('report.daftar_isi', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Daftar Isi.pdf');
    }

    public function penyuluhan_kehadiran_filter(Request $req)
    {
        $data               = Penyuluhan::findOrFail($req->penyuluhan_id);
        $tgl_mulai          = Carbon::parse($data->tgl_mulai);
        $data->total_hari   = $tgl_mulai->diffInDays(Carbon::parse($data->tgl_selesai));

        $pdf    = PDF::loadView('report.daftar_isi', ['data'=>$data]);
        $pdf->setPaper('a4', 'prtrait'); 
        
        return $pdf->stream('Laporan Daftar Isi.pdf');
    }
}
 