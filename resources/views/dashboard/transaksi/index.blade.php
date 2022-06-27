@extends('layout.dashboard.main')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom ">
        <h1 class="h2">Data Transaksi</h1>
    </div>
  
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-10 mt-3 mx-5" role="alert">
            {{ session('success') }}
        </div>
    @endif



    <div class="table-responsive col-lg-10 mx-5 mt-4">
        <a class="btn btn-danger btn-sm mb-3" href="{{ route('cetak') }}"><i class="bi bi-printer"></i> Cetak Ke PDF</a>
        @if ($transaksi->count())
            <table class="table table-striped table-lg">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Product</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Bukti</th>
                        <th scope="col">Verify</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $t)
                        <!-- Modal -->
                        <div class="modal fade " id="orderModal{{ $t->id }}" tabindex="-1"
                            aria-labelledby="orderModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="orderModalLabel">Bukti Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $t->bukti) }}" class="card-img-top"
                                            alt="{{ $t->product->nama }}{{ $t->user->username }}">
                                    </div>
                                    <div class="modal-footer">
                                        @if ($t->verify == 0)
                                            <form action="/verifyTransaksi" method="get" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $t->id }}">
                                                <button type="submit" class="badge bg-primary border-0">Verify Now</button>
                                            </form>
                                        @else
                                            <h4><span class="badge bg-success">verified</span></h4>
                                        @endif
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Pelanggan belum melakukan pembayaran
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->user->username }}</td>
                            <td>{{ $t->product->nama }}</td>
                            <td>{{ $t->jumlah }}</td>
                            <td>{{ $t->total }}</td>
                            <td>
                                @if ($t->bukti == null)
                                    Belum bayar
                                @else
                                    <div class="wrapper">
                                        <img src="{{ asset('storage/' . $t->bukti) }}" alt=""
                                            class="rounded mx-auto d-block" width="100%" height="100%">
                                    </div>
                                @endif

                            </td>
                            <td>
                                @if ($t->bukti == null)
                                    -
                                @else
                                    @if ($t->verify == 0)
                                        <form action="/verifyTransaksi" method="get" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $t->id }}">
                                            <button type="submit" class="badge bg-warning border-0">Verify</button>
                                        </form>
                                    @else
                                        <h4><span class="badge bg-success">verified</span></h4>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if ($t->bukti == null)
                                    <a href="#orderModal" data-bs-toggle="modal" class="badge bg-info">
                                    <span class="menu-icon mdi mdi-eye"></span></a> 
                                @else
                                   <a href="#orderModal{{ $t->id }}" data-bs-toggle="modal" class="badge bg-info">
                                    <span class="menu-icon mdi mdi-eye"></span></a> 
                                @endif
                                
                                <form action="/dashboard/transaksi/{{ $t->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Apakah anda yakin?')"><span
                                            class="menu-icon mdi mdi-backspace"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-dark text-center fs-4">Belum ada transaksi</p>
        @endif
        <div class="mt-3">
            {{ $transaksi->links() }}
        </div>
    </div>

@endsection