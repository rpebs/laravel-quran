@extends('layout.main')
@section('customcss')
<style>

    .arab {
    font-size: 2em;
    font-family: fontArab;
    line-height: 3!important;
    color:green;
}

</style>
@endsection
@section('content')
<h1 class="text-center mt-3">Daftar Surat</h1>
<div class="container">
    <div class="row">
        @foreach ($data['surah'] as $s )
        <div class="col-md-4">
            <a class="text-decoration-none text-black" href="/baca/surat/{{$s['nomor']}}">
                <div class="d-flex justify-content-between border border-1 rounded mb-3 p-2 list">
                    <p class="align-self-lg-start w-number">
                        {{$s['nomor']}}
                    </p>
                    <div class="align-self-center d-block">
                        <p class="w-name">{{$s['nama_latin']}} ({{$s['jumlah_ayat']}}) </p>
                        <p>{{$s['arti']}}</p>
                    </div>
                    <div class="align-self-center arab">{{$s['nama']}}</div>
                    <!-- <div class="position-absolute align-self-end p-1">
                        <img src="/aset/circle.png" alt="ok" style="width: 15px">
                    </div> -->
                </div>
            </a>

        </div>
        @endforeach

    </div>
</div>
@endsection
@section('customjs')
@endsection
