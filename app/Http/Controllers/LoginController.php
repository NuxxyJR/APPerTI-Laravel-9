<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        if (Auth::guard('mahasiswa')->attempt(["nim" => $request->user, "password" => $request->password])) {

            $request->session()->regenerate();

            return redirect()->intended();
        } elseif (Auth::guard('dosen')->attempt(["nip" => $request->user, "password" => $request->password])) {
            // dd(Auth::guard('dosen')->user());
            // $request->session()->regenerate();

            return redirect('/dosen');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Email/Password Salah');

        return redirect()->route('login');
    }

    public function logoutMahasiswa(Request $request)
    {
        if (Auth::guard('mahasiswa')->check()) // this means that the admin was logged in.
        {
            Auth::guard('mahasiswa')->logout();
            return redirect()->route('login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function logoutDosen(Request $request)
    {
        if (Auth::guard('dosen')->check()) // this means that the admin was logged in.
        {
            Auth::guard('dosen')->logout();
            return redirect()->route('login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
