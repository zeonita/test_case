@extends('layout.dashboard')
 
@section('content')

    <h1>Tambah Kategori Produk</h1>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mt-4 p-4 border border-light rounded">
        <form method="POST" action="{{ route('category.store') }}" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mt-5">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

@endsection