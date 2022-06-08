@extends('layout.dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom ">
    <h1 class="h2">Data Kategori</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-6 mt-3 mx-5" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-6 mx-5 mt-4">
    <a href="/dashboard/category/create" class="btn btn-primary mb-3">Tambah Kategori</a>
    @if ($category->count())
    <table class="table table-striped table-lg">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->nama_category }}</td>
                <td>
                    <a href="/dashboard/category/{{ $c->id }}" class="badge bg-info"><span class="menu-icon mdi mdi-eye"></span></a>
                    <a href="/dashboard/category/{{ $c->id }}/edit" class="badge bg-warning"><span class="menu-icon mdi mdi-circle-edit-outline"></span></a>
                    <form action="/dashboard/category/{{ $c->id }}" method="post" class="d-inline">
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
    <p class="text-dark text-center fs-4">Kategori tidak ditemukan.</p>
    @endif
    <div class="mt-3">
        {{$category->links()}}
    </div>
</div>

@endsection