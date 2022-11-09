<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class infoController extends Controller
{
    public function indexNews()
    {
        $info = Info::all();
        return view('admin.pengumuman-konseling', ['info' => $info]);
    }

    public function updateNews(Request $request, $id)
    {
        $info = Info::findOrFail($id);
        $info->update($request->all());
        return redirect(route('indexNews'))->with(['success' => 'Pengumuman Berhasil Dikirim !']);
    }

    public function indexNewsMhs()
    {
        // dd('tets');
        $info = Info::all();
        return view('mahasiswa.mahasiswa-index', ['info' => $info]);
    }

    public function indexNewsDos()
    {
        $info = Info::all();
        return view('dosen.dosen-index', ['info' => $info]);
    }
}
