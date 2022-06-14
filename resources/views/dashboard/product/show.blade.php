@extends('layout.dashboard.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset('storage/' . $product->file_pendukung) }}" class="card-img-top" alt="{{ $product->file_pendukung }}">
            <div class="card-header">
                Detail Product
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kategori : </b>{{ $product->category->nama_category  }}</li>
                    <li class="list-group-item"><b>Nama : </b>{{ $product->nama }}</li>
                    <li class="list-group-item"><b>Harga : </b>Rp.{{ $product->harga }}</li>
            </div>
            <a class="btn btn-success mt-3 mb-3" href="/dashboard/product">Kembali</a>
        </div>
    </div>
</div>
@endsection