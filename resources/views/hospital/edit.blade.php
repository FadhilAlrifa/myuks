@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/hospital/edit_hospital.css">
    <link rel="stylesheet" href="/css/style/trix.css">
@endsection

@section('script')
    <script src="/js/trix.umd.min.js"></script>
@endsection

@section('container')
    <div class="row justify-content-center my-5">
        <div class="col-lg-10">
            <div class="title d-flex">
                <img src="/img/assets/hospital_icon.png" width="85" alt="">
                <h1 class="mt-4 ms-3">
                    Edit Rumah Sakit
                </h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center input-form">
        <div class="col-lg-10">
            <form action="/hospitals/{{ $hospital->slug }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-7">
                    <h3>
                        <label for="name" class="form-label">Nama Rumah Sakit</label>
                    </h3>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $hospital->name) }}" id="name" aria-describedby="emailHelp"
                        placeholder="Masukkan nama rumah sakit" required autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label for="lokasi" class="form-label">Lokasi Rumah Sakit</label>
                    </h3>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                        value="{{ old('location', $hospital->location) }}" id="lokasi" aria-describedby="emailHelp"
                        placeholder="Masukkan lokasi rumah sakit" required autocomplete="off">
                    @error('location')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="schedule">Jadwal Rumah Sakit</label>
                    </h3>
                    <input id="schedule" type="hidden" name="schedule" value="{{ old('schedule', $hospital->schedule) }}"
                        required autocomplete="off">
                    <trix-editor input="schedule" placeholder="Senin - Sabtu 09:00 - 20:00"></trix-editor>
                    @error('schedule')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="rating">Rating Rumah Sakit</label>
                    </h3>
                    <input type="number" max="5" min="1" name="rating"
                        value="{{ old('rating', $hospital->rating) }}" id="rating"
                        class="form-control @error('rating') is-invalid @enderror" aria-describedby="emailHelp"
                        placeholder="Masukkan rating rumah sakit (1 - 5)" required autocomplete="off">
                    @error('rating')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="link">Link Map Rumah Sakit</label>
                    </h3>
                    <input id="link" type="hidden" name="link" value="{{ old('link', $hospital->link) }}" required
                        autocomplete="off">
                    <trix-editor input="link" placeholder="Masukkan link rumah sakit"></trix-editor>
                    @error('link')
                        <p class="text-danger mt-2 fs-5">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-7">
                    <h3>
                        <label class="form-label" for="image">Foto Rumah Sakit</label>
                    </h3>
                    <p class="text-muted">Max : 5Mb</p>
                    @if ($hospital->image)
                        <img src="{{ asset('img/' . $hospital->image) }}" class="img-preview img-fluid mb-3 col-sm-1"
                            style="width: 200px" alt="">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-1" style="width: 200px" alt="">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" onchange="previewImage()" required>
                    @error('image')
                        <div class="invalid-feedback fs-5">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-none d-xl-flex button-add justify-content-between">
                    <a class="btn btn-primary btn-back" href="/hospitals" role="button" style="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        Back
                    </a>
                    <div class="action d-xl-flex gap-3">
                        <button class="btn btn-primary btn-add-medicine" role="button">Edit</button>
                        <a class="btn btn-primary btn-add-medicine" href="/hospitals/{{ $hospital->slug }}/delete"
                            type="submit">Hapus</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
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
