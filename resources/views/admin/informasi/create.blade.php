@extends('layouts.admin')

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h3>Tambah Informasi</h3>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.informasi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul">
                            </div>
                            <div class="form-group">
                                <label for="body" class="form-label">Body</label>
                                <textarea name="body" id="body" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-sm btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#body').summernote();
        });
    </script>
@endpush
