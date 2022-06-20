@extends('layout.main')
@section('content')
    <h1 class="mt-3 mb-5 text-center text-secondary">
        <b> My Cart </b>
    </h1>

    <div class="container mt-3 mb-3">
        @foreach ($keranjang as $k)
            @if ($k->user_id == auth()->user()->id)
                <div class="card mb-3 bg-secondary" style="max-width: 10000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $k->product->file_pendukung) }}"
                                class="img-fluid rounded-start w-100" alt="{{ $k->product->nama }}">
                        </div>
                        <div class="col-md-8 text-white">
                            <div class="card-body">
                                <h5 class="card-title">{{ $k->product->nama }}</h5>
                                <p class="card-text text-white">This is a wider card with supporting text below as a natural
                                    lead-in to
                                    additional content. This content is a little bit longer.</p>
                                <p class="card-text text-white"><small>Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
