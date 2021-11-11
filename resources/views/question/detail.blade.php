<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Question</title>
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

    <div class="container mb-3">
        <img src=" {{ url('image/view/' . $question->image_src) }}" width="500" class="img rounded-2">
        <br>
        <img src="../img/icons/person.svg" class="me-1 mt-2 mb-2"> {{ $question->user->name }}

        <h3>{{ $question->title }}</h3>
        <p class="lead">{{ $question->description }}</p>
        <hr>

        @if (count($answers) > 0)
            <h5>komentar</h5>
            @foreach ($answers as $item)
                <div class="card p-2 mb-2">
                    <p class="fw-bold">{{ $item->user->name }}</p>
                    <p>{{ $item->answer }}</p>
                </div>
            @endforeach
        @endif
        @if (Route::has('login'))
            @auth
                {{-- lamun udah login ieu nu tampil --}}
                <h5>Tambah Komentar</h5>
                <div class="row">
                    <div class="col-md-6">
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ url('answer/add/' . $question->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="answer" id="ckview"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                {{-- lamun can login, ieu nu tampil --}}
                <div class="badge bg-warning text-dark">Silahkan login untuk menambahkan komentar</div>
            @endauth
        @endif
    </div>
    <script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#ckview',
            forced_root_block: ""
        });
    </script>
</body>

</html>
