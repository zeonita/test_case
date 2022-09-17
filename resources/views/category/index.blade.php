@extends('layout.dashboard')
 
@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="delete-alert">
        <strong>Data kategori berhasil dihapus.</strong>
    </div>

    <div class="d-flex justify-content-between mb-4">
        <h1>Kategori</h1>
        <div class="my-2">
            <a href="{{ route('category.add') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="border border-light p-3">
        <table class="table" id="table-category">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Kategori</th>
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
        var urlDT = "{{ route('api.category-list') }}";
    </script>
    <script src="{{ asset('js/category/category.js') }}" defer></script>
@endpush