<div class="row partial-navbar">
    <div class="col-lg-2"></div>

    <div class="col-lg-8 align-self-center">
        <br><br>
        <div class="title d-flex">
            <img src="/img/nav_menu_icon/<?= isset($icon) ? $icon : '' ?>" width="85" alt="">
            <h1 class="mt-4 ms-3">
                {{ $nav_title }}
            </h1>
        </div>
        <br><br>
        <div class="card card-parent " style="width: 100%;">
            <div class="card-body container">
                <br><br>
                <br><br>
                <div class="col-lg-12 justify-content-evenly ms-3 row margin-0">
                    <a href="/hospitals"
                        class="card card-child col-lg-2 border-card {{ request()->segment(1) == 'hospitals' ? 'card-child-active' : '' }}">
                        <div>
                            <div class="card-body">
                                <center>
                                    <img src="/img/nav_menu_icon/hospital_icon.png" alt="" width="65px"
                                        class="mt-4">
                                </center>
                                <h4 class="card-subtitle text-center mt-4">Fasilitas Kesehatan</h4>
                            </div>
                        </div>
                    </a>
                    <a href="/medicines"
                        class="card card-child col-lg-2 border-card {{ request()->segment(1) == 'medicines' ? 'card-child-active' : '' }}">
                        <div>
                            <div class="card-body">
                                <center>
                                    <img src="/img/nav_menu_icon/medicine_icon.png" alt="" width="65px"
                                        class="mt-4">
                                </center>
                                <h4 class="card-subtitle text-center mt-4">Obat / Vitamin</h4>
                            </div>
                        </div>
                    </a>
                    <a href="/articles"
                        class="card card-child col-lg-2 border-card {{ request()->segment(1) == 'articles' ? 'card-child-active' : '' }}">
                        <div>
                            <div class="card-body">
                                <center>
                                    <img src="/img/nav_menu_icon/article_icon.png" alt="" width="65px"
                                        class="mt-4">
                                </center>
                                <h4 class="card-subtitle text-center mt-4">Artikel Kesehatan</h4>
                            </div>
                        </div>
                    </a>
                    @foreach ($user as $user)
                        <a href="https://wa.me/{{ $user->number }}?text=samlekom+min"
                            class="card card-child col-lg-2 border-card">
                            <div>
                                <div class="card-body">
                                    <center>
                                        <img src="/img/nav_menu_icon/chat_icon.png" alt="" width="65px"
                                            class="mt-4">
                                    </center>
                                    <h4 class="card-subtitle text-center mt-4">Chat UKS</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-2"></div>
</div>
