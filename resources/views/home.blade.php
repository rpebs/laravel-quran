@extends('layout.main')
@section('customcss')
@endsection
@section('content')
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dhanyrpebs - Quran</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<h1 class="text-center mt-3">Daftar Surat</h1>
<div class="container">
    <div class="row">
        @foreach ($data['surah'] as $s )
        <div class="col-md-4">

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

        </div>
        @endforeach

    </div>
</div>
@endsection
@section('customjs')
@endsection
