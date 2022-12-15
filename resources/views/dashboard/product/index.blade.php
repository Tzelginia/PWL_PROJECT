@extends('layout.dashboard.main')
@section('content')
<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Produk</h4>
                    <div class="card-tools">
                        <a href="/dashboard/product/create" class="btn btn-sm btn-primary">
                            Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-lg">
                            <thead class="table-dark text-md-center">
                                <tr>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $p)
                                <tr>
                                    <td>{{ $p->category->nama_category }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->harga }}</td>
                                    <td>
                                        <div class="wrapper">
                                            <img src="{{ asset('https://storage.cloud.google.com/tzelginia_uas_bucket/' . $p->file_pendukung) }}" alt="" class="rounded mx-auto d-block" width="100%" height="100%">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/dashboard/product/{{ $p->id }}" class="badge bg-info"><span class="menu-icon mdi mdi-eye"></span></a>
                                        <a href="/dashboard/product/{{ $p->id }}/edit" class="badge bg-warning"><span class="menu-icon mdi mdi-circle-edit-outline"></span></a>
                                        <form action="/dashboard/product/{{ $p->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')"><span class="menu-icon mdi mdi-backspace"></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{$product->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection