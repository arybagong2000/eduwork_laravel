<div>
    <nav class="navbar navbar-expand-lg bg-white mb-4">
        <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="color:#ff8400">TOKO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" aria-current="page" href="{{ route('products.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('carts.index') ? 'active' : '' }}" href="{{ route('carts.index') }}">Keranjang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.barang.index') ? 'active' : '' }}" href="{{ route('admin.barang.index') }}">Barang</a>
            </li>
            </ul>
            <ul class="navbar-nav navbar-admin">
            <li class="nav-item">
                <a class="nav-link" href="#">Admin</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
</div>