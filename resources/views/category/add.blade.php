@extends('layout.dashboard')
 
@section('content')

    <h1>Tambah Kategori Produk</h1>
    <div class="mt-4 p-4 border border-light rounded">
        <form class="row g-3">
            <div class="col-md-12">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" value="" required>
            </div>
            <div class="col-12 mt-5">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

@endsection