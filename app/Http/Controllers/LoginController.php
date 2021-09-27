<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            switch (Auth::user()->role) {
                case 1:
                    return redirect()->route('userAdmin.beranda');
                    break;
                case 2:
                    return redirect()->route('userPenyuluh.beranda');
                    break;
                default:
                    return redirect()->route('userPeserta.beranda');

            }

        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }

    public function logout(Request $req)
    {
        Auth::logout();
        return redirect()->route('welcome')->withSuccess('Anda berhasil logout');
    }
}
