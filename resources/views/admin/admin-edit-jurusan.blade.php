@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12-lg col-6-md">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Edit Jurusan</h4>
            <form action="{{route('updateJurusan', $jurusan->id_jur)}}" method="POST">
                @csrf
                @method('PUT')
                <input name="id_jur" type="hidden" value="{{$jurusan->id_jur}}">
                <div class="form-floating mb-3">
                    <input type="text" name="nm_jur" value="{{$jurusan->nm_jur}}" class="form-control" id="floatingInput">
                    <label for="floatingInput">Nama Jurusan</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="nipdos" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option selected>-- pilih prodi --</option>
                        @foreach ($dosen as $item)
                            <option value="{{$item->nip}}" @if ($item->nip == $jurusan->dosen->nip)
                                @selected(true)
                            @endif>{{$item->nm_dos}}</option>
                        @endforeach
                    </select>
                    <label for="floatingSelect">Kepala Jurusan</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection