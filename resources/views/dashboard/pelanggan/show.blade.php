@extends('layout.dashboard.main')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 30rem;">
            <div class="card-header">
                Detail Pelanggan
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID : </b>{{ $user->id }}</li>
                    <li class="list-group-item"><b>Username : </b>{{ $user->username }}</li>
                    <li class="list-group-item"><b>Email : </b>{{ $user->email }}</li>
                    <li class="list-group-item"><b>Role : </b>{{ $user->role }}</li>
            </div>
            <a class="btn btn-success mt-3 mb-3" href="/dashboard/pelanggan">Kembali</a>
        </div>
    </div>
</div>
@endsection