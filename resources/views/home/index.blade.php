@extends('layout.app')
 
@section('content')
 
    <h2 class="mb-3">Produk</h2>
	<div class="row">
        @for($i=0;$i<4;$i++)
            <div class="col-3 px-1">
                <div class="border border-dark p-3 text-center">
                    <div class="pb-3 w-100">
                        <img src="https://picsum.photos/300/300" class="img w-50 h-50 rounded" />
                    </div>
                    <h5 class="mt-3">Produk 1</h5>
                    <h4 class="py-3">Rp 5.000.000,-</h4>
                    <p class="mb-4 text-start">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet enim est, et convallis nisi fringilla vel. Maecenas quis justo quis erat bibendum tincidunt ac non dui. 
                    </p>
                    <button type="button" class="btn btn-primary px-3">Beli</button>
                </div>
            </div>
        @endfor
    </div>

@endsection