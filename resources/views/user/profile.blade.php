@extends('template/navbar')
@section('content')
    <div class="container">
        <h3 class="mt-3">My Profile</h3>
        <div class="p-3">
            <div class="d-flex">
                <img src="https://cdn4.iconfinder.com/data/icons/avatars-xmas-giveaway/128/boy_person_avatar_kid-1024.png"
                    class="img" width="100">
                <div class="ms-4">
                    <h1>{{ auth()->user()->name }}</h1>
                    <p class="small">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>
        <hr>
        <h5>Daftar pertanyaan ku</h5>
        <div class="row">
            @if (!count($questions) > 0)
                <div class="col-md-6">
                    <p>* kamu belum pernah menambahkan topik diskusi</p>
                    <a href="{{ url('/tambah') }}" class="btn btn-primary mt-2">Klik disini untuk menambahkan topik
                        diskusi</a>
                </div>
            @else
                <div class="col-md-6">
                    @foreach ($questions as $item)
                        <div class="card p-3 shadow-sm border-0 rounded-5 mt-4 ">
                            {{-- <p> {{ $item }}</p> --}}
                            <div class="row">
                                <div class="col-md-10">
                                    <img src=" {{ url('image/view/' . $item->image_src) }}" width="200"
                                        class="img rounded-2 mb-2">
                                    <h3> {{ $item->title }}</h3>
                                    <p> {{ $item->description }}</p>
                                    <p class="small"> <a href="{{ url('detail/' . $item->id) }}"
                                            class="text-decoration-none">Lihat
                                            komentar</a></p>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ url('question/edit_question/' . $item->id) }}"
                                        class="text-decoration-none">Edit</a>
                                    <a href="{{ url('question/delete/' . $item->id) }}"
                                        class="text-danger text-decoration-none">Hapus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <img src="../img/profil.png" class="img w-100">
                </div>
            @endif

        </div>
    </div>
@endsection
