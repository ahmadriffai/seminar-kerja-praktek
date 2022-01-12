<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('/asset/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/asset/css/style.css') }}" />
    <title>{{ $title ?? '' }}</title>
</head>

<body>
<!-- navbar -->
<nav class="navbar-custom shadow-sm">
    <h4 class="text-success pt-2">Seminar</h4>
    <div class="profile">
        <div class="dropdown">
            <button class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./asset/img/profile.png" alt="" class="profile-image">
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="login.html"><span class="fas fa-sign-out-alt"></span> Logout</a>
                </li>
            </ul>
        </div>

        <span class="profile-name">User</span>
    </div>
</nav>
<!-- //navbar -->



<!-- sidebar -->
<input type="checkbox" id="toggle">
<label for="toggle" class="side-toggle">
    <span class="fas fa-bars"></span>
</label>

<div class="sidebar text-black-50 shadow-sm">
    <a href="#" class="sidebar-menu text-black-50 text-decoration-none">
            <span class="fas fa-calendar">
            </span>
        <p>Dashboard</p>
    </a>
    <a href="#" class="sidebar-menu text-black-50 text-decoration-none">
            <span class="fas fa-user">
            </span>
        <p>Buat Seminar</p>
    </a>
    <a href="#" class="sidebar-menu text-black-50 text-decoration-none">
            <span class="fas fa-user">
            </span>
        <p>Pendaftaran Penyeminar</p>
    </a>
    <a href="#" class="sidebar-menu text-black-50 text-decoration-none @if(url()->current() == url("admin/mahasiswa")) active @endif">
            <span class="fas fa-calendar-alt">
            </span>
        <p>Data Mahasiswa</p>
    </a>
</div>
<!-- //sidebar -->

<!-- main -->
<main>
    <div class="row my-4">
        <div class="section-judul">
            <h3>{{ $title ?? '' }}</h3>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    @yield("content")

</main>

<!-- //main -->

<script src="{{ asset('/asset/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
