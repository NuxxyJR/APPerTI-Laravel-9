@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <a href="{{route('indexDetailKonseling')}}"><button class="btn btn-primary mb-4"><i class="fa fa-arrow-left"></i> Back</button></a>
            <h6 class="mb-4">Detail Konseling</h6>
            {{-- {{$detail_konseling}} --}}
            <table class="table">
                @foreach ($konseling as $item)
                <tr>
                    <td width="150px">Dosen  </td>
                    <td>: {{$item->dosen->nm_dos}}</td>
                </tr>
                <tr>
                    <td>Mahasiswa</td>
                    <td>: {{$item->mahasiswa->nm_mhs}}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: {{$item->mahasiswa->nim}}</td>
                </tr>
                <tr>
                    <td>Tanggal Konsul</td>
                    <td>: {{$item->created_at}}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>: {{$item->mahasiswa->kelas->prodi->jurusan->nm_jur}}</td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>: {{$item->mahasiswa->prodi->nm_prodi}}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: {{$item->mahasiswa->kelas->nm_kelas}} - {{$item->mahasiswa->kelas->angkatan}}</td>
                </tr>
                <tr>
                    <td>Kategori Masalah</td>
                    <td>: {{$item->topik}}</td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: {{$item->description}}</td>
                </tr>
                    
                @endforeach
                
            </table>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="rounded p-4 border">
                <nav class="navbar navbar-light px-4 py-0 rounded">
                    
                        
                    <i class="fa fa-user fa-2x"><span class="h6 ms-2">{{$konseling[0]->dosen->nm_dos}}</span></i>
                    
                </nav>
                <hr>
                <div class="overflow-scroll" style="max-height: 18rem;">
                    @foreach ($detail_konseling as $item)
                    <div>
                        <h6 class="">
                            @if ($item->flag == 'A')
                                {{$item->konseling->mahasiswa->nm_mhs}}
                                
                            @elseif ($item->flag == 'B')
                                {{$item->konseling->dosen->nm_dos}}
                            @endif
                        </h6>
                        <em id="tanggal">{{$item->created_at}}</em>
                        <p class="text-dark">{{$item->chat}}</p>
                    </div> 
                    @endforeach
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection