@extends('layout.dashboard')
 
@section('content')

    <h1>Tambah Produk</h1>
    <div class="mt-4 p-4 border border-light rounded">
        <form class="row g-3">
            <div class="col-md-12">
                <label class="form-label">Kategori Produk</label>
                <select class="form-select" id="select-category" aria-label="Default select example">
                    <option selected>Pilih Kategori</option>
                    <option value="1">Baju</option>
                    <option value="2">Tas</option>
                    <option value="3">Lainnya</option>
                </select>
            </div>
            <div class="col-md-12">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="" required>
            </div>
            <div class="col-md-12">
                <label class="form-label">Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" value="" required></textarea>
            </div>
            <div class="col-12 mt-5">
                <div class="float-end">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/product/product-add.js') }}" defer></script>
@endpush
