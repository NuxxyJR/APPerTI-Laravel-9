<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginAdminController extends Controller
{
    public function login()
    {
        return view('admin.login-admin');
    }

    public function login_admin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('adminHome'));
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Email/Password Salah');

        return redirect('/admin');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }

    public function AdminUser()
    {
        $admin = User::get();
        return view('/admin/admin-user', ['admin' => $admin]);
    }

    public function add_admin(Request $request)
    {
        $password = $request->password;
        $hashed = Hash::make($password);
        User::create(['name' => $request->name, 'email' => $request->email, 'password' => $hashed]);
        return redirect(route('indexAdmin'))->with(['success' => 'Data Berhasil Di Ditambah!']);
    }

    public function destroy($id)
    {
        $adminDeleted = User::findOrFail($id);
        $adminDeleted->delete();

        return redirect(route('indexAdmin'))->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
