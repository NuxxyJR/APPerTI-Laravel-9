<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class kelasController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::get();
        $prodi = Prodi::get();
        $dosen = Dosen::get();
        $kelas = Kelas::with('dosen')->get();
        return view('admin.admin-kelas', ['kelasList' => $kelas, 'dosen' => $dosen, 'prodi' => $prodi, 'jurusanList' => $jurusan]);
    }

    public function store(Request $request)
    {
        // dd('Berhasil');
        $kelas = Kelas::create($request->all());
        return redirect(route('indexKelas'))->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id_kelas)
    {
        $jurusan = Jurusan::get();
        $prodi = Prodi::get();
        $dosen = Dosen::get();
        $kelas = Kelas::with('dosen')->findOrFail($id_kelas);
        return view('admin.admin-edit-kelas', ['kelas' => $kelas, 'dosen' => $dosen, 'prodi' => $prodi, 'jurusan' => $jurusan]);
    }

    public function update(Request $request, $id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $kelas->update($request->all());

        return redirect(route('indexKelas'))->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function delete($id_kelas)
    {
        // dd('test');
        $kelas = Kelas::findOrFail($id_kelas);
        $kelas->delete();

        return redirect(route('indexKelas'))->with(['success' => 'Data Berhasil Di Hapus!']);
    }
}
