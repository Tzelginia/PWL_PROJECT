@extends('layout.dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom">
    <h1 class="h2">Edit Data Pelanggan</h1>
</div>

<div class="col-lg-8 mx-5 mt-4">
    <form method="post" action="/dashboard/category/{{ $category->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_category" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('nama_category') is-invalid @enderror" id="nama_category" name="nama_category" value="{{ old('nama_category', $category->nama_category) }}">
            @error('nama_category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection