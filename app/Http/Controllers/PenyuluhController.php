<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Penyuluh;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenyuluhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereRole(2)->get();
        $jabatan = Jabatan::all();
        return view('admin.user_penyuluh.index', compact('data', 'jabatan'));
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
        $userRequest = $request->only('username', 'nama', 'role', 'status');
        $userRequest['password'] = Hash::make($request->password);

        $user = User::create($userRequest);

        $penyuluhRequest = $request->except('password', 'username', 'nama', 'role', 'status');

        $user->penyuluh()->create($penyuluhRequest);

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
    public function edit(User $penyuluh)
    {
        $user = $penyuluh;
        $jabatan = Jabatan::all();

        return view('admin.user_penyuluh.edit', compact('user', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $penyuluh)
    {
        $user = $penyuluh;

        $userRequest = $request->only('username', 'nama', 'role', 'status');
        if (isset($request->password)) {
            $userRequest['password'] = Hash::make($request->password);
        }

        $user->update($userRequest);

        $penyuluhRequest = $request->except('_method', '_token', 'password', 'username', 'nama', 'role', 'status');

        $user->penyuluh()->update($penyuluhRequest);

        return redirect()->route('userAdmin.penyuluh.index')->withSuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return back()->withSuccess('Data berhasil dihapus');
        } catch (QueryException $e) {

            if ($e->getCode() == "23000") {
                return back()->withError('Data gagal dihapus');
            }
        }
    }

    public function filter()
    {
        $penyuluh = Penyuluh::latest()->get();
        return view('admin.user_penyuluh.filter',compact('penyuluh'));
    }
}
