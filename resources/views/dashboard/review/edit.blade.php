@extends('layout.dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mx-5 mt-4 border-bottom">
    <h1 class="h2">Edit Data Review Pelanggan</h1>
</div>

<div class="col-lg-8 mx-5 mt-4">
    <form method="post" action="/review/{{ $review->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject' , $review->subject) }}">
            @error('subject')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Review Pelanggan</label>
            <!-- <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" value="{{ old('isi', $review->isi) }}"> -->
            <textarea name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror" id="isi">{{ old('isi', $review->isi) }}</textarea>
            @error('isi')
            <div class=" invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection