@extends('template/navbar')
@section('content')
    <div class="container">
        <h1>Tambah Pertanyaan</h1>
        <div class="badge bg-info">Harap sertakan foto agar memudahkan orang lain memberi gambaran diskusi</div>
        <br /><br />
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('save_question') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" id="ckview"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Upload</label>
                            <input type="file" name="image_src" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Tambah Pertanyaan</button>
                        </div>
                    </form>
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

@endsection
