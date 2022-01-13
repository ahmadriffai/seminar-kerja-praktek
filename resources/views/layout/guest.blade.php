<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('/asset/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/asset/css/style.css') }}" />
    <title>{{ $title ?? '' }}</title>
</head>
<body class="bg-white">
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning shadow nav-custom py-3">
    <div class="container">
        <a class="navbar-brand fw-bolder" href="#">
            <img src="{{ asset('asset/img/logo-unsiq.png') }}"  class="img-fluid mx-auto" width="40px" alt="" sizes="" srcset="">
            Seminar KP
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-bold" aria-current="page" href="{{ route('guest.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="./seminar.html">Seminar</a>
                </li>
            </ul>
            <form class="d-flex">
                <a href="{{ route('guest.user.login') }}" class="btn btn-light shadow" type="submit">Login</a>
                <a href="{{ route('guest.user.check-nim') }}" class="btn btn-secondary mx-1 shadow" type="submit">Daftar</a>
            </form>
        </div>
    </div>
</nav>
<!-- //navbar -->

@yield("content")

<footer class="bg-dark p-5 text-light">
    <div class="row">
        <div class="col-12 text-center">© 2021 Seminar KP</div>
    </div>
</footer>
<script src="{{ asset('/asset/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
