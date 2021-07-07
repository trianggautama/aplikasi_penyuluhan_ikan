<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Penyuluh;
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
        $this->penyuluh  = Penyuluh::orderby('NIP')->get();
    }
    public function index()
    {
        $kelurahan = $this->kelurahan;
        $penyuluh  = $this->penyuluh;
        return view('admin.penyuluhan.index',compact('kelurahan','penyuluh'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.penyuluhan.show');
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
        $penyuluh  = $this->penyuluh;
        return view('admin.penyuluhan.edit',compact('kelurahan','penyuluh'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
