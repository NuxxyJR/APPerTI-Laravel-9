@extends('layouts.mainlayoutAdmin')
@section('title', 'Konseling')

@section('content')
<div class="row g-4">
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-chalkboard fa-3x text-primary"></i>
            <div class="ms-3">
                <strong class="mb-2">Pengumuman Konseling</strong>
                <a href="/admin/pengumuman-konseling"><button class="btn btn-primary">Lihat</button></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-book-reader fa-3x text-primary"></i>
            <div class="ms-3">
                <strong class="mb-2">Data Konseling</strong>
                <a href="{{route('indexDataKonseling')}}"><button class="btn btn-primary">Lihat</button></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa fa-info-circle fa-3x text-primary"></i>
            <div class="ms-3">
                <strong class="mb-2">Detail Konseling</strong>
                <a href="{{route('indexDetailKonseling')}}"><button class="btn btn-primary">Lihat</button></a>
            </div>
        </div>
    </div>
</div>
@endsection