@extends('layout.dashboard.login')

@section('content')

<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <div class="px-5 ms-xl-4 mt-4">
                    <a class="navbar-brand" href="/">
                        <img src="assets/images/header-logo.png" alt="">
                    </a>
                </div>

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4  pt-5 pt-xl-0 mt-xl-n5">

                    <form style="width: 23rem;" action="/login" method="POST">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" class="form-control @error('username') is-invalid                  
                @enderror" name="username" />

                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid                 
                @enderror" name="password" />

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                        </div>

                        <p>Don't have an account? <a href="/register" class="link-info">Register here</a></p>

                    </form>

                </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://ofisu.co.th/wp-content/uploads/2021/01/modern-living-room-interior-with-sofa-green-plants-lamp-table-dark-wall-background-scaled.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: right;">
            </div>
        </div>
    </div>
</section>

@endsection