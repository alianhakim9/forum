<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum Diskusi</title>
    <link rel="stylesheet" href="./css/bootstrap5/bootstrap.css">
    <script src="./js/bootstrap5/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Forum Diskusi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            {{-- lamun udah login ieu nu tampil --}}
                            <li class="nav-item">
                                <a href="/profil" class="nav-link">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="/tambah" class="nav-link">Tambah Pertanyaan</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                        this.closest('form').submit();"
                                        class="nav-link">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        @else
                            {{-- lamun can login, ieu nu tampil --}}
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">login</a>
                            </li>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        @endauth
                    @endif
                    <li class="nav-item">
                        <a href="#" class="btn btn-danger nav-link text-light">Laporkan Bug</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <div class="card text-dark bg-light rounded-0 mt-5">
        <div class="card-header bg-dark rounded-0">
            <div class="container">
                <p class="fw-bold text-light">Saling diskusi di forum diskusi</p>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>
    </div>
    </div>
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
