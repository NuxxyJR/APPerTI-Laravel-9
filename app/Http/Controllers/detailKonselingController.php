<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use Illuminate\Http\Request;
use App\Models\Detailkonseling;

class detailKonselingController extends Controller
{
    public function index()
    {
        // dd('Berhasil');
        $detail_konseling = Konseling::with('dosen', 'mahasiswa.prodi.jurusan', 'mahasiswa.kelas')->get();
        return view('/admin/detail-konseling', ['detail_konseling' => $detail_konseling]);
    }

    public function show($id)
    {
        $pesanMahasiswa = DetailKonseling::with('konseling')->select('chat', 'flag')->where('flag', '=', 'A', 'AND', 'id', $id)->get();
        // dd($pesanMahasiswa);
        $konseling = Konseling::with('detail_konseling', 'dosen.kelas', 'mahasiswa.kelas', 'mahasiswa.prodi.jurusan')->where('id', $id)->get();
        $detail_konseling = DetailKonseling::with('konseling.dosen.kelas', 'konseling.mahasiswa.prodi.jurusan')->where('id_konseling', $id)->orderBy('id')->get();
        return view('/admin/detail-bimbingan', ['detail_konseling' => $detail_konseling, 'konseling' => $konseling, 'pesanMahasiswa' => $pesanMahasiswa]);
    }

    public function showDetailKonselMhs($nim)
    {
        // dd('berhasil');
        $detail_konseling = Konseling::where('nim_mhs', '=', $nim)->get();
        return view('mahasiswa.mahasiswa-detail-konseling', ['detail_konseling' => $detail_konseling]);
    }

    public function showDetails($id)
    {
        $konseling = Konseling::with('detail_konseling', 'dosen.kelas', 'mahasiswa.kelas', 'mahasiswa.prodi.jurusan')->where('id', $id)->get();
        $detail_konseling = DetailKonseling::with('konseling.dosen.kelas', 'konseling.mahasiswa.prodi.jurusan')->where('id_konseling', $id)->orderBy('id')->get();
        return view('mahasiswa.mahasiswa-chat-konseling', ['konseling' => $konseling, 'detail_konseling' => $detail_konseling]);
    }

    public function createChat(Request $request)
    {
        $detail_konseling = DetailKonseling::create($request->all());
        return redirect()->back()->with(['success' => 'Pesan Berhasil Dikirim!']);
    }

    public function konselDos($nip)
    {
        $detail_konseling = Konseling::where('nip_dos', '=', $nip)->get();
        // dd($detail_konseling);
        if ($detail_konseling) {
            return view('dosen.dosen-konseling', ['detail_konseling' => $detail_konseling]);
        } else {
            abort(404);
        }
    }

    public function showDetailsKonselDos($id)
    {
        $konseling = Konseling::with('detail_konseling', 'dosen.kelas', 'mahasiswa.kelas', 'mahasiswa.prodi.jurusan')->where('id', $id)->get();
        $detail_konseling = DetailKonseling::with('konseling.dosen.kelas', 'konseling.mahasiswa.prodi.jurusan')->where('id_konseling', $id)->orderBy('id')->get();
        return view('dosen.dosen-chat-konseling', ['konseling' => $konseling, 'detail_konseling' => $detail_konseling]);
    }

    public function createChatDos(Request $request)
    {
        $detail_konseling = DetailKonseling::create($request->all());
        return redirect()->back()->with(['success' => 'Pesan Berhasil Dikirim!']);
    }
}
