@extends('layout.main')
@section('customcss')
@endsection
@section('content')

<h1 class="text-center">{{$data['surah']['nama_latin']}}</h1>
<h3 class="text-center">({{$data['surah']['arti']}})</h3>

<div class="container">
    @foreach ($data['surah']['ayat'] as $a )
    <div class="container border-top mb-4" id="1">
        <div class="row mt-4">
            <div class="col">
                <div class="text-start">{{$a['nomor']}}.</div>
                <div class="text-end">{{$a['ar']}}</br></div>
                <div class="text-end">{{$a['tr']}}</br></div>
                <div class="text-end text-secondary">{{$a['idn']}}</div>
            </div>
            <!-- <div class="col">

            </div> -->
        </div>
    </div>
@endforeach
</div>

@endsection
@section('customjs')
@endsection
