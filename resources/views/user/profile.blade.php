@extends('template/navbar')
@section('content')
    <div class="container">
        <h1>Halo, {{ $user[0]->name }}</h1>
        <p>{{ $user[0]->email }}</p>
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
                        <div class="card p-2  rounded-0 mt-4">
                            {{-- <p> {{ $item }}</p> --}}
                            <div class="row">
                                <div class="col-md-10">
                                    <h3> {{ $item->title }}</h3>
                                    <p> {{ $item->description }}</p>
                                    <a href="{{ url('detail/' . $item->id) }}" class="text-decoration-none">Lihat
                                        komentar</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="text-decoration-none">Edit</a>
                                    <a href="#" class="text-danger text-decoration-none">Hapus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <p>ieu didieu nyimpen naon alusna ndi ? </p>
                </div>
            @endif

        </div>
    </div>
@endsection
