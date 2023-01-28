@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style/article/lightslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style/article/articles.css') }}">
@endsection

@section('navbar_menu')
    @include('partials.navbar_menu')
@endsection

@section('script')
    <script src="{{ asset('/js/JQuery.js') }}"></script>
    <script src="{{ asset('/js/lightslider.js') }}"></script>
    <script src="{{ asset('/js/modal_backdrop.js') }}"></script>
@endsection

@section('container')
    @if (session()->has('success'))
        <script>
            alert({{ session('success') }});
        </script>
    @endif

    <div class="container-fluid">
        <div class="row search-bar justify-content-center">
            <div class="col-lg-10">
                <form action="" method="get">
                    <div class="search-form d-none d-xl-block">
                        <div class="mt-5">
                            <div class="input-group">
                                <span class="input-group-text search-span" id="basic-addon1">
                                    <img src="/img/assets/search_icon.png" width="40px" alt="">
                                </span>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control rounded" id="username" class="mt3" aria-label="Username"
                                    aria-describedby="basic-addon1" placeholder="Cari Artikel Kesehatan">
                                <div class="filter-icon">
                                    <img src="/img/assets/filter_icon.png" class="filter-icon-img" width="80px"
                                        alt="">
                                    <button type="button" class="btn btn-primary modal-btn" data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modal" aria-hidden="true"
                        role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                    <h1 class="modal-title fs-3 text-center" id="modal">Kategori
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="GET">
                                        <?php $i = 1; ?>
                                        @foreach ($articles_category as $article_category)
                                            <div class="form-check">
                                                <input class="form-check-input" name="category" type="radio"
                                                    value="{{ $article_category->slug }}" id="check{{ $i }}">
                                                <label class="form-check-label" for="check{{ $i }}">
                                                    {{ $article_category->name }}
                                                </label>
                                            </div>
                                            <?php $i++; ?>
                                        @endforeach
                                    </form>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-secondary fs-5"
                                        class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-10 d-none d-xl-block button-add-article">
                @auth
                    <a class="btn btn-primary btn-add-article" href="articles/admin/add" role="button">Tambah Artikel</a>
                @endauth
            </div>
        </div>

        <!-- Body -->
        <br>
        @if (request('search') || request('category'))
            <div class="row mt-5">
                @foreach ($articles_category->where('slug', request('category')) as $article_category)
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-10">
                            <img src="/img/nav_menu_icon/article_icon.png" width="56px" alt="" class="d-inline">
                            <h3 class="d-inline-block ms-3 title-text"><b>{{ $article_category->name }}</b></h3>
                        </div>
                    </div>
                @endforeach

                @if ($articles->count())
                    <div class="row justify-content-center daftar-article">
                        @foreach ($articles as $article)
                            <div class="col-lg-3">
                                <a href="/articles/{{ $article->slug }}">
                                    <div class="card border-article">
                                        <div class="text-center px-3 pt-3">
                                            <img src="{{ asset('img/' . $article->image) }}" class="card-img-top"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $article->title }}
                                            </h5>
                                            <p class="text-muted"> kategori : {{ $article->category->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Artikel masih kosong
                    </p>
                @endif
            </div>
        @else
            @if ($articles->count())
                <div class="row mt-5">
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-10">
                            <img src="/img/nav_menu_icon/article_icon.png" width="56px" alt="" class="d-inline">
                            <h3 class="d-inline-block ms-3 title-text"><b>Artikel Terbaru</b></h3>
                        </div>
                    </div>
                    <div class="row justify-content-center daftar-article-slide">
                        @if ($articles->count())
                            <ul id="autoWidth" class="cs-hidden">
                                {{-- Hanya mengambil 6 article terbaru --}}
                                @foreach ($articles->slice(0, 6) as $article)
                                    <li class="item-a">
                                        <a href="/articles/{{ $article->slug }}">
                                            <div class="card border-article">
                                                <div class="text-center px-3 pt-3">
                                                    <img src="{{ asset('img/' . $article->image) }}"
                                                        style="height: 230px; object-fit: cover; object-position: center"
                                                        class="card-img-top" alt="...">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $article->title }}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center fs-4">Artikel masih kosong</p>
                        @endif

                    </div>
                </div>

                @foreach ($articles_category as $article_category)
                    @if ($articles->where('category_id', $article_category->id)->count())
                        <div class="row mt-5">
                            <div class="row justify-content-center mb-2">
                                <div class="col-lg-10">
                                    <img src="/img/nav_menu_icon/article_icon.png" width="56px" alt=""
                                        class="d-inline">
                                    <h3 class="d-inline-block ms-3 title-text"><b>{{ $article_category->name }}</b></h3>
                                </div>
                            </div>
                            @if ($articles->where('category_id', $article_category->id)->count())
                                <div class="row justify-content-center daftar-article">
                                    @foreach ($articles->where('category_id', $article_category->id) as $article)
                                        <div class="col-lg-3">
                                            <a href="/articles/{{ $article->slug }}">
                                                <div class="card border-article">
                                                    <div class="text-center px-3 pt-3">
                                                        <img src="{{ asset('img/' . $article->image) }}"
                                                            class="card-img-top" alt="...">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $article->title }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Artikel
                                    masih kosong
                                </p>
                            @endif
                        </div>
                    @endif
                @endforeach
            @else
                <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Artikel masih
                    kosong
                </p>
            @endif

        @endif
    </div>

    <script src="js/card_slide.js"></script>
@endsection
