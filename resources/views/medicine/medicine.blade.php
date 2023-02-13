@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/medicine/medicine.css">
@endsection

@section('container')
    <div class="row header-obat justify-content-center my-5 ms-md-0">
        <div class="col-lg-1 img-obat">
            {{-- <img src="/img/medicines/mixagrif.png" style="max-width: 200px; margin-left: -40px" alt=""> --}}
            <img src="{{ asset('img/' . $medicine->image) }}" style="max-width: 200px; margin-left: -40px" alt="gambar obat">
        </div>
        <div class="col-lg-8 d-flex flex-column justify-content-between ms-md-0 ms-5">
            <h2>{{ $medicine->name }}</h2>
            <div class="category-obat">
                <h4>Kategori :</h4>
                <h4 class="text-primary">{{ $medicine->category->name }}</h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-5 ms-md-0 ms-2">
        <div class="col-lg-10">
            <article>
                <h2>Keterangan :</h2>
                <p>{!! $medicine->body !!}</p>

                <br>
                <h2>Komposisi :</h2>
                <p>{!! $medicine->composition !!}</p>

                <br>
                <h2>Stok :</h2>
                <p>{!! $medicine->stock !!}</p>

                <br>
                <h2>Dosis</h2>
                <p>{!! $medicine->dose !!}</p>

                <br>
                <h2>Efek samping :</h2>
                <p>{!! $medicine->side_effect !!}</p>
            </article>
        </div>
    </div>
    <div class="row justify-content-center medicine-btn">
        <div class="col-lg-10 d-flex justify-content-between">
            <a class="btn btn-primary btn-back" href="/medicines" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Back
            </a>
            <div class="action">
                @auth
                    <a class="btn btn-primary btn-edit-article" href="/medicines/{{ $medicine->slug }}/edit"
                        role="button">Edit</a>
                    <a class="btn btn-primary btn-add-article" href="/medicines/{{ $medicine->slug }}/delete">Hapus</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
