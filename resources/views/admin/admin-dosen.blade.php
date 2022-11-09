@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Dosen</h6>
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
                <button type="button" class="btn btn-primary m-2 align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-plus me-2"></i>Add Dosen</button>
                <Button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-file-import me-2"></i>Import Data Dosen</Button>
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
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">No Handphone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosenList as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nip}}</td>
                                <td>{{$item->nm_dos}}</td>
                                <td>{{$item->no_hp}}</td>
                                <td>
                                    <a href="{{route('editDos', $item->nip)}}" type="button" class="btn btn-sm btn-warning">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('deleteDos', $item->nip)}}" method="POST" style="display: inline-block">
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

<!-- Start Modal Input Input Manual Data Dosen -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="{{route('storeDos')}}" method="POST">
            @csrf
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Input Data Dosen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" name="nip" class="form-control" id="floatingInput" >
                <label for="floatingInput">NIP</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="password" class="form-control" id="floatingInput" >
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="nm_dos" class="form-control" id="floatingInput" >
                <label for="floatingInput">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="no_hp" class="form-control" id="floatingInput" >
                <label for="floatingInput">No.Handphone/WA</label>
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
<!-- End Modal Input Input Manual Data Dosen -->
@endsection