@extends('layout')
@section('title','Data Products')
@section('content')
    <ol>
        @foreach ($products as $k=>$v)
            <li>{{$v['nama_produk']}}</li>
        @endforeach
    </ol>
@endsection