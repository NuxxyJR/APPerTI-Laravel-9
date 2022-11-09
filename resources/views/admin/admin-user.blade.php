@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Data User Admin</h6>
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
                    <button type="button" class="btn btn-primary m-2 align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-plus me-2"></i>Add UserAdmin</button>
                    <div class="table-responsive mt-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('deleteAdmin', $item->id)}}" method="POST" style="display: inline-block">
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
          <form action="{{route('add_admin')}}" method="post">
             @csrf
            <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Input Data Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="nama" required>
                    <label for="floatingInput">Nama</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="email" required>
                    <label for="floatingInput">email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingInput" placeholder="password" required>
                    <label for="floatingInput">password</label>
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