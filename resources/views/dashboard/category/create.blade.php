@extends('layout.dashboard.main')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-registration">
        <br><br>
      <h1 class="h3 mb-3 fw-normal">TAMBAH KATEGORI</h1>
      <form action="/dashboard/category" method="POST">
        @csrf
        <div class="form-floating">
          <input type="text" name="nama_category" class="form-control @error('nama_category') is-invalid @enderror" id="nama_category" value="{{ old('nama_category') }}" required>
          <label for="nama_category">Nama Kategori</label>
          @error('nama_category')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <br> 
        <button class="w-100 btn btn-lg btn-primary" type="submit">TAMBAH DATA</button> 
      </form>
    </main>
  </div>

</div>
@endsection