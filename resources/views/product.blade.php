@extends('layout.main')
@section('content')

<h1 class="mt-3 mb-3 text-center text-secondary">
    <b> Our Products </b>
</h1>

<div class="row justify-content-center">
    <div class="col-md-6 mb-3">
        <form action="/product">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Produk" name="search" value="{{ request('search') }}">
                <button class="btn btn-dark" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($product->count())
<div class="container">
    <div class="row">
        @foreach ($product as $p)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div style="max-height: 500px; overflow:hidden">
                    <img src="{{ asset('storage/' . $p->file_pendukung) }}" class="card-img-top" alt="{{ $p->file_pendukung }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama }}</h5>
                    <!-- <p class="card-text">{{ $p->deskripsi }}</p> -->
                    <p class="card-text"><small class="text-muted">Last updated {{ $p->created_at->diffForHumans() }}</small></p>
                    <form>
                        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                        <input type="number" id="number" value="0" />
                        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                    </form>
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                    <a href="/product/{{ $p->id }}" class="btn btn-secondary float-right">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-dark text-center fs-4">Produk masih belum tersedia.</p>
@endif


@endsection