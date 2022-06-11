@extends('layout.dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom ">
    <h1 class="h2">Review Data Pelanggan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-10 mt-3 mx-5" role="alert">
    {{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-10 mx-5 mt-4">
    <form class="col-lg-4 mb-10" action="/contact/search">
        <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" name="search" class="form-control bg-secondary border-0" placeholder="Search ">
        </div>
    </form>
    <br>
    @if ($review->count())
    <table class="table table-striped table-lg">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Subject</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($review as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->user->username }}</td>
                <td>{{ $r->subject }}</td>
                <td>{{ $r->created_at }}</td>
                <td>
                    <a href="/review/{{ $r->id }}" class="badge bg-info"><span class="menu-icon mdi mdi-eye"></span></a>
                    <a href="/review/{{ $r->id }}/edit" class="badge bg-warning"><span class="menu-icon mdi mdi-circle-edit-outline"></span></a>
                    <form action="/review/{{ $r->id }}" method="post" class="d-inline">
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
    <p class="text-dark text-center fs-4">Review Pelanggan tidak ditemukan.</p>
    @endif
    <div class="mt-3">
        {{$review->links()}}
    </div>
</div>

@endsection