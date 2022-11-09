<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class dosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::get();
        return view('/admin/admin-dosen', ['dosenList' => $dosen]);
    }

    public function store(Request $request)
    {
        // dd('berhasil');
        $hashed = Hash::make($request->password);
        $dosen = Dosen::create([
            'nip' => $request->nip,
            'nm_dos' => $request->nm_dos,
            'no_hp' => $request->no_hp,
            'password' => $hashed,
        ]);
        return redirect(route('indexDos'))->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($nip)
    {
        $dosen = Dosen::findOrFail($nip);
        return view('admin.admin-edit-dosen', ['dosen' => $dosen]);
    }

    public function update(Request $request, $nip)
    {
        $dosen = Dosen::findOrFail($nip);
        $hashed = Hash::make($request->password);
        $dosen->update([
            'nip' => $request->nip,
            'nm_dos' => $request->nm_dos,
            'no_hp' => $request->no_hp,
            'password' => $hashed,
        ]);
        // dd($dosen);
        return redirect(route('indexDos'))->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function destroy($nip)
    {
        $dosen = Dosen::findOrFail($nip);
        $dosen->delete();
        return redirect(route('indexDos'))->with(['success' => 'Data Berhasil Di Hapus!']);
    }
}
