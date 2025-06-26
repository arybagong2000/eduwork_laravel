@extends('layout.master')
@section('title','Toko Sagalana')
@section('content')
<div class="row" id="produk-list">
    @foreach( $barang as $v)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
      <div class="produk-card w-100 p-2">
        <img src="{{ $v->gambar}}" alt="{{ $v->nama}}" class="produk-img w-100 mb-2">
        <span class="produk-kategori">{{ $v->kategori}}</span>
        <div class="produk-title">{{ $v->nama}}</div>
        <div class="produk-harga">{{ $v->harga}}</div>
        <div class="produk-desc">{{ $v->deskripsi}}</div>
        <button class="produk-btn mt-auto w-100">Beli Sekarang</button>
      </div>
    </div>
    @endforeach
    <div>
      {{ $barang->links() }}
    </div>
</div>
@endsection('content')

@section('javascript')
    
@endsection('javascript')

@section('cssstyle')
    @include('products.cssstyle')
@endsection('cssstyle')