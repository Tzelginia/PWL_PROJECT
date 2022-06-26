@extends('layout.main')
@section('content')
    <h1 class="mt-3 mb-5 text-center text-white">
        <b> My Cart </b>
    </h1>

        @if (session()->has('success'))
            <script>
                $(document).ready(function(){
                $(".modal-title").text("Success !!");
                $(".modal-body p").text("{{ session('success') }}");
                $("#myModal").modal('show');
                });
            </script>
        @elseif (session()->has('successDel'))
        <script>
                $(document).ready(function(){
                $(".modal-title").text("Success !!");
                $(".modal-body p").text("{{ session('successDel') }}");
                $("#myModal1").modal('show');
                });
            </script>
        @endif
    <div class="container mt-3 mb-3">
        @foreach ($keranjang as $k)
            @if ($k->user_id == auth()->user()->id)
                <div class="row course align-items-center mb-3">
                    <!-- Modal -->
                    <div class="modal fade " id="orderModal{{ $k->id }}" tabindex="-1" aria-labelledby="orderModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="hide modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderModalLabel">Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Terima kasih telah memesan, silahkan melakukan melakukan pembayaran
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="/dashboard/transaksi">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id"
                                            value="{{ $k->product->id }}">
                                        <input type="hidden" name="jumlah" id="jumlah" value="{{ $k->jumlah }}">
                                        <input type="hidden" name="total" id="total"
                                            value="{{ $k->jumlah * $k->product->harga }}">
                                        <input type="hidden" name="keranjang_id" id="keranjang_id"
                                            value="{{ $k->id }}">
                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal"
                                            onclick="return confirm('Apakah anda yakin?')">Pay Later</button>
                                    </form>
                                    <button type="button" class="btn btn-primary" value="purchase" id="hide">Pay
                                        Now</button>
                                </div>
                            </div>
                            <div class="purchase modal-content" style="display: none;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderModalLabel">Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post" action="/dashboard/transaksi" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        Silahkan Mengirimkan bukti Transfer
                                        <input type="hidden" name="product_id" id="product_id"
                                            value="{{ $k->product->id }}">
                                        <input type="hidden" name="jumlah" id="jumlah" value="{{ $k->jumlah }}">
                                        <input type="hidden" name="total" id="total"
                                            value="{{ $k->jumlah * $k->product->harga }}">
                                        <input type="hidden" name="keranjang_id" id="keranjang_id"
                                            value="{{ $k->id }}">
                                        <div class="mb-3">
                                            <img class="img-preview img-fluid my-3 col-sm-5">
                                            <input class="form-control" type="file" id="bukti" name="bukti"
                                                onchange="previewImage()">
                                            @error('bukti')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="return confirm('Apakah anda yakin?')">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        {{-- <input type="checkbox" name="" id=""> --}}
                    </div>
                    <div class="col">
                        <div style="max-height: 500px; overflow:hidden" class="my-2">
                            <img src="{{ asset('storage/' . $k->product->file_pendukung) }}" class="card-img-top"
                                alt="{{ $k->product->nama }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <p><b>Nama : </b>{{ $k->product->nama }}</p>
                        <p><b>Kategori : </b>{{ $k->product->category->nama_category }}</p>
                        <p><b>Harga : </b>Rp.{{ $k->product->harga }}</p>

                    </div>
                    <div class="col-auto">
                        <p><b>Jumlah : </b>{{ $k->jumlah }} Buah</p>
                    </div>
                    <div class="col-auto">
                        <p><b>Total : </b>{{ $k->jumlah * $k->product->harga }}</p>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary my-2 btn-sm" data-bs-toggle="modal"
                            data-bs-target="#orderModal{{ $k->id }}">
                            <i class="bi bi-bag-plus me-1"></i>
                            Purchase
                        </button>

                        <form action="/keranjang/{{ $k->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf

                            <button class="btn btn-danger my-2 btn-sm" onclick="return confirm('Apakah anda yakin?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{$keranjang->links()}}
            </ul>
        </nav>
    </div>

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
                <a class="btn btn-primary" href="/transaksiUser" role="button">Go To Transaction</a>
                {{-- <button href="/transaksiUser" type="button" class="btn btn-primary">Go To Transacton</button> --}}
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                {{-- <a class="btn btn-primary" href="/transaksiUser" role="button">Go To Transaction</a> --}}
                {{-- <button href="/transaksiUser" type="button" class="btn btn-primary">Go To Transacton</button> --}}
            </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#hide").click(function() {
                $(".purchase").show();
                $(".hide").hide();
            });
        });
    </script>
@endsection
