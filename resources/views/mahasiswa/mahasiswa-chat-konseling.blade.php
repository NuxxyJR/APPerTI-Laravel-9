@extends('layouts.mainlayoutMahasiswa')
@section('title', 'MAHASISWA')
@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <a href="{{route('mahasiswaDetailKonseling', Auth::guard('mahasiswa')->user()->nim)}}"><button class="btn btn-primary mb-4"><i class="fa fa-arrow-left"></i> Back</button></a>
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
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                    }, 3000);
                </script>
                @endif
                <form action="{{route('createChat')}}" method="POST" class="form-group mt-2">
                    @csrf
                    <input type="text" name="id_konseling" value="{{$konseling[0]->id}}" hidden>
                    <input type="text" name="flag" value="A" hidden>
                    <textarea class="form-control" name="chat"  placeholder="Ketik Pesan ...." id="floatingTextarea"></textarea>
                    <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                </form>
            </div>
            
        </div>
        
    </div>
</div>
@endsection