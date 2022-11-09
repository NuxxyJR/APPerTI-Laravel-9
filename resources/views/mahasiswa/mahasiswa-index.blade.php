@extends('layouts.mainlayoutMahasiswa')
@section('title', 'Mahasiswa')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Pengumuman Konseling</h6>
            <div class="table-responsive mt-2">
                <form action="" class="form-group">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;" readonly>{{$info[0]->news}}</textarea>
                        <label for="floatingTextarea">Pengumuman Tentang Jadwal Konseling</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection