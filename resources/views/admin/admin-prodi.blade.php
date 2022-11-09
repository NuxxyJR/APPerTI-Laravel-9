@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')

    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Prodi</h6>
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{$message}}
                </div>
                <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                        });
                    }, 3000);
                </script>
                @endif
                    <button type="button" class="btn btn-primary m-2 align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-plus me-2"></i>Add Prodi</button>
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
                                <th scope="col">Nama Prodi</th>
                                <th scope="col">Jenjang</th>
                                <th scope="col">Kepala Prodi</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodiList as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nm_prodi}}</td>
                                <td>{{$item->jenjang}}</td>
                                <td>
                                    {{$item->dosen->nm_dos}}
                                </td>
                                <td>{{$item->jurusan->nm_jur}}</td>
                                <td>
                                    <a href="{{route('editProdi', $item->id_prodi)}}"><button type="button" class="btn btn-sm btn-warning">Edit</button></a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('deleteProdi', $item->id_prodi)}}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>

    <!-- Modal Input Manual Data Prodi -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
        
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Input Data Prodi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('storeProdi')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nm_prodi" id="nm_prodi" placeholder="NIM" required>
                    <label for="nm_prodi">Nama Prodi</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="jenjang" id="jenjang"
                        aria-label="Floating label select example" required>
                        <option selected>-- Pilih Jenjang --</option>
                        <option value="D4">D4</option>
                        <option value="D3">D3</option>
                     </select>
                    <label for="jenjang">Jenjang</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="id_jurusan" id="id_jurusan"
                        aria-label="Floating label select example" required>
                        <option selected>-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $item)
                            <option value="{{$item->id_jur}}">{{$item->nm_jur}}</option>
                        @endforeach
                    </select>
                    <label for="id_jurusan">Jurusan</label>
                </div>
                
                
                <div class="form-floating mb-3">
                    <select class="form-select" name="nip_dos" id="nip_dos"
                        aria-label="Floating label select example" required>
                        <option selected>-- Pilih Dosen --</option>
                        @foreach ($dosen as $item)
                            <option value="{{$item->nip}}">{{$item->nm_dos}}</option>
                        @endforeach
                     </select>
                    <label for="nip_dos">Kepala Prodi</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    <!-- End Modal Input Input Manual Data Mahasiswa -->
@endsection