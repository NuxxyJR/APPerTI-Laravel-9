<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class prodiController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::get();
        $dosen = Dosen::get();
        $prodi = Prodi::with(['jurusan', 'dosen'])->get();
        return view('/admin/admin-prodi', ['prodiList' => $prodi, 'jurusan' => $jurusan, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $prodi = Prodi::create($request->all());
        return redirect(route('indexProdi'))->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id_prodi)
    {
        // dd('berhasil');
        $jurusan = Jurusan::get();
        $dosen = Dosen::get();
        $prodi = Prodi::with('jurusan', 'dosen')->findOrFail($id_prodi);
        return view('admin/admin-edit-prodi', ['prodi' => $prodi, 'dosen' => $dosen, 'jurusan' => $jurusan]);
    }

    public function update(Request $request, $id_prodi)
    {
        $prodi = Prodi::findOrFail($id_prodi);
        $prodi->update($request->all());

        return redirect(route('indexProdi'))->with(['success' => 'Data Berhasil Di Update']);
    }

    public function destroy($id_prodi)
    {
        $prodiDeleted = Prodi::findOrFail($id_prodi);
        $prodiDeleted->delete();
        return redirect(route('indexProdi'))->with(['success' => 'Data Berhasil Dihapus !']);
    }
}
