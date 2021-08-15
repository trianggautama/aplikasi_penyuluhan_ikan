<?php

namespace App\Http\Controllers;

use App\Models\Penyuluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenyuluhanPenyuluhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now  = Carbon::now();
        $data = Penyuluhan::where('penyuluh_id', Auth::user()->penyuluh->id)->latest()->get();
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
        return view('penyuluh.penyuluhan.index',compact('data'));
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
        $data = Penyuluhan::findOrFail($id);
        $now = Carbon::now();


        if ($now >= carbon::parse($data->tgl_mulai) && $now <= carbon::parse($data->tgl_selesai)) {
            $data['status'] = 1;
        } else if ($now > carbon::parse($data->tgl_selesai) && $now > carbon::parse($data->tgl_mulai)) {
            $data['status'] = 2;
        } else {
            $data['status'] = 0;
        }

        return view('penyuluh.penyuluhan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
