  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
          <a class="navbar-brand" href="/">
              <img src="assets/images/header-logo.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto ">
                  <li class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                      <a class="nav-link" href="/">Home
                          <span class="sr-only">(current)</span>
                      </a>
                  </li>
                  <li class="nav-link {{ Request::is('product') ? 'active' : '' }}">
                      <a class="nav-link" href="/product">Product</a>
                  </li>
                  <li class="nav-link {{ Request::is('about') ? 'active' : '' }}">
                      <a class="nav-link" href="/about">About Us</a>
                  </li>
                  <li class="nav-link {{ Request::is('contact') ? 'active' : '' }}">
                      <a class="nav-link" href="/contact">Contact Us</a>
                  </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                  @auth
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Welcome back , {{ auth()->user()->username }}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="/admin"><i class="bi bi-clipboard-minus"></i> My Dashboard</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li>
                              <form action="/logout" action="get">
                                  @csrf
                                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                              </form>

                      </ul>
                  </li>
                  @else
                  <li>
                  <li class="nav-item">
                      <a class="nav-link " href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                  </li>
                  @endauth
              </ul>
          </div>
      </div>
  </nav>