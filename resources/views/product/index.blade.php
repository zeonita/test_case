@extends('layout.dashboard')
 
@section('content')
    <div class="d-flex justify-content-between mb-4">
        <h1>Produk</h1>
        <div class="my-2">
            <a href="{{ route('product.add') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="border border-light p-3">
        <table id="table-product" class="table">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        var urlDT = "{{ route('api.product-list') }}";
        var token = "{{ session('jwt-token.access_token') }}";
    </script>
    <script src="{{ asset('js/product/product.js') }}" defer></script>
@endpush