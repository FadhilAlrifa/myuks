@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/css/style/medicine/medicines.css">
@endsection

@section('navbar_menu')
    @include('partials.navbar_menu')
@endsection

@section('container')
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
                                aria-describedby="basic-addon1" placeholder="Cari Obat/Vitamin">
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
                                <?php $i = 1; ?>
                                @foreach ($medicines_category as $medicine_category)
                                    <div class="form-check">
                                        <input class="form-check-input" name="category" type="radio"
                                            value="{{ $medicine_category->slug }}" id="check{{ $i }}">
                                        <label class="form-check-label" for="check{{ $i }}">
                                            {{ $medicine_category->name }}
                                        </label>
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary fs-5" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10 d-none d-xl-block button-add-medicine">
            @auth
                <a class="btn btn-primary btn-add-medicine mt-5" href="/medicines/admin/add" role="button">Tambah Obat</a>
            @endauth
        </div>
    </div>

    @if (request('search') || request('category'))
        <div class="row mt-5">
            <div class="row justify-content-center mb-5">
                @foreach ($medicines_category->where('slug', request('category')) as $medicine_category)
                    <div class="col-lg-10">
                        <img src="/img/assets/icon_obat.png" width="56px" alt="" class="d-inline">
                        <h3 class="d-inline-block ms-3 title-text"><b>{{ $medicine_category->name }}</b></h3>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center daftar-obat">
                @if ($medicines->count())
                    @foreach ($medicines as $medicine)
                        <div class="col-lg-3 mb-5">
                            <a href="/medicines/{{ $medicine->slug }}">
                                <div class="card border-obat">
                                    <div class="text-center">
                                        <img src="{{ asset('img/' . $medicine->image) }}" class="card-img-top rounded"
                                            alt="...">
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title text-dark">{{ $medicine->name }}</h4>
                                        <p class="card-text mt-4">Stok : {{ $medicine->stock }}</p>
                                        <p>Kategori : {{ $medicine->category->name }}</p>
                                        <p class="text-muted">View : {{ $medicine->view }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Obat masih kosong</p>
                @endif
            </div>
        </div>
    @else
        @foreach ($medicines_category as $medicine_category)
            @if ($medicines->where('category_id', $medicine_category->id)->count())
                <div class="row mt-5">
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-10">
                            <img src="img/assets/icon_obat.png" width="56px" alt="" class="d-inline">
                            <h3 class="d-inline-block ms-3 title-text"><b>{{ $medicine_category->name }}</b></h3>
                        </div>
                    </div>
                    @if ($medicines->where('category_id', $medicine_category->id)->count())
                        <div class="row justify-content-center daftar-obat">
                            @foreach ($medicines->where('category_id', $medicine_category->id) as $medicine)
                                <div class="col-lg-3 mb-5">
                                    <a href="/medicines/{{ $medicine->slug }}">
                                        <div class="card border-obat">
                                            <div class="text-center">
                                                <img src="{{ asset('img/' . $medicine->image) }}"
                                                    class="card-img-top rounded" alt="...">
                                            </div>
                                            <div class="card-body text-center">
                                                <h4 class="card-title text-dark">{{ $medicine->name }}</h4>
                                                <p class="card-text mt-4">Stok : {{ $medicine->stock }}</p>
                                                <p>Kategori : {{ $medicine->category->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center fs-3 card border-0 w-25 py-3 m-auto text-muted disabled">Obat masih kosong
                        </p>
                    @endif
                </div>
            @endif
        @endforeach
    @endif

@endsection
