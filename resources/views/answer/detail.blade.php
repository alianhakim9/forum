@extends('../template/navbar')
@section('content')
    <div class="container mt-3 mb-3">
        <div class="row mt-3">
            <div class="col-md-2">
                <p class="text-muted fw-bold">MENU</p>
                <a href="/" class="nav-link text-muted ps-1"><i class="bi bi-house"></i> Home</a>
                <a href="#" class="nav-link text-muted ps-1"><i class="bi bi-compass"></i> Explore Topics</a>
                <a href="#" class="nav-link text-muted ps-1"><i class="bi bi-book"></i> My Topics</a>
                <a href="/my-answer" class="nav-link ps-2 text-light bg-dark"><i class="bi bi-chat-left-text"></i> My
                    Answer</a>
            </div>
            <div class="col-md-6">
                @if (!$status)
                    {{-- jika belum login --}}
                    <p class="text-center mt-5">{{ $message }}</p>
                @else
                    {{-- jika sudah login --}}
                    <p class="small"><small> {{ count($myAnswers) }} Jawabanku</small>
                    </p>
                    @foreach ($myAnswers as $item)
                        <div class="card shadow p-3 mb-5 bg-body rounded border-0">
                            <div class="row p-2">
                                <div class="col-md-12">

                                    <span class="small text-muted d-block">You said : {{ $item->answer }}</span>
                                    <p class="small"><a href="{{ url('detail/' . $item->question_id) }}"
                                            class="text-decoration-none">
                                            lihat pertanyaan</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-md-4">
                <img src="./img/discuss.png" class="img w-100">
            </div>
        </div>
    </div>
    </div>
@endsection
