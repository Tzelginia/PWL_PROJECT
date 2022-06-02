@extends('layout.dashboard.main')

@section('content')

<div class="table-responsive">
    <div class="d-xl-flex justify-content-between align-items-start">
        <h3 class="text-dark font-weight-bold mb-3">Daftar Barang </h3>
    </div>
    <table class="table table-head-fixed table-hover">
        <thead>
            <tr>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Merk Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
    </table>
</div>
@endsection