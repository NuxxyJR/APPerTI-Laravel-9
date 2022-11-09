@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Jurusan</h6>
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
                    <button type="button" class="btn btn-primary m-2 align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-plus me-2"></i>Add Jurusan</button>
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
                                <th scope="col">Nama Jurusan</th>
                                <th scope="col">Kepala Jurusan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurusanList as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nm_jur}}</td>
                                <td>{{$item->dosen->nm_dos}}</td>
                                <td>
                                    <a href="{{route('editJurusan', $item->id_jur)}}" type="button" class="btn btn-sm btn-warning">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="admin-jurusan/delete/{{$item->id_jur}}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
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

    <!-- Modal Input Manual Data Jurusan -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <form action="admin-jurusan" method="post">
             @csrf
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Input Data Jurusan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nm_jur" id="floatingInput" placeholder="NIM" required>
                    <label for="floatingInput">Nama Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="nipdos"
                        aria-label="Floating label select example" required>
                        <option selected>-- Pilih Dosen --</option>
                        @foreach ($dosen as $item)
                            <option value="{{$item->nip}}">{{$item->nm_dos}}</option>
                        @endforeach
                     </select>
                    <label for="floatingSelect">Kepala Jurusan</label>
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