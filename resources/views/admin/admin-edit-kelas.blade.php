@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12-lg col-6-md">
        <div class="bg-light rounded h-100 p-4">
            <a href="{{route('indexKelas')}}" type="button" class="btn btn-primary mb-3"><i class="fa fa-arrow-left "> Back</i> </a>
            <h4 class="mb-4">Edit Kelas</h4>
            <form action="{{route('updateKelas', $kelas->id_kelas)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="nm_kelas" value="{{$kelas->nm_kelas}}" class="form-control" id="floatingInput"  >
                    <label for="floatingInput">Nama Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="angkatan" value="{{$kelas->angkatan}}" class="form-control" id="floatingInput" >
                    <label for="floatingInput">Angkatan</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="nip_dos" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option>-- Pilih Dosen --</option>
                        @foreach ($dosen as $item)
                            <option value="{{$item->nip}}" @if ($item->nip == $kelas->nip_dos)
                                selected
                            @endif>{{$item->nm_dos}}</option>
                        @endforeach
                     </select>
                    <label for="floatingSelect">Wali Kelas</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="jurusan_id"
                        aria-label="Floating label select example"required>
                        <option selected>-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $jur)
                            <option value="{{$jur->id_jur}}">{{$jur->nm_jur}}</option>
                        @endforeach
                    </select>
                    <label for="jurusan_id">Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="prodi_id" id="prodi_id"
                        aria-label="Floating label select example" required>
                        @foreach ($prodi as $item)
                            <option value="{{$item->id_prodi}}" @if ($item->id_prodi == $kelas->prodi_id)
                                selected
                            @endif>{{$item->nm_prodi}}</option>
                        @endforeach
                    </select>
                    <label for="prodi_id">Prodi</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
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
                            $('#prodi_id').append('<option hidden>-- Pilih Prodi --</option>');
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