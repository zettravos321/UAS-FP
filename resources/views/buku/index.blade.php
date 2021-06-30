@extends('buku.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        </div>
        <br>
        <br>
        <br>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('buku.create') }}"> Create New Buku</a>
            <a class="btn btn-primary" href="{{ route('cetak-book') }}" target="_blank"> Cetak Laporan Data Buku</a>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Cover</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($buku as $buku1)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $buku1->judul }}</td>
        <td>{{ $buku1->penulis }}</td>
        <td>{{ $buku1->penerbit }}</td>
        <td>
            <img src="{{ asset('img/'. $buku1->cover)}}" alt="" width="50px" height="70px">
            <a href="{{ asset('img/'. $buku1->cover)}}" target="_blank">Lihat Gambar</a>
        </td>
        <td>
            <form action="{{ route('buku.destroy',$buku1->id) }}" method="POST">

                <a class="btn btn-success" href="{{ route('buku.show',$buku1->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('buku.edit',$buku1->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $buku->links() !!}

@endsection