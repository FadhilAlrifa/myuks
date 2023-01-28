@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/hospital/delete_hospital.css">
@endsection

@section('container')
    <div class="row my-5 justify-content-center">
        <div class="col-lg-10">
            <div class="title d-flex">
                <img src="/img/assets/hospital_icon.png" width="85" alt="">
                <h1 class="mt-4 ms-3">
                    Hapus Rumah Sakit
                </h1>
            </div>
        </div>
    </div>

    <div class="row my-5 justify-content-center">
        <div class="col-lg-8">
            <div class="delete-hospital">
                <p class="m-0">Apakah anda yakin ingin menghapus rumah sakit ini ?</p>
            </div>
            <div class="button-delete d-flex justify-content-between my-5">
                <a class="btn btn-primary btn-add-article px-5 py-2 delete" href="/hospitals" role="button">Batal</a>
                <form action="/hospitals/{{ $hospital->slug }}/delete" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-primary button-add-article px-5 py-2">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
