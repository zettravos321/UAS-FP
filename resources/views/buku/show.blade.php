@extends('buku.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
            <h2> Show Book</h2>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('buku.index') }}"> Back</a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Judul:</strong>
            {{ $buku->judul }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Penulis:</strong>
            {{ $buku->penulis }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Penerbit:</strong>
            {{ $buku->penerbit }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cover:</strong>
            <br>
            <img src="{{ asset('img/'. $buku->cover)}}" alt="" width="100px" height="170px"> <br>
            <a href="{{ asset('img/'. $buku->cover)}}" target="_blank">Lihat Gambar</a>
        </div>
    </div>
</div>
@endsection