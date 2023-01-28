<nav class="navbar navbar-expand-lg bg-light navrbar-light p-0 " style="">
    <div class="container-fluid nav-color py-3 px-5">
        <a href="/?article_category=all&medicine_category=all">
            <img src="/img/assets/MyUKS_2.png" class="-inline" height="50px" alt="Icon MyUks"
                style="object-fit: cover; object-position: centers; border-radius: 10px;">
        </a>
        {{-- <div class="col-md-1 d-inline">
            <h3 class="text-center mt-2"><a href="/?article_category=all&medicine_category=all"
                    style="text-decoration: none; color: black">myUKS</a></h3>
        </div> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" aria-current="page"
                        href="/?article_category=all&medicine_category=all">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'articles' ? 'active' : '' }}"
                        href="/articles">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'medicines' ? 'active' : '' }}"
                        href="/medicines">Obat</a>
                </li>
                <!-- <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li> -->
            </ul>
        </div>
        @auth
            <a class="btn btn-primary login-btn" href="/logout" role="button">Logout</a>
        @else
            <a class="btn btn-primary login-btn" href="/login" role="button">Login</a>
        @endauth
    </div>
</nav>
