<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Penyuluh;
use App\Models\Penyuluhan;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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

            if (Carbon::parse($item->tanggal_mulai) >= $now) {
                $item['status'] = '<div class="badge badge-info">Belum mulai</div>';
            } else {
                $item['status'] = '<div class="badge badge-primary">Sudah mulai</div>';

            }

            return $item;
        });
        return view('admin.penyuluhan.index', compact('kelurahan', 'penyuluh', 'data'));
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

        if (isset($req->lampiran)) {
            $file = $req->file('lampiran');

            $file_name = rand(3) . "_" . $file->getClientOriginalName();

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
        if (Carbon::parse($data->tanggal_mulai) >= $now) {
            $data['status'] = '<div class="badge badge-info">Belum mulai</div>';
        } else {
            $data['status'] = '<div class="badge badge-primary">Sudah mulai</div>';

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

        if (isset($req->lampiran)) {
            $file = $req->file('lampiran');

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
}
