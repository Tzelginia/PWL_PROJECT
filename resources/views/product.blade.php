@extends('layout.main')
@section('content')
    <h1 class="mt-3 mb-3 text-center text-white">
        <b> Our Products </b>
    </h1>

        @if (session()->has('success'))
            <script>
                $(document).ready(function(){
                $(".modal-title").text("Success !!");
                $(".modal-body p").text("{{ session('success') }}");
                $("#myModal").modal('show');
                });
            </script>
        @endif

    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <form action="/product">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Produk" name="search"
                        value="{{ request('search') }}">
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
                                <img src="{{ asset('storage/' . $p->file_pendukung) }}" class="card-img-top"
                                    alt="{{ $p->file_pendukung }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $p->nama }}</h5>
                                <!-- <p class="card-text">{{ $p->deskripsi }}</p> -->
                                <p class="card-text"><small class="text-muted">Last updated
                                        {{ $p->created_at->diffForHumans() }}</small></p>
                                @auth
                                @if (auth()->user()->role == 'pembeli')
                                    <form action="/keranjang" method="POST">
                                        @csrf
                                        <div class="value-button" id="decrease"
                                            onclick="decreaseValue('{{ $p->id }}')" value="Decrease Value">-</div>
                                        <input type="number" name="jumlah" id="jumlah{{ $p->id }}"
                                            value="0" />
                                        <div class="value-button" id="increase"
                                            onclick="increaseValue('{{ $p->id }}')" value="Increase Value">+</div>
                                        <br>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="product_id" value="{{ $p->id }}">

                                        <button type="submit" class="btn btn-primary btn-sm ">Add to cart</button>
                                        <a href="/product/{{ $p->id }}"
                                            class="btn btn-secondary float-right d-inline btn-sm">Read
                                            more</a>
                                        <script>
                                            function increaseValue(id) {
                                                var value = parseInt(document.getElementById('jumlah' + id).value, 10);
                                                value = isNaN(value) ? 0 : value;
                                                value++;
                                                document.getElementById('jumlah' + id).value = value;
                                            }

                                            function decreaseValue(id) {
                                                var value = parseInt(document.getElementById('jumlah' + id).value, 10);
                                                value = isNaN(value) ? 0 : value;
                                                value < 1 ? value = 1 : '';
                                                value--;
                                                document.getElementById('jumlah' + id).value = value;
                                            }
                                        </script>
                                    </form>
                                    @elseif (auth()->user()->role == 'admin')
                                    <a href="/product/{{ $p->id }}"
                                        class="btn btn-secondary float-right d-inline btn-sm">Read more</a>
                                    @endauth
                                        @else
                                        <a href="/product/{{ $p->id }}"
                                        class="btn btn-secondary float-right d-inline btn-sm">Read more</a>
                                    @endif


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-dark text-center fs-4">Produk masih belum tersedia.</p>
    @endif
    
    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header bg-success text-center">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="/keranjang" role="button">Go To Trolie</a>
                {{-- <button href="/transaksiUser" type="button" class="btn btn-primary">Go To Transacton</button> --}}
            </div>
            </div>
        </div>
    </div>
@endsection
