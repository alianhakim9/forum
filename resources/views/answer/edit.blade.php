@extends('./template/navbar')

@section('content')
    <div class="container">
        <h5>Ubah komentar/jawaban</h5>
        <a href="{{ url('/detail/ ' . $data['id']) }}" class="text-decoration-none mb-3 d-block"><i
                class="bi bi-backspace"></i> Kembali</a>
        <form action=" {{ url('/answer/update/' . $data['id']) }} " method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <textarea name="answer" id="answer" cols="30" rows="10"
                    class="form-control">{{ $data['answer'] }}</textarea>
                <button type="submit" class="btn btn-info mt-3">Simpan</button>
            </div>
        </form>
    </div>
@endsection
