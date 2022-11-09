@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12-lg col-6-md">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Edit Prodi</h4>
            <form action="{{route('updateProdi', $prodi->id_prodi)}}" method="POST">
                {{$prodi}}
                @csrf
                @method('PUT')
                <input name="id_prodi" type="hidden" value="{{$prodi->id_prodi}}">
                <div class="form-floating mb-3">
                    <input type="text" name="nm_prodi" value="{{$prodi->nm_prodi}}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Nama Prodi</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="jenjang" id="jenjang"
                        aria-label="Floating label select example" required>
                        <option>-- Pilih Jenjang --</option>
                        <option value="D4" @if($prodi->jenjang == 'D4') selected @endif>D4</option>
                        <option value="D3" @if($prodi->jenjang == 'D3') selected @endif>D3</option>
                     </select>
                    <label for="jenjang">Jenjang</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="id_jurusan" id="id_jurusan"
                        aria-label="Floating label select example" required>
                        <option>-- Pilih Jurusan --</option>
                        @foreach ($jurusan as $item)
                            <option value="{{$item->id_jur}}" @if ($item->id_jur == $prodi->id_jurusan)
                                @selected(true)
                            @endif>{{$item->nm_jur}}</option>
                        @endforeach
                    </select>
                    <label for="id_jurusan">Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="nip_dos" id="nip_dos"
                        aria-label="Floating label select example" required>
                        <option>-- Pilih Dosen --</option>
                        @foreach ($dosen as $item)
                            <option value="{{$item->nip}}" @if ($item->nip == $prodi->nip_dos)
                                @selected(true)
                            @endif>{{$item->nm_dos}}</option>
                        @endforeach
                     </select>
                    <label for="nip_dos">Kepala Prodi</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection