<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    public function index()
    {
        // $mahasiswa = Mahasiswa::with('prodi.jurusan', 'kelas');
        $konseling = Konseling::with(['dosen', 'mahasiswa.prodi.jurusan', 'mahasiswa.kelas'])->get();
        return view('admin.data-konseling', ['konseling' => $konseling]);
    }

    public function konselingMahasiswa(Request $request)
    {
        $konseling = Konseling::create($request->all());
        return redirect()->back()->with(['success' => 'Data Konseling Berhasil Dikirim!']);
    }
}
