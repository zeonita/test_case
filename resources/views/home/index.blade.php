@extends('layout.app')

@section('content')
 
    <h2 class="mb-3">Produk</h2>
	<div class="row">
        @foreach ($products as $product)
        <div class="col-3 px-1">
            <div class="border border-dark p-3 text-center" style="height:470px;">
                <div class="pb-3 w-100">
                    <img src="{{ $product->detail->image ? asset($product->detail->image) : asset('image/image-placeholder.png') }}" class="img rounded" style="width: 100px; height: 100px; object-fit: cover;" />
                </div>
                <h5 class="mt-1 text-truncate">{{ $product->name }}</h5>
                <h4 class="py-2">Rp. {{ number_format($product->detail->price, 0, ',', '.') }},-</h4>
                <div class="home-description mb-4 text-start">
                    {!! $product->detail->description !!}
                </div>
                <button type="button" disabled class="btn btn-primary px-3">Beli</button>
            </div>
        </div>
        @endforeach
    </div>

@endsection