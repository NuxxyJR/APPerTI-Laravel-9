@extends('layouts.mainlayoutAdmin')
@section('title', 'Data Konseling')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Data Konseling</h6>
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle me-2"></i>{{$message}}
            </div>
            <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                    });
                }, 2000);
            </script>
            @endif
            {{-- @foreach ($konseling as $data)
                {{$data->mahasiswa->kelas}}
            @endforeach --}}
                <Button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-file-export me-2"></i>Export Data Konseling ( pdf File )</Button>
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
                            <th scope="col">NIM</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Status Konseling</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konseling as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->mahasiswa->nim}}</td>
                            <td>{{$item->mahasiswa->nm_mhs}}</td>
                            <td>{{$item->mahasiswa->prodi->jurusan->nm_jur}}</td>
                            <td>{{$item->mahasiswa->prodi->jenjang}}-{{$item->mahasiswa->prodi->nm_prodi}}</td>
                            <td>{{$item->mahasiswa->kelas->nm_kelas}}-{{$item->mahasiswa->kelas->angkatan}}</td>
                            <td>
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <input class="form-check-input" type="checkbox" checked disabled>
                                <input class="form-check-input" type="checkbox" checked disabled>
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