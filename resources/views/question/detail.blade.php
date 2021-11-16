@extends('../template/navbar')
@section('content')
    <div class="container mb-3">
        <img src=" {{ url('image/view/' . $question->image_src) }}" width="500" class="img rounded-2">
        <br>
    <img src="../img/icons/person.svg" class="me-1 mt-2 mb-2"><span class="small"><small>
                {{ $question->user->name }}</small></span>

        <h3>{{ $question->title }}</h3>
        <p class="lead">{{ $question->description }}</p>
        <p class="small"><small> {{ count($answers) }} Komentar</small></p>
        <hr>
        <div class="row">
            <div class="col-md-6">
                @if (count($answers) > 0)
                    {{-- <h5>komentar</h5> --}}
                    @foreach ($answers as $item)
                        <div class="card p-2 mb-2">
                            <p class="fw-bold">{{ $item->user->name }}</p>
                            <p class="small"><small>{{ $item->answer }}</small></p>
                        </div>
                    @endforeach
                @endif
                @if (Route::has('login'))
                    @auth
                        {{-- lamun udah login ieu nu tampil --}}
                        <h5>Tambah Komentar</h5>
                        <form enctype="multipart/form-data" method="POST" action="{{ url('answer/add/' . $question->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="answer" id="ckview"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
                            </div>
                        </form>
                </div>

            @else
                {{-- lamun can login, ieu nu tampil --}}
                <div class="badge bg-warning text-dark">Silahkan login untuk menambahkan komentar</div>
            @endauth
            @endif
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
@endsection
