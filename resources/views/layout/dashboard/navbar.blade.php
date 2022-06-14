<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="/"><img src="{{asset('dashboard/images/dashboard/header-logo.png')}}" alt="Pixie Furniture" /></a>
        <a class="navbar-brand brand-logo-mini" href="/"><img src="{{asset('dashboard/images/dashboard/header-logo.png')}}" alt="Pixie Furniture" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>

        </button>

        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text text-primary">Hello, <span class="text-black fw-bold ">{{ auth()->user()->username }}</span></h1>

                </li>
            </ul>
        </div>
        <!-- <div class="search-field d-none d-xl-block">
            <form class="d-flex align-items-center h-100" action="">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" name="search" class="form-control bg-transparent border-0" placeholder="Search ">
                </div>
            </form>
        </div> -->

        <ul class="navbar-nav navbar-nav-right">
            <div class="nav-item text-nowrap">
                <form action="/logout" action="get">
                    @csrf
                    <button type="submit" class="nav-link px-3 bg-white border-0"><i class="bi bi-box-arrow-left"></i> Logout</button>
                </form>
            </div>
        </ul>
    </div>
</nav>