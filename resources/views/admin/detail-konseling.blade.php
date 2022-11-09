@extends('layouts.mainlayoutAdmin')
@section('title', 'Detail Konseling')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Detail Konseling</h6>
                <Button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-file-export me-2"></i>Export Detail Konseling ( pdf File )</Button>
                <div class="row">
                    <div class="col-lg-4">
                        <form action="" role="form">
                            <input type="text" class="form-control" placeholder="Pencarian ......">
                        </form>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail_konseling as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->dosen->nm_dos}}</td>
                            <td>{{$item->mahasiswa->nm_mhs}}</td>
                            <td>{{$item->mahasiswa->prodi->jurusan->nm_jur}}</td>
                            <td>{{$item->mahasiswa->prodi->nm_prodi}}</td>
                            <td>{{$item->mahasiswa->kelas->nm_kelas}}-{{$item->mahasiswa->kelas->angkatan}}</td>
                            <td>{{$item->topik}}</td>
                            <td>
                                <a href="{{route('detailKonseling', $item->id)}}"><button class="btn btn-sm btn-primary">Details</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          
        </div>
    </div>
</div>
@endsection