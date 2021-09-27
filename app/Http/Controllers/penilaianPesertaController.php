<?php

namespace App\Http\Controllers;

use App\Models\ObjekPenilaian;
use App\Models\PenilaianPeserta;
use App\Models\Peserta;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class penilaianPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = PenilaianPeserta::wherePesertaId($id)->get();
        $obj = ObjekPenilaian::all();
        $peserta = Peserta::findOrFail($id);
        return view('penyuluh.penilaian_peserta.index', compact('data', 'obj', 'peserta'));
    }

    public function peserta_index()
    {

        $user       = Auth::user();
        $penilaian = $user->peserta->penilaian;
        return view('peserta.penilaian.index',compact('penilaian'));
 
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
        $data = PenilaianPeserta::create($request->all());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PenilaianPeserta::findOrFail($id);
        $obj = ObjekPenilaian::all();

        return view('penyuluh.penilaian_peserta.edit', compact('data', 'obj'));
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
        $data = PenilaianPeserta::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('userPenyuluh.penilaian_peserta.index', ['id' => $data->peserta_id])->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PenilaianPeserta::findOrFail($id);

        try {
            $data->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (QueryException $e) {

            if ($e->getCode() == "23000") {
                return back()->withError('Data gagal dihapus');
            }
        }

    }
}
