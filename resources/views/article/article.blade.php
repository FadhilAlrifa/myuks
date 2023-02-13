@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style/article/article.css') }}">
@endsection

@section('container')
    <div id="carousel-article" class=" carousel slide my-5 m-auto" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($articles_carousel as $article_carousel)
                <div class="carousel-item">
                    <img src="{{ asset('img/' . $article_carousel->image) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <p>{{ $article_carousel->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <article>
                <h1>{{ $article->title }}</h1>
                <p class="text-muted text-responsive">Kategori : {{ $article->category->name }}</p>
                {{-- <p class="text-muted">slug : {{ $article->slug }}</p> --}}

                <p class="">“{{ $article->highlight }}”</p>

                <img src="{{ asset('img/' . $article->image) }}" style="max-height: 600px" alt="gambar artikel">

                <p style="font-size: 10px;">{!! $article->body !!}</p>

            </article>
        </div>
    </div>
    <div class="row justify-content-center article-btn mt-5">
        <div class="col-lg-10 d-flex justify-content-between">
            <a class="btn btn-primary btn-back" href="{{ url()->previous() }}" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Back
            </a>
            <div class="action">
                @auth
                    <a class="btn btn-primary btn-edit-article" href="/articles/{{ $article->slug }}/edit"
                        role="button">Edit</a>
                    <a class="btn btn-primary btn-add-article" href="/articles/{{ $article->slug }}/delete"
                        role="button">Hapus</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
