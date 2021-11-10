@extends('template/navbar')
@section('content')
<div class="container">
    <h1>Tambah Pertanyaan</h1>
    <div class="badge bg-info">Harap sertakan foto screenshot error agar memudahkan orang lain memberi solusi</div>
    <br /><br />
    <!--
    <div class="col-lg-8">
        <form method="post" action="add">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Tambahkan Gambar</label>
                <input class="form-control" type="file" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pertanyaan</button>

        </form>
    </div>
-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Tambah pertanyaan</h3>
            </div>
            <div class="col-md-12">
                <form action="{{ route('image_save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="image_title">
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi</label>
                        <textarea name="image_desc" id="ckview"></textarea>
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

<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>
    tinymce.init({
        selector: '#ckview'
    });
</script>

@endsection