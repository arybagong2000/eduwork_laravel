@extends('layout.master')
@section('title','Toko Sagalana')
@section('content')
<div class="row" id="produk-list">
    <!-- Produk akan ditampilkan di sini oleh JavaScript -->
</div>
@endsection('content')

@section('javascript')
    @include('products.products-dummy')
    function tampilkanProduk(data) {
      const produkList = document.getElementById('produk-list');
      let html = '';
      if (data.length === 0) {
        html = `<div class="col-12"><div class="alert alert-warning text-center">Produk dengan kategori tersebut tidak ditemukan.</div></div>`;
      } else {
        data.forEach((item) => {
          html += `
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex">
              <div class="produk-card w-100 p-2">
                <img src="${item.gambar}" alt="${item.nama}" class="produk-img w-100 mb-2">
                <span class="produk-kategori">${item.kategori}</span>
                <div class="produk-title">${item.nama}</div>
                <div class="produk-harga">${item.harga}</div>
                <div class="produk-desc">${item.deskripsi}</div>
                <button class="produk-btn mt-auto w-100">Beli Sekarang</button>
              </div>
            </div>
          `;
        });
      }
      produkList.innerHTML = html;
    }
    // Tampilkan semua produk saat halaman pertama kali dibuka
    tampilkanProduk(produk);
@endsection('javascript')

@section('cssstyle')
    @include('products.cssstyle')
@endsection('cssstyle')