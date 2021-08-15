<?php

namespace App\Http\Controllers;

use App\Models\Penyuluhan;
use App\Models\Peserta;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->penyuluhan = Penyuluhan::all();
    }
    public function index()
    {
        $penyuluhan = $this->penyuluhan;
        $data = Peserta::all();
        return view('admin.peserta.index', compact('data', 'penyuluhan'));
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
        $data = Peserta::create($request->all());

        if (isset($request->foto)) {
            $file = $request->file('foto');

            $file_name = time() . "_" . $file->getClientOriginalName();

            $file->move('lampiran/foto-peserta', $file_name);
            $data->foto = $file_name;
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
        $data = Peserta::findOrFail($id);

        return view('admin.peserta.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data       = Peserta::findOrFail($id);
        $penyuluhan = $this->penyuluhan;

        return view('admin.peserta.edit', compact('data', 'penyuluhan'));
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
        $data = Peserta::findOrFail($id);
        $data->update($request->all());

        if (isset($request->foto)) {
            $file = $request->file('foto');

            $file_name = time() . "_" . $file->getClientOriginalName();

            $file->move('lampiran/foto-peserta', $file_name);
            $data->foto = $file_name;
        }

        $data->update();

        return redirect()->route('userAdmin.penyuluhan.show', $request->penyuluhan_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);

        {
            try {
                $peserta->delete();
                return back()->withSuccess('Data berhasil dihapus');
            } catch (QueryException $e) {

                if ($e->getCode() == "23000") {
                    return back()->withError('Data gagal dihapus');
                }
            }

        }

    }

    public function filter()
    {
        $penyuluhan = Penyuluhan::latest()->get();
        return view('admin.peserta.filter',compact('penyuluhan'));
    }

    public function filter_kartu()
    {
        $peserta = Peserta::latest()->get();
        return view('admin.peserta.filter_kartu',compact('peserta'));
    }

    public function filter_penilaian()
    {
        $now = Carbon::now();
        $penyuluhan = Penyuluhan::where('tgl_selesai','<',$now)->latest()->get();
        return view('admin.peserta.filter_penilaian',compact('penyuluhan'));
    }

    public function api($id)
    {
        $peserta = Peserta::where('penyuluhan_id', $id)->latest()->get();
        return $peserta;
    }
}
