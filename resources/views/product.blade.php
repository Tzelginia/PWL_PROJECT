@extends('layout.main')
@section('content')
<!-- Page Content -->
<!-- Items Starts Here -->
<div class="featured-page">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Featured Items</h1>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div id="filters" class="button-group">
                    <button class="btn btn-primary" data-filter="*">All Products</button>
                    <button class="btn btn-primary" data-filter=".new">Newest</button>
                    <button class="btn btn-primary" data-filter=".low">Low Price</button>
                    <button class="btn btn-primary" data-filter=".high">Hight Price</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="featured container no-gutter">

    <div class="row posts">
        <div id="1" class="item new col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/kursi.jpg" alt="">
                    <h4>Kursi Santai</h4>
                    <h6>Rp. 400.000</h6>
                </div>
            </a>
        </div>
        <div id="2" class="item high col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/kursi_2.jpg" alt="">
                    <h4>Kursi Kayu</h4>
                    <h6>Rp. 200.000</h6>
                </div>
            </a>
        </div>
        <div id="3" class="item low col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/kursi_3.jpg" alt="">
                    <h4>Kursi Sofa</h4>
                    <h6>Rp. 800.000</h6>
                </div>
            </a>
        </div>
        <div id="4" class="item low col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/meja.jpg" alt="">
                    <h4>Rak Meja</h4>
                    <h6>Rp. 150.000</h6>
                </div>
            </a>
        </div>
        <div id="5" class="item new high col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/meja_2.jpg" alt="">
                    <h4>Meja Kayu Jati</h4>
                    <h6>Rp. 1.000.000</h6>
                </div>
            </a>
        </div>
        <div id="6" class="item new col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/meja_3.jpg" alt="">
                    <h4>Meja Biasa</h4>
                    <h6>Rp. 100.000</h6>
                </div>
            </a>
        </div>
        <div id="7" class="item new high col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/almari.jpg" alt="">
                    <h4>Almari 2 Pintu</h4>
                    <h6>Rp. 500.000</h6>
                </div>
            </a>
        </div>
        <div id="8" class="item low new col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/almari_2.jpg" alt="">
                    <h4>Almmari Pintu Geser</h4>
                    <h6>Rp. 600.000</h6>
                </div>
            </a>
        </div>
        <div id="9" class="item new col-md-4">
            <a href="single-product.html">
                <div class="featured-item">
                    <img src="assets/images/almari_3.jpg" alt="">
                    <h4>Almari + Kaca</h4>
                    <h6>Rp. 1.500.000</h6>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="page-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li class="current-page"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Featred Page Ends Here -->
@endsection