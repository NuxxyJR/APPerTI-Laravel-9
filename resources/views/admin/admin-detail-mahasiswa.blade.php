@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Detail Mahasiswa</h6>
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
            <Strong class="h4">-- {{$mahasiswa->nm_mhs}} --</Strong> 
            <table class="table">
                <tr>
                    <td>NIM  </td>
                    <td>: {{$mahasiswa->nim}} </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin  </td>
                    <td>: 
                        @if ($mahasiswa->jenis_kelamin == 'L')
                        Laki - Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{$mahasiswa->tpt_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{$mahasiswa->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{$mahasiswa->alamat_mhs}}</td>
                </tr>
                <tr>
                    <td>No Handphone/WA</td>
                    <td>: {{$mahasiswa->no_hp}}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>: {{$mahasiswa->prodi->jurusan->nm_jur}}</td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>: {{$mahasiswa->prodi->nm_prodi}}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>: {{$mahasiswa->kelas->nm_kelas}} - {{$mahasiswa->kelas->angkatan}}</td>
                </tr>
            </table>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1">Edit</button>
        </div>
    </div>
</div>
{{-- Start modal --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
        
            <form action="{{route('updateMhs', $mahasiswa->nim)}}" method="POST">
                @csrf
                @method('put')
            <div class="form-floating mb-3">
                <input type="text" name="nim" class="form-control" id="floatingInput" placeholder="NIM" value="{{$mahasiswa->nim}}" required>
                <label for="floatingInput">NIM</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="nm_mhs" class="form-control" id="floatingInput" placeholder="Nama Lengkap" value="{{$mahasiswa->nm_mhs}}" required>
                <label for="floatingInput">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="password" class="form-control" id="floatingInput" placeholder="password" value="{{$mahasiswa->password}}" required>
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <p class="form-label">Jenis Kelamin :</p>
                <div class="form-check-inline">
                    <input type="radio" name="jenis_kelamin" class="form-check-input" id="L" value="L" @if ($mahasiswa->jenis_kelamin == 'L')
                        @checked(true)
                    @endif>
                    <label class="form-check-label" for="L">Laki - Laki</label>
                </div>
                <div class="form-check-inline">
                    <input type="radio" name="jenis_kelamin" class="form-check-input" id="P" value="P" @if ($mahasiswa->jenis_kelamin == 'P')
                        @checked(true)
                    @endif>
                    <label class="form-check-label" for="P">Perempuan</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" name="tgl_lahir" class="form-control" id="floatingInput" placeholder="Tanggal Lahir" value="{{$mahasiswa->tgl_lahir}}" required>
                <label for="floatingInput">Tanggal Lahir</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="tpt_lahir" class="form-control" id="floatingInput" placeholder="Tempat Lahir" value="{{$mahasiswa->tpt_lahir}}" required>
                <label for="floatingInput">Tempat Lahir</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="alamat_mhs" placeholder="Leave a comment here"
                    id="floatingTextarea" style="height: 150px;" required>{{$mahasiswa->alamat_mhs}}</textarea>
                <label for="floatingTextarea">Alamat</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="no_hp" class="form-control" id="floatingInput" placeholder="No Handphone" value="{{$mahasiswa->no_hp}}" required>
                <label for="floatingInput">No Handphone ( WhatsApp )</label>
            </div>
        
            <div class="form-floating mb-3">
                <select class="form-select" id="jurusan_id"
                    aria-label="Floating label select example"required>
                    <option>-- Pilih Jurusan --</option>
                    @foreach ($jurusanList as $jur)
                        <option value="{{$jur->id_jur}}" @if ($jur->id_jur == $mahasiswa->prodi->id_jurusan)
                            @selected(true)
                        @endif>{{$jur->nm_jur}}</option>
                    @endforeach
                </select>
                <label for="jurusan_id">Jurusan</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="prodi_id" id="prodi_id"
                    aria-label="Floating label select example" required>
                    @foreach ($prodiList as $prodi)
                        <option value="{{$prodi->id_prodi}}"@if ($prodi->id_prodi == $mahasiswa->prodi->id_prodi)
                            @selected(true)
                        @endif>{{$prodi->nm_prodi}}</option>
                    @endforeach
                </select>
                <label for="prodi_id">Prodi</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="kelas_id" id="kelas_id"
                    aria-label="Floating label select example" required>
                    <option selected>-- Pilih Kelas --</option>
                    @foreach ($kelasList as $item)
                        <option value="{{$item->id_kelas}}" @if ($item->id_kelas == $mahasiswa->kelas->id_kelas)
                            @selected(true)
                        @endif>{{$item->nm_kelas}}-{{$item->angkatan}}</option>
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
{{-- End Modal --}}
@endsection

@section('js')
<script>
    $(function () {
        $('#jurusan_id').on('click', function(e){
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