@extends('layouts.mainlayoutMahasiswa')
@section('title', 'Mahasiswa')


@section('content')
<div class="row g-4">
    <div class="col-12">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
                });
            }, 3000);
        </script>
        @endif
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Konseling</h6>
            <div class="table-responsive mt-2">
                <form action="{{route('konselingMahasiswa')}}" method="POST" class="form-group">
                    @csrf
                <table class="table">
                    <input type="text" name="nim_mhs" value="{{$mahasiswa->nim}}" hidden>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>: <input type="text" name="nip_dos" value="{{$mahasiswa->kelas->dosen->nip}}" hidden> {{$mahasiswa->kelas->dosen->nm_dos}}</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>: {{$mahasiswa->kelas->nm_kelas}}-{{$mahasiswa->kelas->angkatan}} | {{$mahasiswa->kelas->prodi->nm_prodi}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Masalah </td>
                        <td>
                            <select name="topik" class="form-select" id="floatingSelect">
                                <option selected>-- Pilih Kategori --</option>
                                <option value="Akademik">Akademik</option>
                                <option value="Non Akademik">Non Akademik</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal ( Sekarang )</td>
                        <td>: <span id="tanggal"></span></td>
                    </tr>
                </table>
                    <div class="form-floating">
                        <textarea name="description" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Deskripsikan Permasalahanmu</label>
                    </div>
                    <button type="submit" class="btn btn-primary m-2 align-items-start"><i class="fa fa-paper-plane me-2"></i>Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
        let dt = new Date();
        document.getElementById("tanggal").innerHTML = dt.toLocaleDateString();
</script>
@endsection