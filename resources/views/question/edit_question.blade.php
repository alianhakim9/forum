<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pertanyaan</title>
    <link rel="stylesheet" href="../css/bootstrap5/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="../js/bootstrap5/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Forum Diskusi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        this.closest('form').submit();" class="nav-link">
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

    <div class="container">
        <h1>Edit Pertanyaan</h1>
        <div class="badge bg-info">Harap sertakan foto agar memudahkan orang lain memberi gambaran diskusi</div>
        <br /><br />
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    @foreach($questions as $item)
                    <form action="/question/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $item->title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" id="ckview" value="{{ $item->description }}"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Upload</label>
                            <input type="file" name="image_src" class="form-control" value="{{ $item->image_src }}">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Edit Pertanyaan</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#ckview',
            forced_root_block: ""
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <body>

</html>