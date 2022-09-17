@extends('layout.dashboard')
 
@section('content')

    <h1>Tambah Produk</h1>
    <div class="mt-4 p-4 border border-light rounded">
        <form class="row g-3" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label class="form-label">Kategori Produk</label>
                <select class="form-select" id="select-category" aria-label="Default select example" name="category">
                    <option selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="" required name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label">Gambar Produk</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                <div class="progress mt-2 d-none" style="height: 25px;">
                    <div class="progress-bar progress-bar-striped p-1 text-end">
                        <div class="percent float-end text-white">0%</div>
                    </div>
                </div>
                <div>
                    <img id="image-preview" class="w-25 h-25">
                </div>
                <input type="hidden" class="form-control" value="" required name="image_url" id="image_url">
                @error('image_url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label">Harga</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="number" class="form-control" placeholder="0" aria-label="Username" aria-describedby="basic-addon1" required name="price">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description-wysiwyg" value="" required name="description"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
        }
    </style>
@endpush

@push('scripts')    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/product/product-add.js') }}" defer></script>
    <script>
        $('#description-wysiwyg').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        $('document').ready(function () {
            $("#image").on('change', function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image-preview').attr('src', e.target.result).addClass('mt-3');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
                var bar = $('.progress-bar');
                var percent = $('.percent');
                var progress = $('.progress');
                var file_data = $('#image').prop('files')[0];   
                var form_data = new FormData();                  
                form_data.append('image', file_data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    url: "{{ route('api.upload-image') }}",
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        progress.removeClass('d-none');
                    },
                    xhr: function () {
                        var xhr = new XMLHttpRequest();
                        xhr.upload.onprogress = function(e) {
                            if (e.lengthComputable) {
                                var percentComplete = (e.loaded / e.total) * 100;
                                var percentVal = percentComplete + '%';
                                bar.width(percentVal);
                                percent.html(percentVal);
                            }
                        };                
                        return xhr;
                    },
                    success: function (data) {
                        $('#image_url').val(data);
                    }
                })
            });
        });
    </script>
@endpush
