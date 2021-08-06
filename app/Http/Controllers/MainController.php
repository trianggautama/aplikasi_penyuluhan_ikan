<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penyuluh;
use App\Models\Penyuluhan;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function admin_beranda()
    {
        $kecamatan = Kecamatan::count();
        $kelurahan = Kelurahan::count();
        $jabatan = Jabatan::count();
        $penyuluh = Penyuluh::count();
        $agenda  = Penyuluhan::count();
        $peserta  = Peserta::count();
        return view('admin.index', compact('kecamatan', 'kelurahan', 'jabatan', 'penyuluh','agenda','peserta'));
    }

    public function penyuluh_beranda()
    {

        return view('penyuluh.index');
    }

    public function penyuluh_profil()
    {
        $user = Auth::user();
        $jabatan = Jabatan::latest()->get();
        return view('penyuluh.profil', compact('user', 'jabatan'));
    }

    public function penyuluh_profil_update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $userRequest = $request->only('username', 'nama', 'role', 'status');
        if (isset($request->password)) {
            $userRequest['password'] = Hash::make($request->password);
        }

        $user->update($userRequest);

        $penyuluhRequest = $request->except('_method', '_token', 'password', 'username', 'nama', 'role', 'status');

        $user->penyuluh()->update($penyuluhRequest);

        return redirect()->back()->withSuccess('Profil berhasil di update');
    }
}
