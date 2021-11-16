@extends('../template/navbar')

@section('content')
    <div class="container">
        <h1>Edit Pertanyaan</h1>
        <div class="badge bg-info">Harap sertakan foto agar memudahkan orang lain memberi gambaran diskusi</div>
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($questions as $item)
                        <form action="/question/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $item->title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Deskripsi</label>
                                <textarea name="description" id="description" cols="30" class="form-control"
                                    rows="10">{{ $item->description }}</textarea>
                                {{-- <textarea name="description" id="ckview"></textarea> --}}
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label>Upload</label>
                                <input type="file" name="image_src" class="form-control" value="{{ $item->image_src }}">
                            </div> --}}
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
        // tinymce.init({
        //     selector: '#ckview',
        //     forced_root_block: "",
        // });
    </script>
@endsection
