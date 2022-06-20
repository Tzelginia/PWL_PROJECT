@extends('layout.dashboard.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <h3 class="card-title">Form Produk</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/product" class="mb-5" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select class="form-select" name="category_id">
                                @foreach ($category as $c)
                                @if (old('category_id') === $c->id)
                                <option value="{{ $c->id }}" selected>{{ $c->nama_category }}</option>
                                @else
                                <option value="{{ $c->id }}">{{ $c->nama_category }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="file_pendukung" class="form-label @error('file_pendukung') is-invalid @enderror">Photo Produk</label>
                            <img class="img-preview img-fluid mb-3 col-sm-9">
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
            </div>
        </div>
    </div>
</div>

@endsection