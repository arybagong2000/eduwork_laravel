@extends('layout.master')
@section('title','Keranjang belanja')
@section('content')
<div class="row" id="cart-list">
  <div class="card">
    <div class="card-header">List Keranjang</div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-bordered mb-0">
              <thead style="background:#ff8400;color:#fff;">
                  <tr>
                      <th>Produk</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th width="12%">Aksi</th>
                  </tr>
              </thead>
              <tbody id="carts-list">
                <!-- Produk akan ditampilkan di sini oleh JavaScript -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection('content')

@section('javascript')
    @include('carts.carts-dummy')
    function tampilkanKeranjang(data) {
      const cartsList = document.getElementById('carts-list');
      let html = '';
      if (data.length === 0) {
        html = `<div class="col-12"><div class="alert alert-warning text-center">Produk dengan kategori tersebut tidak ditemukan.</div></div>`;
      } else {
        data.forEach((item) => {
          html += `
            <tr>
              <td>
                  <img src="${item.gambar}" class="produk-img me-2 mb-1">
                  ${item.nama}
              </td>
              <td>${item.kategori}</td>
              <td>${item.harga}</td>
              <td>${item.qty}</td>
              <td>
                  <a href="#" class="btn btn-sm btn-danger"
                      onclick="return confirm('Hapus item ini dari keranjang?')">
                      <i class="bi bi-trash"></i> Remove
                  </a>
              </td>
            </tr>
          `;
        });
      }
      cartsList.innerHTML = html;
    }
    // Tampilkan semua produk saat halaman pertama kali dibuka
    tampilkanKeranjang(carts);
@endsection('javascript')

@section('cssstyle')
    @include('carts.cssstyle')
@endsection('cssstyle')