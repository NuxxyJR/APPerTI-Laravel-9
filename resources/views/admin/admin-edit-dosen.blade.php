@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12-lg col-6-md">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Edit Dosen</h4>
            <form action="{{route('updateDos', $dosen->nip)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="nip" value="{{$dosen->nip}}" class="form-control" id="floatingInput" >
                    <label for="floatingInput">NIP</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="password" value="{{$dosen->password}}" class="form-control" id="floatingInput" >
                    <label for="floatingInput">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nm_dos" value="{{$dosen->nm_dos}}" class="form-control" id="floatingInput" >
                    <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="no_hp" value="{{$dosen->no_hp}}" class="form-control" id="floatingInput" >
                    <label for="floatingInput">No.Handphone/WA</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection