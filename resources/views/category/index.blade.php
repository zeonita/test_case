@extends('layout.dashboard')
 
@section('content')

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
                <tr>
                    <td>1</td>
                    <td>Baju</td>
                    <td><button class="btn btn-success">Edit</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tas</td>
                    <td><button class="btn btn-success">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/category/category.js') }}" defer></script>
@endpush