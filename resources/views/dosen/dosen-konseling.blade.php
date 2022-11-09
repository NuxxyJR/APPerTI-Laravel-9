@extends('layouts.mainlayoutDosen')
@section('title', 'DOSEN')
@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Konseling</h6>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Wali Kelas</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Kelas</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($detail_konseling as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td id="tanggal">{{$item->created_at}}</td>
                        <td>{{$item->dosen->nm_dos}}</td>
                        <td>{{$item->mahasiswa->nm_mhs}}</td>
                        <td>{{$item->mahasiswa->kelas->nm_kelas}}-{{$item->mahasiswa->kelas->angkatan}}</td>
                        <td class="text-center"><input class="form-check-input" type="checkbox" checked disabled></td>
                        <td>
                            <a href="{{route('dosenChatKonseling', $item->id)}}"><button type="button" class="btn btn-sm btn-primary">Details</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection