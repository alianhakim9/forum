<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum Diskusi</title>
    <link rel="shortcut icon" href="{{ url('./img/title.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('./css/bootstrap5/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('./css/bootstrap5/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('./css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <script src="{{ url('./js/bootstrap5/bootstrap.js') }}"></script>
    <script src="{{ url('./js/bootstrap5/bootstrap.min.js') }}"></script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-3">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="{{ url('/') }}">
                <img src="https://cdn0.iconfinder.com/data/icons/news-and-magazine/512/forum-512.png" height="20" alt=""
                    loading="lazy" />
                Forum Diskusi
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item ms-3">
                        <a href="/about" class="cl ps-3 pe-3 pt-2 pb-2 small text-decoration-none text-muted">about</a>
                    </li>
                    <li class="nav-item">
                        <a href="/report" class="cl ps-3 pe-3 pt-2 pb-2 small text-decoration-none text-muted">laporkan
                            bug</a>
                    </li>
                </ul>
                <!-- Left links -->

                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav">
                            <!-- Avatar -->
                            <li class="nav-item">
                                <a class="small text-decoration-none ps-3 pe-3 pt-2 pb-2 text-muted  d-flex align-items-center cl"
                                    href="/profil" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profil"
                                    role="button" aria-expanded="false">
                                    <img src="https://cdn4.iconfinder.com/data/icons/avatars-xmas-giveaway/128/boy_person_avatar_kid-1024.png"
                                        class="rounded-circle" height="22" alt="" loading="lazy" />
                                    <span class="ms-2">Halo, {{ auth()->user()->name }}</span>
                                </a>
                            <li class="nav-item">
                                <a href="/tambah" class="nav-link small  cl" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Tambah pertanyaan"><i class="bi bi-plus-lg"></i>
                                    <span>pertanyaan</span></a>
                            </li>

                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="nav-link small text-decoration-none ps-3 pe-3 pt-2 pb-2 text-muted logout cl"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout"><i
                                            class="bi bi-box-arrow-right"></i><span class="ms-1">keluar</span></a>
                                </form>
                            </li>
                        </ul>
                    @else
                        <div class="d-flex align-items-center">
                            <a class="btn btn-link text-decoration-none px-3 me-2" href="{{ route('login') }}">
                                Login
                            </a>
                            @if (Route::has('register'))
                                <a type="button" class="btn btn-primary me-3" href="{{ route('register') }}">
                                    Sign up for free
                                </a>
                            @endif
                        </div>
                    @endauth
                @endif
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    {{-- Content --}}
    @yield('content')
    {{-- Content --}}

    <!-- Footer -->
    <footer class="bg-dark text-center text-white mt-4">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="bi bi-facebook"></i></a>

                <!-- Twitter -->
                <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="bi bi-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="bi bi-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="bi bi-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="bi bi-linkedin"></i></a>

                <!-- Github -->
                <a class="btn btn-dark btn-floating m-1" href="#!" role="button"><i class="bi bi-github"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our update</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example21" class="form-control"
                                    placeholder="Email address" />
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    forum untuk berbagi informasi terkait error ataupun kendala yang didapati dari proses belajar.
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white" href="/">Forumdiskusi</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>

{{-- catatan 
    composer install
composer update
npm install && npm run dev
setup .env
setup database 
 - nama db : forum-laravel
php artisan migrate
php artisan serve --}}
