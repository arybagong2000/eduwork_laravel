<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Kategori Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('katagori.list')
                </div>
            </div>
        </div>
    </div>
@include('katagori.modal')

@section('cssstyle')
    @vite('resources/css/orange.css')
@endsection('cssstyle')
@section('jsscript')
    @include('katagori.jsscript')
@endsection('jsscript')
</x-app-layout>
