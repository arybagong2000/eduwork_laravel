<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mt-4">
                    <h1 class="fw-bold mb-4">Dashboard</h1>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card dashboard-card card-blue shadow-sm h-100">
                                <div class="card-header fw-bold bg-transparent">Jumlah Produk</div>
                                <div class="card-body">
                                    <div class="fw-bold display-6 mb-1">{{ $jml_barang }}</div>
                                    <span class="text-secondary">Total produk yang tersedia di sistem.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card dashboard-card card-green shadow-sm h-100">
                                <div class="card-header fw-bold bg-transparent">Jumlah Klik Produk</div>
                                <div class="card-body">
                                    <div class="fw-bold display-6 mb-1">{{ number_format($jml_klick, 0, ',', '.')  }}</div>
                                    <span class="text-secondary">Total klik pada produk yang telah dilihat pengguna.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card dashboard-card card-yellow shadow-sm h-100">
                                <div class="card-header fw-bold bg-transparent">Jumlah Kategori Produk</div>
                                <div class="card-body">
                                    <div class="fw-bold display-6 mb-1">{{ $jml_katagori }}</div>
                                    <span class="text-secondary">Total kategori produk yang tersedia di sistem.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('cssstyle')
        @vite('resources/css/dashboard.css')
    @endsection('cssstyle')
</x-app-layout>
