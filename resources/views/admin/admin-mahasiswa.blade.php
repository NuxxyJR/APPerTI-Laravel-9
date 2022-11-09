
@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Mahasiswa</h6>
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
                    <button type="button" class="btn btn-primary m-2 align-items-start" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fa fa-plus me-2"></i>Add Mahasiswa</button>
                    <Button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-file-import me-2"></i>Import Data Mahasiswa</Button>
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswaList as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nim}}</td>
                                <td>{{$item->nm_mhs}}</td>
                                <td>{{$item->prodi->jurusan->nm_jur}}</td>
                                <td>{{$item->prodi->nm_prodi}}</td>
                                <td>
                                    <a href="/admin/admin-detail-mahasiswa/{{$item->nim}}"><button type="button" class="btn btn-sm btn-primary">Details</button></a>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('deleteMhs', $item->nim)}}" method="POST" style="display: inline-block">
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

    <!-- Modal Input Manual Data Mahasiswa -->
    
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        
           
        <div class="modal-dialog modal-dialog-scrollable">
            
                
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Input Data Mahasiswa</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                
                <form action="{{route('store')}}" method="POST">
                    @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="nim" class="form-control" id="floatingInput" placeholder="NIM" required>
                    <label for="floatingInput">NIM</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nm_mhs" class="form-control" id="floatingInput" placeholder="Nama Lengkap" required>
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="password" class="form-control" id="floatingInput" placeholder="Password" required>
                    <label for="floatingInput">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <p class="form-label">Jenis Kelamin :</p>
                    <div class="form-check-inline">
                        <input type="radio" name="jenis_kelamin" class="form-check-input" id="L" value="L">
                        <label class="form-check-label" for="L">Laki - Laki</label>
                    </div>
                    <div class="form-check-inline">
                        <input type="radio" name="jenis_kelamin" class="form-check-input" id="P" value="P">
                        <label class="form-check-label" for="P">Perempuan</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tgl_lahir" class="form-control" id="floatingInput" placeholder="Tanggal Lahir" required>
                    <label for="floatingInput">Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tpt_lahir" class="form-control" id="floatingInput" placeholder="Tempat Lahir" required>
                    <label for="floatingInput">Tempat Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="alamat_mhs" placeholder="Leave a comment here"
                        id="floatingTextarea" style="height: 150px;" required></textarea>
                    <label for="floatingTextarea">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="no_hp" class="form-control" id="floatingInput" placeholder="No Handphone" required>
                    <label for="floatingInput">No Handphone ( WhatsApp )</label>
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
                <div class="form-floating mb-3">
                    <select class="form-select" name="kelas_id" id="kelas_id"
                        aria-label="Floating label select example" required>
                        <option selected>-- Pilih Kelas --</option>
                        @foreach ($kelasList as $item)
                            <option value="{{$item->id_kelas}}">{{$item->nm_kelas}}-{{$item->angkatan}}-{{$item->prodi->nm_prodi}}</option>
                        @endforeach
                    </select>
                    <label for="kelas_id">Kelas</label>
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
@endsection
    <!-- End Modal Input Input Manual Data Mahasiswa -->
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