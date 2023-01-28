<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>MyUKS | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 d-none d-xl-block p-0">
                <img src="/img/login/school.png" class="login-image" alt="background sekolah">
            </div>
            <div class="col-sm-12 col-xl-8 p-4 justify-content-center">
                <center>
                    <img src="/img/assets/Logo_telkom.png" class="logo-sekolah" width="164px" alt="logo sekolah">
                </center>
                <div class="login-section">
                    <h1>Welcome to MyUKS</h1>
                    <form action="" method="post">
                        @csrf
                        <div class="login-form">
                            <div class="mt-5">
                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('loginError') }}
                                    </div>
                                @endif
                                <p class="form-input-title mb-2">Username</p>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"></span>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        class="mt3" value="{{ old('username') }}" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                    @error('username')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="form-input-title mb-2">Password</p>
                                <div class="input-group p-0">
                                    <span class="input-group-text" id="basic-addon1"></span>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="username"
                                        class="mt3" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('password')
                                        <div class="invalid-feedback mb-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5 ps-4 pe-4" name="submit"
                            role="button">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <img src="/img/login/vector.png" class="vector m-0 p-0 d-none d-xl-block" alt="">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
