@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Kelas</h6>
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
                <button type="button" class="btn btn-primary m-2 align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-plus me-2"></i>Add Kelas</button>
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
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelasList as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nm_kelas}}</td>
                                <td>{{$item->angkatan}}</td>
                                <td>{{$item->dosen->nm_dos}}</td>
                                <td>{{$item->prodi->nm_prodi}}</td>
                                <td>
                                    <a href="{{route('editKelas', $item->id_kelas)}}" type="button" class="btn btn-sm btn-warning">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('deleteKelas', $item->id_kelas)}}" method="POST" style="display: inline-block">
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

 <!-- Modal Input Manual Data Kelas -->
 <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <form action="{{route('storeKelas')}}" method="POST">
        @csrf
        
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Input Data Kelas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" name="nm_kelas" class="form-control" id="floatingInput" placeholder="Nama Kelas" required>
                <label for="floatingInput">Nama Kelas</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="angkatan" class="form-control" id="floatingInput" placeholder="Angkatan" required>
                <label for="floatingInput">Angkatan</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="nip_dos" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option>-- Pilih Dosen --</option>
                    @foreach ($dosen as $item)
                        <option value="{{$item->nip}}">{{$item->nm_dos}}</option>
                    @endforeach
                 </select>
                <label for="floatingSelect">Wali Kelas</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="jurusan_id"
                    aria-label="Floating label select example"required>
                    <option selected>-- Pilih Jurusan --</option>
                    @foreach ($jurusanList as $jur)
                        <option value="{{$jur->id_jur}}">{{$jur->nm_jur}}</option>
                    @endforeach
                </select>
                <label for="jurusan_id">Jurusan</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="prodi_id" id="prodi_id"
                    aria-label="Floating label select example" required>
                </select>
                <label for="prodi_id">Prodi</label>
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

@section('js')
    <script>
        $(function () {
            $('#jurusan_id').on('change', function(e){
                
                let jurusan_id = $(this).val()
                $.ajax({
                    type: "POST",
                    url: "{{route('getProdi')}}",
                    data: {jurusan_id:jurusan_id},
                    datatype: "json",
                    cache: false,

                    success: function(data){
                        if(data){
                            $('#prodi_id').empty();
                            $('#prodi_id').append('<option hidden>Pilih Prodi</option>');
                            // console.log(data);
                            $.each(data.prodi, function(key, prodi){
                                // console.log('|'+'ini prodi'+prodi.id);
                                $('#prodi_id').append('<option value="'+prodi.id_prodi+'">'+prodi.nm_prodi+'</option>');
                            });
                        }
                        else{
                            $('#prodi_id').empty();
                        }
                    },
                    error: function(e){
                        console.log('error:',e);
                    },
                });
            });
        });

        
    </script>
@endsection