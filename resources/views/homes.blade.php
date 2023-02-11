@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="css/style/beranda.css">

    <!-- Link Swiper's CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /> --}}
@endsection

@section('script')
@endsection

@section('navbar_menu')
    @include('partials.navbar_menu')
@endsection

@section('container')
    <div class="row w85 justify-content-center">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-md-11">
            <div class="spacer-desktop">
                <br><br><br><br><br><br><br><br>
            </div>
            <div class="spacer-mobile">
                <br><br><br><br>
            </div>
            <div class="row">
                <div class="col-1 ms-5 text-center d-flex justify-content-center">
                    <img src="/img/assets/lokasi.png" alt="" width="50px">
                </div>
                <div class="col-lg-5 col-md-9 col-sm-9 col-8 " id="lokasi-rs-text">
                    <h3 class="mt-2">Lokasi rumah sakit</h3>
                </div>
                <div class="col-lg-12 map-parent mt-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.578635004867!2d119.43419761409326!3d-5.171270953655912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee32da1a075d3%3A0x88e9cc6030cfa1dd!2sSMK%20TELKOM%20Makassar!5e0!3m2!1sid!2sid!4v1674426637704!5m2!1sid!2sid"
                        width="100%" class="maps-telkom" allowfullscreen="true" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    {{-- <div class="col-lg-12 text-center">
                    <img src="/img/assets/map.png" class="maps-telkom" width="90%" alt="">
                </div> --}}
                    <a
                        href="https://www.google.com/maps/search/rumah+sakit+terdekat+dari+smk+telkom+makassar/@-5.1712762,119.4286615,15z/data=!3m1!4b1">
                        <div class="col-12 map-text text-center">
                            <center>
                                <div class="button-maps">
                                    <h5 class="text-center">Lihat rumah sakit di maps</h5>
                                </div>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row patient dekstop w85">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 col-md-11 d-flex align-items-center">
                <img src="/img/assets/patient.png" alt="patient icon">
                <h4 class="mt-2">Data Pasien</h4>
                {{-- {{ now() }} --}}
            </div>
        </div>
        <div class="row patient-list-container justify-content-center">
            <div class="col-lg-8 col-md-11 patient-list row justify-content-center pt-0 pb-5">
                @foreach ($students as $student)
                    {{-- @if (date('Y-m-d', strtotime($student->timestamp)) == now()->format('Y-m-d') && $student->status == 0) --}}
                    @if (date('Y-m-d', strtotime($student->timestamp)) == now()->format('Y-m-d'))
                        <div class="col-lg-10 p-0 patient-item my-5">
                            <a href="/patients/{{ $student->slug }}/edit">
                                <div class="card border-0 ">
                                    <div class="row g-0 align-items-center ps-3">
                                        <div class="col-lg-2 d-flex justify-content-center">
                                            <img src="{{ asset('img/' . $student->image) }}" class="img-fluid rounded"
                                                alt="foto siswa">
                                        </div>
                                        <div class=" {{ $student->status == 0 ? 'col-lg-8' : 'col-lg-6' }} patient-desc">
                                            <div class="card-body">
                                                <h5 class="card-title fs-4 text-dark">{{ $student->name }}</h5>
                                                <p class="card-text fs-5">{{ $student->class }}</p>
                                                <p class="card-text fs-5"><span
                                                        class="text-muted">{{ $student->keluhan }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <p class="fs-5">Masuk</p>
                                            <h4>{{ date('H:i', strtotime($student->timestamp)) }}</h4>
                                        </div>
                                        @if ($student->status == 1)
                                            <div class="col-lg-2 text-center">
                                                <p class="fs-5">Keluar</p>
                                                <h4>{{ date('H:i', strtotime($student->updated_at)) }}</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        {{-- <p>Data kosong</p> --}}
                    @endif
                @endforeach
                @auth
                    <div class="col-lg-10 d-flex justify-content-center mt-5">
                        <a href="/patients/add" class="btn btn-success text-white fs-5">Tambah Pasien</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <div class="patient mobile">
        <div class="row justify-content-center w85">
            <div class="col-lg-8 d-flex align-items-center">
                <img src="/img/assets/patient.png" alt="patient icon">
                <h4 class="mt-2">Data Pasien</h4>
                {{-- {{ now() }} --}}
            </div>
        </div>
        <div class="patient-list-container">
            @foreach ($students as $student)
                @if (date('Y-m-d', strtotime($student->timestamp)) == now()->format('Y-m-d'))
                    <div class="patient-item p-0 my-5 me-4">
                        <a href="/patients/{{ $student->slug }}/edit">
                            <div class="card border-0">
                                <div class="row g-0 px-3 py-3 justify-content-between">
                                    <div class="col-2 d-flex justify-content-center align-self-center">
                                        <img src="{{ asset('img/' . $student->image) }}" class="img-fluid rounded"
                                            alt="foto siswa">
                                    </div>
                                    <div class="col-9 align-self-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="m-0 p-0">{{ $student->name }}</p>
                                                <b class="m-0 p-0">{{ $student->class }}</b>
                                            </div>
                                        </div>
                                        <hr class="my-2 p-0">
                                        <div class="row justify-content-between">
                                            <p class="col-6 text-muted ms-3 p-0">{{ $student->keluhan }}</p>
                                            <div class="col-5 text-end">
                                                @if ($student->status == 0)
                                                    {{ date('H:i', strtotime($student->created_at)) }}
                                                @elseif ($student->status == 1)
                                                    {{ date('H:i', strtotime($student->created_at)) }} -
                                                    {{ date('H:i', strtotime($student->updated_at)) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    {{-- <p>Data kosong</p> --}}
                @endif
            @endforeach
        </div>
    </div>

    <div class="row justify-content-center mb-4 mt-5 w85">
        <div class="col-lg-8 d-flex align-items-center gap-3">
            <img src="/img/assets/news.png" alt="news icon">
            <h4 class="mt-2">Update Seputar Kesehatan</h4>
        </div>
    </div>

    <div class="row w85 artikel-kesehatan-dekstop">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="artikels">
                <div class="justify-content-between row">
                    <div class="ms-5 col-lg-4">
                        <h3 class="pt-5">Informasi Kesehatan</h3>
                    </div>
                    <div class="me-5 col-lg-3">
                        <a class="b" href="/articles">
                            <div class="button-artikel text-center mt-5 mb-5">
                                <h5 class="pt-3 pb-1">Lihat Semua Artikel</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mx-2 list-artikel-category-desktop">
                    <div class="col-lg-3">
                        <a href="/?article_category=all&medicine_category={{ request('medicine_category') }}">
                            <div class="text-center">
                                <div
                                    class="nav-artikel {{ request()->input('article_category') == 'all' || request()->input('article_category') == '' ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                    <h5 class="pt-2 pb-2">Semua</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($articles_category->slice(0, 3) as $article_category)
                        <div class="col-lg-3">
                            <a
                                href="/?article_category={{ $article_category->id }}&medicine_category={{ request('medicine_category') }}">
                                <div class="text-center pb-4">
                                    <div
                                        class="nav-artikel {{ request()->input('article_category') == $article_category->id ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                        <h5 class="pt-2 pb-2">{{ $article_category->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mx-2 list-artikel-category-mobile mb-5">
                    <div class="list-artikel-category-mobile-item">
                        <a href="/?article_category=all&medicine_category={{ request('medicine_category') }}">
                            <div class="text-center">
                                <div
                                    class="nav-artikel {{ request()->input('article_category') == 'all' || request()->input('article_category') == '' ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                    <h5 class="pt-2 pb-2">Semua</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($articles_category->slice(0, 3) as $article_category)
                        <div class="list-artikel-category-mobile-item">
                            <a
                                href="/?article_category={{ $article_category->id }}&medicine_category={{ request('medicine_category') }}">
                                <div class="text-center pb-4">
                                    <div
                                        class="nav-artikel {{ request()->input('article_category') == $article_category->id ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                        <h5 class="pt-2 pb-2">{{ $article_category->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row item-article list-artikel-desktop mx-2">
                    @if (request()->has('article_category'))
                        @if (request('article_category') == 'all' || request('article_category') == '')
                            @foreach ($articles->slice(0, 4) as $article)
                                <div class="col-lg-3 text-center">
                                    <a href="/articles/{{ $article->slug }}">
                                        <img src="{{ asset('img/' . $article->image) }}" class="rounded" alt=""
                                            style="max-height: 150px; object-fit: cover; object-position: center">
                                        <p class="ms-5 me-5 pb-3">{{ $article->title }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <?php $i = 1; ?>
                            @foreach ($articles->where('category_id', request('article_category')) as $article)
                                @if ($i <= 4)
                                    <div class="col-lg-3 text-center">
                                        <a href="/articles/{{ $article->slug }}">
                                            <img src="{{ asset('img/' . $article->image) }}" class="rounded"
                                                alt=""
                                                style="max-height: 150px; object-fit: cover; object-position: center">
                                            <p class="ms-5 me-5 pb-3">{{ $article->title }}</p>
                                            <p class="ms-5 me-5 pb-3 text-muted">{{ $article->category->name }}</p>
                                        </a>
                                    </div>
                                @endif
                                <?php $i++; ?>
                            @endforeach
                        @endif
                    @else
                        @foreach ($articles->slice(0, 4) as $article)
                            <div class="col-lg-3 text-center">
                                <a href="/articles/{{ $article->slug }}">
                                    <img src="{{ asset('img/' . $article->image) }}" class="rounded" alt=""
                                        style="max-height: 150px; object-fit: cover; object-position: center">
                                    <p class="ms-5 me-5 pb-3">{{ $article->title }}</p>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="item-article mx-2 list-artikel-mobile">
                    @if (request()->has('article_category'))
                        @if (request('article_category') == 'all' || request('article_category') == '')
                            @foreach ($articles->slice(0, 4) as $article)
                                <div class="text-center artikel-mobile">
                                    <a href="/articles/{{ $article->slug }}">
                                        <img src="{{ asset('img/' . $article->image) }}" class="rounded" alt=""
                                            style="max-height: 150px; object-fit: cover; object-position: center">
                                        <p class="ms-5 me-5 pb-3">{{ $article->title }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <?php $i = 1; ?>
                            @foreach ($articles->where('category_id', request('article_category')) as $article)
                                @if ($i <= 4)
                                    <div class="text-center artikel-mobile">
                                        <a href="/articles/{{ $article->slug }}">
                                            <img src="{{ asset('img/' . $article->image) }}" class="rounded"
                                                alt=""
                                                style="max-height: 150px; object-fit: cover; object-position: center">
                                            <p class="ms-5 me-5 pb-3">{{ $article->title }}</p>
                                            <p class="ms-5 me-5 pb-3 text-muted">{{ $article->category->name }}</p>
                                        </a>
                                    </div>
                                @endif
                                <?php $i++; ?>
                            @endforeach
                        @endif
                    @else
                        @foreach ($articles->slice(0, 4) as $article)
                            <div class="text-center artikel-mobile">
                                <a href="/articles/{{ $article->slug }}">
                                    <img src="{{ asset('img/' . $article->image) }}" class="rounded" alt=""
                                        style="max-height: 150px; object-fit: cover; object-position: center">
                                    <p class="ms-5 me-5 pb-3">{{ $article->title }}</p>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row w85">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <br><br><br>
            <div class="artikels">
                <div class="justify-content-between row">
                    <div class="ms-5 col-lg-4">
                        <h3 class="pt-5">Obat & Vitamin</h3>
                    </div>
                    <div class="me-5 col-lg-3">
                        <a class="b" href="/medicines">
                            <div class="button-artikel text-center mt-5">
                                <h5 class="pt-3 pb-1">Lihat Semua Obat</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mt-5 mx-2 list-medicine-category-desktop">
                    <div class="col-lg-3">
                        <a href="/?medicine_category=all&article_category={{ request('article_category') }}">
                            <div class="text-center">
                                <div
                                    class="nav-artikel {{ request()->input('medicine_category') == 'all' || request()->input('medicine_category') == '' ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                    <h5 class="pt-2 pb-2">Semua</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($medicines_category->slice(0, 3) as $medicine_category)
                        <div class="col-lg-3">
                            <a
                                href="/?article_category={{ request('article_category') }}&medicine_category={{ $medicine_category->id }}">
                                <div class="text-center pb-4">
                                    <div
                                        class="nav-artikel {{ request()->input('medicine_category') == $medicine_category->id ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                        <h5 class="pt-2 pb-2">{{ $medicine_category->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 mx-2 list-medicine-category-mobile">
                    <div class="list-medicine-category-item">
                        <a href="/?medicine_category=all&article_category={{ request('article_category') }}">
                            <div class="text-center">
                                <div
                                    class="nav-artikel {{ request()->input('medicine_category') == 'all' || request()->input('medicine_category') == '' ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                    <h5 class="pt-2 pb-2">Semua</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($medicines_category->slice(0, 3) as $medicine_category)
                        <div class="list-medicine-category-item">
                            <a
                                href="/?article_category={{ request('article_category') }}&medicine_category={{ $medicine_category->id }}">
                                <div class="text-center pb-4">
                                    <div
                                        class="nav-artikel {{ request()->input('medicine_category') == $medicine_category->id ? 'active-artikels' : '' }} mt-3 ms-4 me-4">
                                        <h5 class="pt-2 pb-2">{{ $medicine_category->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row item-obat mx-2 list-medicine-desktop">
                    @if (request()->has('medicine_category'))
                        @if (request('medicine_category') == 'all' || request('medicine_category') == '')
                            @foreach ($medicines->slice(0, 4) as $medicine)
                                <div class="col-lg-3 text-center">
                                    <a href="/medicines/{{ $medicine->slug }}">
                                        <img src="{{ asset('img/' . $medicine->image) }}" class="rounded-circle"
                                            alt=""
                                            style="max-height: 150px; object-fit: cover; object-position: center;">
                                        <p class="ms-5 me-5 pb-3">{{ $medicine->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <?php $i = 1; ?>
                            @foreach ($medicines->where('category_id', request('medicine_category')) as $medicine)
                                @if ($i <= 4)
                                    <div class="col-lg-3 text-center">
                                        <a href="/medicines/{{ $medicine->slug }}">
                                            <img src="{{ asset('img/' . $medicine->image) }}" class="rounded-circle"
                                                alt=""
                                                style="max-height: 150px; object-fit: cover; object-position: center;">
                                            <p class="ms-5 me-5 pb-3">{{ $medicine->name }}</p>
                                            <p class="ms-5 me-5 pb-3 text-muted">{{ $medicine->category->name }}</p>
                                        </a>
                                    </div>
                                @endif
                                <?php $i++; ?>
                            @endforeach
                        @endif
                    @else
                        @foreach ($medicines->slice(0, 4) as $medicine)
                            <div class="col-lg-3 text-center">
                                <a href="/medicines/{{ $medicine->slug }}">
                                    <img src="{{ asset('img/' . $medicine->image) }}" class="rounded-circle"
                                        alt=""
                                        style="max-height: 150px; object-fit: cover; object-position: center;">
                                    <p class="ms-5 me-5 pb-3">{{ $medicine->name }}</p>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="item-obat mx-2 list-medicine-mobile">
                    @if (request()->has('medicine_category'))
                        @if (request('medicine_category') == 'all' || request('medicine_category') == '')
                            @foreach ($medicines->slice(0, 4) as $medicine)
                                <div class="list-medicine-mobile-item text-center">
                                    <a href="/medicines/{{ $medicine->slug }}">
                                        <img src="{{ asset('img/' . $medicine->image) }}" class="rounded-circle"
                                            alt=""
                                            style="max-height: 150px; object-fit: cover; object-position: center;">
                                        <p class="ms-5 me-5 pb-3">{{ $medicine->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <?php $i = 1; ?>
                            @foreach ($medicines->where('category_id', request('medicine_category')) as $medicine)
                                @if ($i <= 4)
                                    <div class="list-medicine-mobile-item text-center">
                                        <a href="/medicines/{{ $medicine->slug }}">
                                            <img src="{{ asset('img/' . $medicine->image) }}" class="rounded-circle"
                                                alt=""
                                                style="max-height: 150px; object-fit: cover; object-position: center;">
                                            <p class="ms-5 me-5 pb-3">{{ $medicine->name }}</p>
                                            <p class="ms-5 me-5 pb-3 text-muted">{{ $medicine->category->name }}</p>
                                        </a>
                                    </div>
                                @endif
                                <?php $i++; ?>
                            @endforeach
                        @endif
                    @else
                        @foreach ($medicines->slice(0, 4) as $medicine)
                            <div class="list-medicine-mobile-item text-center">
                                <a href="/medicines/{{ $medicine->slug }}">
                                    <img src="{{ asset('img/' . $medicine->image) }}" class="rounded-circle"
                                        alt=""
                                        style="max-height: 150px; object-fit: cover; object-position: center;">
                                    <p class="ms-5 me-5 pb-3">{{ $medicine->name }}</p>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

    {{-- Swiper Js --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> --}}

    {{-- Initialize Swiper --}}
    {{-- <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            // spaceBetween: 30,
            // loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script> --}}
@endsection
