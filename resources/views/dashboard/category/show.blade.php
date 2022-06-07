@extends('layout.dashboard.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Detail Kategori
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID : </b>{{ $category->id}}</li>
                    <li class="list-group-item"><b>Nama Kategori : </b>{{ $category->nama_category}}</li>
            </div>
            <a class="btn btn-success mt-3 mb-3" href="/dashboard/category">Kembali</a>
        </div>
    </div>
</div>
@endsection