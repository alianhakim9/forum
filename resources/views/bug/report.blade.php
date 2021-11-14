@extends('../template/navbar')
@section('content')
    <div class="container mt-5 mb-5">
        <h1>Laporkan Bug</h1>
        <i>Pesan akan diterima oleh developer Forum Diskusi Melalui Email</i>
        <div class="row">
            <div class="col-md-6">
                <form action="report/kirim" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group mt-3">
                        <label>Subjek</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Pesan</label>
                        <textarea name="message" id="ckview" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-primary mt-2" type="submit" value="kirim">Kirim</button>
                </form>
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
