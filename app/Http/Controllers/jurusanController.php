<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class jurusanController extends Controller
{
    public function index()
    {
        $dosen = Dosen::get();
        $jurusan = Jurusan::get();
        return view('admin/admin-jurusan', ['jurusanList' => $jurusan, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $jurusan = Jurusan::create($request->all());
        return redirect('/admin/admin-jurusan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id_jur)
    {
        $jurusanDeleted = Jurusan::findOrFail($id_jur);
        $jurusanDeleted->delete();

        return redirect('/admin/admin-jurusan')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function getDosen($id_jur)
    {
        $dosen = Dosen::get();
        $jurusan = Jurusan::with('dosen')->findOrFail($id_jur);
        return response()->json(['jurusan' => $jurusan, 'dosens' => $dosen]);
    }

    public function edit($id_jur)
    {
        $dosen = Dosen::get();
        $jurusan = Jurusan::with('dosen')->findOrFail($id_jur);
        return view('admin.admin-edit-jurusan', ['jurusan' => $jurusan, 'dosen' => $dosen]);
    }

    public function update(Request $request, $id_jur)
    {
        $jurusan = Jurusan::findOrFail($id_jur);
        $jurusan->update($request->all());
        return redirect('/admin/admin-jurusan')->with(['success' => 'Data Berhasil Di Edit']);
    }
}
