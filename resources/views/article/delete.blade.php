@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/article/delete_article.css">
@endsection

@section('container')
    <div class="row my-5 justify-content-center">
        <div class="col-lg-10">
            <div class="title d-flex">
                <img src="/img/assets/add_article_icon.png" width="85" alt="">
                <h1 class="mt-4 ms-3">
                    Hapus Artikel
                </h1>
            </div>
        </div>
    </div>

    <div class="row my-5 justify-content-center">
        <div class="col-lg-8">
            <div class="delete-obat">
                <p class="m-0">Apakah anda yakin ingin menghapus artikel ini ?</p>
            </div>
            <div class="button-delete d-flex justify-content-between my-5">
                <a class="btn btn-primary btn-add-article px-5 py-2 delete" href="/articles/{{ $article->slug }}"
                    role="button">Batal</a>
                <form action="/articles/{{ $article->slug }}/delete" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-primary btn-add-article px-5 py-2">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
