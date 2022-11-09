@extends('layouts.mainlayoutDosen')
@section('title', 'DOSEN')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Pengumuman Konseling</h6>
                
            <div class="table-responsive mt-2">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here"
                        id="floatingTextarea" style="height: 150px;" readonly>{{$info[0]->news}}</textarea>
                    <label for="floatingTextarea">Pengumuman Tentang Jadwal Konseling</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card text-dark bg-light border-0">
            <div class="card-body">
                <h5 class="card-title">D4-Teknologi Rekayasa Komputer</h5>
                <p class="card-text">7A-2019</p>
                <a href="detail-kelas.html" class="btn btn-primary">Lihat</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-4">
        <div class="card text-dark bg-light border-0">
            <div class="card-body">
                <h5 class="card-title">D3-Teknik Komputer</h5>
                <p class="card-text">6A-2019</p>
                <a href="detail-kelas.html" class="btn btn-primary">Lihat</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-4">
        <div class="h-100 bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Calender</h6>
            </div>
            <div id="calender"></div>
        </div>
    </div>
@endsection