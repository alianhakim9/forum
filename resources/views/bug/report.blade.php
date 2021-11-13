<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporkan Bug Forum Diskusi</title>
    <link rel="stylesheet" href="../css/bootstrap5/bootstrap.css">
    <script src="../js/bootstrap5/bootstrap.js"></script>
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
                                <a href="/add" class="nav-link">Tambah Pertanyaan</a>
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

    <div class="container mt-5 mb-5">
        <h1>Laporkan Bug</h1>
        <i>Pesan akan diterima oleh developer Forum Diskusi Melalui Email</i>
        <div class="row">
            <div class="col-md-6">
                <form action="report/kirim" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group mt-3">
                        <label>Subjek</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pesan</label>
                        <textarea name="message" id="ckview" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit" value="kirim">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#ckview',
        forced_root_block: ""
    });
</script>
