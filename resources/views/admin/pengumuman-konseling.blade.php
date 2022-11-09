@extends('layouts.mainlayoutAdmin')
@section('title', 'ADMIN')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Pengumuman Konseling</h6> 
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
            <div class="table-responsive mt-2">
                <form action="{{route('updateNews', $info[0]->id)}}" method="POST" class="form-group">
                    <div class="form-floating">
                        @csrf
                        @method('PUT')
                        <textarea name="news" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;">{{$info[0]->news}}</textarea>
                        <label for="floatingTextarea">Pengumuman Tentang Jadwal Konseling</label>
                    </div>
                    <button type="submit" class="btn btn-primary m-2 align-items-start"><i class="fa fa-paper-plane me-2"></i>Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection