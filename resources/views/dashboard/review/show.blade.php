@extends('layout.dashboard.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Detail Review Pelanggan
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID : </b>{{ $review->id }}</li>
                    <li class="list-group-item"><b>Username : </b>{{ $review->user->username }}</li>
                    <li class="list-group-item"><b>Subject : </b>{{ $review->subject }}</li>
                    <li class="list-group-item"><b>Tanggal Dibuat : </b>{{ $review->created_at }}</li>
                    <li class="list-group-item"><b>Isi Review Pelanggan : </b>{{ $review->isi }}</li>
            </div>
            <a class="btn btn-success mt-3 mb-3" href="/review">Kembali</a>
        </div>
    </div>
</div>
@endsection