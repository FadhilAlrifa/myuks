@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/article/add_article.css">
    <link rel="stylesheet" href="/css/style/trix.css">
@endsection

@section('script')
    <script src="/js/trix.umd.min.js"></script>
@endsection

@section('container')
    <div class="row justify-content-center my-5">
        <div class="col-lg-10">
            <div class="title d-flex">
                <img src="/img/assets/add_article_icon.png" width="85" alt="">
                <h1 class="mt-4 ms-3">
                    Tambah Artikel
                </h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center input-form">
        <div class="col-lg-10">
            <form action="/articles/admin/add" method="post" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="mb-7">
                    <h3>
                        <label for="title" class="form-label">Judul Artikel</label>
                    </h3>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" name="title" id="title" aria-describedby="emailHelp"
                        placeholder="Masukkan Judul Artikel" required>
                    @error('title')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="category_id">Kategori Artikel</label>
                    </h3>
                    <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                        @foreach ($articles_category as $article_category)
                            @if (old('category_id') == $article_category->id)
                                <option value="{{ $article_category->id }}" selected>{{ $article_category->name }}</option>
                            @else
                                <option value="{{ $article_category->id }}">{{ $article_category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="highlight">Tambah Highlight</label>
                    </h3>
                    <input type="text" name="highlight" value="{{ old('highlight') }}" id="highlight"
                        class="form-control @error('highlight') is-invalid @enderror"" aria-describedby="emailHelp"
                        placeholder="Masukkan teks" required>
                    @error('highlight')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="image">Foto Artikel</label>
                    </h3>
                    <p class="text-muted">Max : 5Mb</p>
                    <img class="img-preview img-fluid mb-3 col-sm-1" style="width: 200px" alt="">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()" required>
                    @error('image')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="deskripsi">Isi Artikel</label>
                    </h3>
                    <input id="deskripsi" name="body" value="{{ old('body') }}" type="hidden" required>
                    <trix-editor input="deskripsi" placeholder="Masukkan teks"></trix-editor>
                    @error('body')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="d-none d-xl-flex button-add justify-content-between">
                    <a class="btn btn-primary btn-back" href="/articles" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        Back
                    </a>
                    <button class="btn btn-primary btn-add-medicine" type="submit" role="button">Tambah
                        Artikel</button>
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
