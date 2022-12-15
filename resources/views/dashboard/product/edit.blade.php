@extends('layout.dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom">
    <h1 class="h2">Edit Data Pelanggan</h1>
</div>

<div class="col-lg-8 mx-5 mt-4">
    <form method="post" action="/dashboard/product/{{ $product->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" name="category_id">
                @foreach ($category as $c)
                @if (old('category_id', $product->category_id) == $c->id)
                <option value="{{ $c->id }}" selected>{{ $c->nama_category }}</option>
                @else
                <option value="{{ $c->id }}">{{ $c->nama_category }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama' , $product->nama) }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $product->harga) }}">
            @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file_pendukung" class="form-label @error('file_pendukung') is-invalid @enderror">file_pendukung Member</label>
            <input type="hidden" name="oldfile_pendukung" value="{{ $product->file_pendukung }}">
            @if ($product->file_pendukung)
            <img src="{{ asset('https://storage.cloud.google.com/tzelginia_uas_bucket/' . $product->file_pendukung) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control" type="file" id="file_pendukung" name="file_pendukung" onchange="previewImage()">
            @error('file_pendukung')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection