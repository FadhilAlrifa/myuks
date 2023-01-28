@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/medicine/delete_medicine.css">
@endsection

@section('container')
    <div class="row my-5 justify-content-center">
        <div class="col-lg-10">
            <div class="title d-flex">
                {{-- <img src="/img/img/Obat_icon.png" width="85" alt=""> --}}
                <h1 class="mt-4 ms-3 text-center">
                    Log Out
                </h1>
            </div>
        </div>
    </div>

    <div class="row my-5 justify-content-center">
        <div class="col-lg-8">
            <form action="">
                <div class="delete-obat">
                    <p class="m-0">Apakah anda yakin ingin logout ?</p>
                </div>
                <div class="button-delete d-flex justify-content-between my-5">
                    <a class="btn btn-primary btn-add-article px-5 py-2 delete" href="/" role="button">Batal</a>
                    <a class="btn btn-primary btn-add-article px-5 py-2" href="/" role="button">Hapus</a>
                </div>
            </form>
        </div>
    </div>
@endsection
