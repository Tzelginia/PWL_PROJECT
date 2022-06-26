@extends('layout.dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom ">
    <h1 class="h2">Data Pelanggan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-10 mt-3 mx-5" role="alert">
    {{ session('success') }}
</div>
@endif
<!-- <div class="search-field d-none d-xl-block">
    <ul class="navbar-nav navbar-nav-right">
        <form class="d-flex align-items-right h-100 col-lg-4" action="/search">
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" name="search" class="form-control bg-secondary border-0" placeholder="Search ">
            </div>
        </form>
    </ul>
</div> -->



<div class="table-responsive col-lg-10 mx-5 mt-4">
    <form class="col-lg-4 mb-10" action="/dashboard/pelanggan">
        <div class="input-group ">
            <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" name="search" class="form-control bg-secondary border-0 text-white" placeholder="Search" value="{{ request('search') }}">
        </div>
    </form>
    <br>
    @if ($user->count())
    <table class="table table-striped table-lg">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Verify</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
            @if($u->role == 'admin')
                @continue
            @endif
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    @if( $u->verify == 0)
                    <form action="/verify" method="get" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $u->id }}">
                        <button type="submit" class="badge bg-warning border-0">Verify</button>
                    </form>

                    @else
                    <form action="/block" method="get" class="d-inline">
                        @csrf
                        <input type="hidden" name="id" value="{{ $u->id }}">
                        <button type="submit" class="badge bg-success border-0">Verified</button>
                    </form>

                    @endif
                </td>
                <td>
                    <a href="/dashboard/pelanggan/{{ $u->id }}" class="badge bg-info"><span class="menu-icon mdi mdi-eye"></span></a>
                    <a href="/dashboard/pelanggan/{{ $u->id }}/edit" class="badge bg-warning"><span class="menu-icon mdi mdi-circle-edit-outline"></span></a>
                    <form action="/dashboard/pelanggan/{{ $u->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')"><span class="menu-icon mdi mdi-backspace"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-dark text-center fs-4">Pelanggan tidak ditemukan.</p>
    @endif
    <div class="mt-3">
        {{$user->links()}}
    </div>
</div>

@endsection