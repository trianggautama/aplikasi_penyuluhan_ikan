<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Penyuluh;
use App\Models\Penyuluhan;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyuluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->kelurahan = Kelurahan::orderBy('nama_kelurahan')->get();
        $this->penyuluh = Penyuluh::orderby('NIP')->get();
    }
    public function index()
    {
        $kelurahan = $this->kelurahan;
        $penyuluh = $this->penyuluh;
        $data = Penyuluhan::all();
        $now = Carbon::now();
 
        $data->map(function ($item) use ($now) {

            if ($now >= carbon::parse($item->tgl_mulai) && $now <= carbon::parse($item->tgl_selesai)) {
                $item['status'] = 1;
            } else if ($now > carbon::parse($item->tgl_selesai) && $now > carbon::parse($item->tgl_mulai)) {
                $item['status'] = 2;
            } else {
                $item['status'] = 0;
            }

            return $item;
        });
        return view('admin.penyuluhan.index', compact('kelurahan', 'penyuluh', 'data'));
    }

    public function peserta_index()
    {
        $user       = Auth::user();
        $penyuluhan = $user->peserta->penyuluhan;
        return view('peserta.penyuluhan.index',compact('penyuluhan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Penyuluhan::create($request->all());

        if (isset($request->lampiran)) {
            $file = $request->file('lampiran');

            $file_name = time() . "_" . $file->getClientOriginalName();

            $file->move('lampiran/penyuluhan', $file_name);
            $data->lampiran = $file_name;
        }

        $data->update();

        return back()->withSuccess('Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penyuluhan::findOrFail($id);
        $now = Carbon::now();


        if ($now >= carbon::parse($data->tgl_mulai) && $now <= carbon::parse($data->tgl_selesai)) {
            $data['status'] = 1;
        } else if ($now > carbon::parse($data->tgl_selesai) && $now > carbon::parse($data->tgl_mulai)) {
            $data['status'] = 2;
        } else {
            $data['status'] = 0;
        }

        return view('admin.penyuluhan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelurahan = $this->kelurahan;
        $penyuluh = $this->penyuluh;
        $data = Penyuluhan::findOrFail($id);
        return view('admin.penyuluhan.edit', compact('kelurahan', 'penyuluh', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Penyuluhan::findOrFail($id);

        $data->update($request->all());
        if (isset($request->lampiran)) {
            $file = $request->file('lampiran');

            $file_name = time() . "_" . $file->getClientOriginalName();

            $file->move('lampiran/penyuluhan', $file_name);
            $data->lampiran = $file_name;
        }
        $data->update();

        return redirect()->route('userAdmin.penyuluhan.index')->withSuccess('Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyuluhan $penyuluhan)
    {
        try {
            $penyuluhan->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (QueryException $e) {

            if ($e->getCode() == "23000") {
                return back()->withError('Data gagal dihapus');
            } 
        }

    }

    public function filter_detail()
    {
        $penyuluhan = Penyuluhan::latest()->get();
        return view('admin.penyuluhan.filter_detail', compact('penyuluhan'));
    }

    public function filter_sk()
    {
        $penyuluhan = Penyuluhan::latest()->get();
        return view('admin.penyuluhan.filter_sk', compact('penyuluhan'));
    }

    public function filter_kehadiran()
    {
        $penyuluhan = Penyuluhan::latest()->get();
        return view('admin.penyuluhan.filter_kehadiran', compact('penyuluhan'));
    }
}
