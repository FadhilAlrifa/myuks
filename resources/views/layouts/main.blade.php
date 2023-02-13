<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyUKS | {{ $url_name }}</title>

    <link rel="shortcut icon" href="/img/assets/MyUKS_2.ico" type="image/x-icon">

    @yield('style')

    @yield('script')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    {{-- Mematikan Trix-toolbar-file --}}
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="body">

    <div class="mobile">
        {{-- <h3>Mohon maaf, saat ini tampilan hanya tersedia untuk desktop yang lebih lebar</h3> --}}
        <h3>Fitur Admin Hanya Tersedia Untuk Desktop</h3>
    </div>

    @include('partials.navbar')

    <div class="container-fluid">
        {{-- @include('partials.navbar_menu') --}}

        @yield('navbar_menu')

        @yield('container')

        <br><br><br><br><br><br><br><br><br>

        <!-- Footer -->
        @include('partials.footer')
        <!-- Footer End -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
