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
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>
                        <div class="pb-3 w-100">
                            <img src="https://picsum.photos/100/100" class="img rounded" />
                        </div>
                    </td>
                    <td>Ransel</td>
                    <td>Tas</td>
                    <td>Rp 300.000</td>
                    <td><button class="btn btn-success">Edit</button></td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>
                        <div class="pb-3 w-100">
                            <img src="https://picsum.photos/100/100" class="img rounded" />
                        </div>
                    </td>
                    <td>Kemaja</td>
                    <td>Baju</td>
                    <td>Rp 200.000</td>
                    <td><button class="btn btn-success">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/product/product.js') }}" defer></script>
@endpush