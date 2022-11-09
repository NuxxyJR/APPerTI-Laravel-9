<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Crypt;

class mahasiswaController extends Controller
{

    public function index()
    {
        $jurusan = Jurusan::with(['prodi'])->get();
        $kelas = Kelas::get();
        $prodi = Prodi::get();
        $mahasiswa = Mahasiswa::with(['prodi.jurusan'])->get();
        return view('admin.admin-mahasiswa', ['mahasiswaList' => $mahasiswa, 'jurusanList' => $jurusan, 'prodiList' => $prodi, 'kelasList' => $kelas]);
    }

    public function show($nim)
    {
        $kelas = Kelas::get();
        $prodi = Prodi::get();
        $jurusan = Jurusan::with(['prodi'])->get();
        // $mahasiswa = Mahasiswa::with(['prodi.jurusan.dosen.kelas'])->where('nim', '=', $nim)->first();
        $mahasiswa = Mahasiswa::with(['prodi.jurusan.dosen.kelas'])->findOrFail($nim);
        return view('admin.admin-detail-mahasiswa', ['mahasiswa' => $mahasiswa, 'jurusanList' => $jurusan, 'prodiList' => $prodi, 'kelasList' => $kelas]);
    }

    public function getProdi(Request $request)
    {
        $prodi = Prodi::where('id_jurusan', $request->jurusan_id)->get();
        return response()->json(['prodi' => $prodi]);
    }

    public function store(Request $request)
    {
        $password = $request->password;
        $encrypt = Hash::make($password);
        Mahasiswa::create([
            'nim' => $request->nim,
            'nm_mhs' => $request->nm_mhs,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tpt_lahir' => $request->tpt_lahir,
            'alamat_mhs' => $request->alamat_mhs,
            'no_hp' => $request->no_hp,
            'prodi_id' => $request->prodi_id,
            'kelas_id' => $request->kelas_id,
            'password' => $encrypt
        ]);
        return redirect('/admin/admin-mahasiswa')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $password = $request->password;
        $encrypt = Hash::make($password);
        $mahasiswa->update([
            'nim' => $request->nim,
            'nm_mhs' => $request->nm_mhs,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'tpt_lahir' => $request->tpt_lahir,
            'alamat_mhs' => $request->alamat_mhs,
            'no_hp' => $request->no_hp,
            'prodi_id' => $request->prodi_id,
            'kelas_id' => $request->kelas_id,
            'password' => $encrypt
        ]);
        return redirect()->back()->with(['success' => 'Data Berhasil Di Update!']);
    }

    public function destroy($nim)
    {
        $mahasiswaDeleted = Mahasiswa::findOrFail($nim);
        $mahasiswaDeleted->delete();

        return redirect('/admin/admin-mahasiswa')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function showKonseling($nim)
    {
        $mahasiswa = Mahasiswa::with(['prodi.jurusan.dosen.kelas'])->findOrFail($nim);
        return view('mahasiswa.mahasiswa-konseling', ['mahasiswa' => $mahasiswa]);
    }
}
