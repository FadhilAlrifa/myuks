@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/medicine/add_medicine.css">
    <link rel="stylesheet" href="/css/style/trix.css">
@endsection

@section('script')
    <script src="/js/trix.umd.min.js"></script>
@endsection

@section('container')
    <div class="row justify-content-center my-5">
        <div class="col-lg-10">
            <div class="title d-flex">
                <img src="/img/assets/Obat_icon.png" width="85" alt="">
                <h1 class="mt-4 ms-3">
                    Tambah Obat
                </h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center input-form">
        <div class="col-lg-10">
            <form action="/medicines/admin/add" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-7">
                    <h3>
                        <label for="name" class="form-label">Nama Obat</label>
                    </h3>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" placeholder="Masukkan nama obat" value="{{ old('name') }}" required
                        autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="category_id">Kategori Obat</label>
                    </h3>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach ($medicines_category as $medicine_category)
                            @if (old('category_id') == $medicine_category->id)
                                <option value="{{ $medicine_category->id }}" selected>{{ $medicine_category->name }}
                                </option>
                            @else
                                <option value="{{ $medicine_category->id }}">{{ $medicine_category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="stock">Jumlah Obat</label>
                    </h3>
                    <input type="number" min="1" id="stock" name="stock"
                        class="form-control @error('stock') is-invalid @enderror" placeholder="Masukkan Jumlah Obat"
                        value="{{ old('stock') }}" required autocomplete="off">
                    @error('stock')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="dose">Dosis</label>
                    </h3>
                    <input id="dose" type="hidden" value="{{ old('dose') }}" name="dose" required
                        autocomplete="off">
                    <trix-editor input="dose" placeholder="Masukkan dosis obat"></trix-editor>
                    @error('dose')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="composition">Komposisi Obat</label>
                    </h3>
                    <input id="composition" type="hidden" value="{{ old('composition') }}" name="composition" required
                        autocomplete="off">
                    <trix-editor input="composition" placeholder="Masukkan komposisi obat"></trix-editor>
                    @error('composition')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="body">Deskripsi Obat</label>
                    </h3>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}" required
                        autocomplete="off">
                    <trix-editor input="body" placeholder="Masukkan deskripsi obat"></trix-editor>
                    @error('body')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="side_effect">Efek Samping Obat</label>
                    </h3>
                    <input id="side_effect" type="hidden" value="{{ old('side_effect') }}" name="side_effect" required
                        autocomplete="off">
                    <trix-editor input="side_effect" placeholder="Masukkan efek samping obat"></trix-editor>
                    @error('side_effect')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="image">Foto Obat</label>
                    </h3>
                    <p class="text-muted">Max : 5Mb</p>
                    <img class="img-preview img-fluid col-sm-1" style="width: 200px;" alt="">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                        id="image" onchange="previewImage()" required>
                    @error('image')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-none d-xl-flex button-add justify-content-between">
                    <a class="btn btn-primary btn-back" href="/medicines" role="button" style="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        Back
                    </a>
                    <button class="btn btn-primary btn-add-medicine" type="submit" role="button">Tambah
                        Obat</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menonaktifkan tools-file trix editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(OFREvent) {
                imgPreview.src = OFREvent.target.result;
            }
        }
    </script>
@endsection
