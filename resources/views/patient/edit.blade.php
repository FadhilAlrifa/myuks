@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/patient/add_patient.css">
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
                    Edit Pasien
                </h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center input-form">
        <div class="col-lg-10">
            <form action="/patients/{{ $student->slug }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-7">
                    <h3>
                        <label for="name" class="form-label">Nama Pasien</label>
                    </h3>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ $student->name }}" name="name" id="name" aria-describedby="emailHelp"
                        placeholder="Masukkan Judul Artikel" required>
                    @error('name')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label for="class" class="form-label">Kelas Pasien</label>
                    </h3>
                    <input type="text" class="form-control @error('class') is-invalid @enderror"
                        value="{{ $student->class }}" name="class" id="class" aria-describedby="emailHelp"
                        placeholder="Masukkan Judul Artikel" required>
                    @error('class')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="status">Status Pasien</label>
                    </h3>
                    <select class="form-select" id="category_id" name="status" required>
                        <?php $i = 0; ?>
                        @if ($i == $student->status)
                            <option value="0" selected>Dirawat</option>
                            <option value="1">Keluar</option>
                        @else
                            <option value="0">Dirawat</option>
                            <option value="1" selected>Keluar</option>
                        @endif
                    </select>
                    @error('status')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label for="keluhan" class="form-label">Keluhan Pasien</label>
                    </h3>
                    <input type="text" class="form-control @error('keluhan') is-invalid @enderror"
                        value="{{ $student->keluhan }}" name="keluhan" id="keluhan" aria-describedby="emailHelp"
                        placeholder="Masukkan Judul Artikel" required>
                    @error('keluhan')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="image">Foto Pasien</label>
                    </h3>
                    <p class="text-muted">Max : 5Mb</p>
                    <img class="img-preview img-fluid mb-3 col-sm-1" style="width: 200px" alt="">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-none d-xl-flex button-add justify-content-between">
                    <a class="btn btn-primary btn-back" href="{{ url()->previous() }}" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        Back
                    </a>
                    <button class="btn btn-primary btn-add-medicine" type="submit" role="button">Edit
                        Pasien</button>
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
