@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/hospital/hospitals.css">
@endsection

@section('navbar_menu')
    @include('partials.navbar_menu')
@endsection

@section('container')
    @if (session()->has('success'))
        <script>
            alert({{ session('success') }});
        </script>
    @endif

    <div class="row search-bar justify-content-center">
        <div class="col-12 mt-5 text-center d-lg-none d-block">
            <h1>Daftar Rumah Sakit</h1>
        </div>
        <div class="col-lg-9">
            <form action="" method="get">
                <div class="search-form d-xl-block">
                    <div class="mt-5">
                        <div class="input-group">
                            <span class="input-group-text search-span" id="basic-addon1">
                                <img src="img/assets/search_icon.png" width="40px" alt="">
                            </span>
                            <input type="text" name="search" class="form-control rounded" id="username" class="mt3"
                                aria-label="Username" aria-describedby="basic-addon1" placeholder="Cari Rumah Sakit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5 justify-content-center text-responsive">
        <div class="col-lg-10 d-none d-lg-block button-add-hospital">
            @auth
                <a class="btn btn-primary btn-add-hospital" href="/hospitals/admin/add" role="button">Tambah Rumah Sakit</a>
            @endauth
        </div>
    </div>

    <br><br>

    <div class="mt-5 row hospital-desktop">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 hospital-list-container-desktop">
            @if ($hospitals->count())
                @foreach ($hospitals as $hospital)
                    <div class="rms mb-5 position-relative hospital-item-desktop">
                        <div class="card-rms row">
                            <a href="{!! $hospital->link !!}" style="display: flex">
                                <div class="col-lg-4 mx-3 my-4">
                                    {{-- <img src="/img/hospitals/rumah-sakit.png" class="img-fluid" alt=""> --}}
                                    <img src="{{ asset('img/' . $hospital->image) }}"
                                        style="height: 250px; object-fit: cover; object-position: center;  margin: auto"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-lg-6 mt-4 text-light">
                                    <div class="title">
                                        <h2>{{ $hospital->name }}</h2>
                                    </div>
                                    <div class="description fs-5 mt-4 text-h3" style="max-height: 150px; overflow: hidden;">
                                        <h4>{{ $hospital->location }}</h4>
                                        <h4>{!! $hospital->schedule !!}</h4>
                                    </div>
                                    <div class="col-lg-9 d-block mt-2">
                                        @for ($i = 1; $i <= $hospital->rating; $i++)
                                            <img src="/img/assets/rating.png" width="30px" alt="">
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        </div>
                        @auth
                            <a href="/hospitals/{{ $hospital->slug }}/edit"
                                class="btn btn-primary btn-edit-hospital position-absolute">Edit</a>
                        @endauth
                    </div>
                @endforeach
            @else
                <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Rumah sakit masih kosong</p>
            @endif

        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="mt-5 row hospital-mobile">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 hospital-list-container-mobile">
            @if ($hospitals->count())
                @foreach ($hospitals as $hospital)
                    <div class="rms mb-5 position-relative hospital-item-mobile">
                        <div class="card-rms row">
                            <a href="{!! $hospital->link !!}" style="display: flex">
                                <div class="col-lg-4 mx-3 my-4">
                                    {{-- <img src="/img/hospitals/rumah-sakit.png" class="img-fluid" alt=""> --}}
                                    <img src="{{ asset('img/' . $hospital->image) }}"
                                        style="height: 150px; object-fit: cover; object-position: center;  margin: auto"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-lg-6 mt-4 text-light">
                                    <div class="title">
                                        <h2>{{ $hospital->name }}</h2>
                                    </div>
                                    <div class="description fs-5 mt-4 text-h3" style="max-height: 150px; overflow: hidden;">
                                        <h4>{{ $hospital->location }}</h4>
                                        <h4>{!! $hospital->schedule !!}</h4>
                                    </div>
                                    <div class="col-lg-9 d-block mt-2">
                                        @for ($i = 1; $i <= $hospital->rating; $i++)
                                            <img src="/img/assets/rating.png" class="star-rating" alt="">
                                        @endfor
                                    </div>
                                </div>
                            </a>
                        </div>
                        @auth
                            <a href="/hospitals/{{ $hospital->slug }}/edit"
                                class="btn btn-primary btn-edit-hospital position-absolute">Edit</a>
                        @endauth
                    </div>
                @endforeach
            @else
                <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Rumah sakit masih kosong</p>
            @endif

        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection
