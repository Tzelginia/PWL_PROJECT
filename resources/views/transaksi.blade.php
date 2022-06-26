@extends('layout.main')
@section('content')
    <h1 class="mt-3 mb-5 text-center text-white">
        <b> My Transaction </b>
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

    <div class="container mt-3 mb-3">
        @foreach ($transaksi as $t)
            @if ($t->user_id == auth()->user()->id)
                <div class="row course align-items-center mb-3">
                    <!-- Modal -->
                    <div class="modal fade " id="orderModal{{ $t->id }}" tabindex="-1" aria-labelledby="orderModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderModalLabel">Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="post" action="/bayar" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        Silahkan Mengirimkan bukti Transfer
                                        <input type="hidden" name="id" id="id" value="{{ $t->id }}">
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
                            <img src="{{ asset('storage/' . $t->product->file_pendukung) }}" class="card-img-top"
                                alt="{{ $t->product->nama }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <p><b>Nama : </b>{{ $t->product->nama }}</p>
                        <p><b>Kategori : </b>{{ $t->product->category->nama_category }}</p>
                        <p><b>Harga : </b>Rp.{{ $t->product->harga }}</p>

                    </div>
                    <div class="col-auto">
                        <p><b>Jumlah : </b>{{ $t->jumlah }} Buah</p>
                    </div>
                    <div class="col-auto">
                        <p><b>Total : </b>{{ $t->jumlah * $t->product->harga }}</p>
                    </div>
                    <div class="col">
                        @if ($t->bukti == null)
                            <button type="button" class="btn btn-primary my-2 btn-sm" data-bs-toggle="modal"
                                data-bs-target="#orderModal{{ $t->id }}">
                                <i class="bi bi-bag-plus me-1"></i>
                                Pay Now!
                            </button>
                        @else
                            @if ($t->verify == 0)
                                <h5><span class="badge bg-warning text-secondary"><i
                                            class="bi bi-dash-circle-dotted me-2"></i>Menunggu Verifikasi...</span></h5>
                            @else
                                <h5><span class="badge bg-success"><i class="bi bi-check-circle me-2"></i>Transaksi
                                        Selesai</span>
                                    <h5>
                            @endif
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{$transaksi->links()}}
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
                {{-- <a class="btn btn-primary" href="/transaksiUser" role="button">Go To Transaction</a> --}}
                {{-- <button href="/transaksiUser" type="button" class="btn btn-primary">Go To Transacton</button> --}}
            </div>
            </div>
        </div>
    </div>

@endsection
