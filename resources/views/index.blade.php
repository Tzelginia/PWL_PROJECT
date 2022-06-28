   @extends('layout.main')
   @section('content')
   <!-- Page Content -->
   <!-- Banner Starts Here -->
   <div class="banner">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="caption">
                       <h2>Selamat Datang Di Toko Pixie Furniture</h2>
                       <div class="line-dec"></div>
                       <p>Pixie Furniture menyediakan berbagai macam bentuk barang
                           <br><br>Silahkan kunjungi social media <a rel="nofollow" href="https://www.facebook.com/tooplate/">Pixie</a> untuk mendapatkan info terbaru.
                       </p>
                       @auth
                            <div class="main-button">
                                <a href="/product">Order Now!</a>
                            </div>
                        @else
                            <div class="main-button">
                                <a href="/login">Order Now!</a>
                            </div>    
                        @endauth
                              
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Banner Ends Here -->

   <!-- Featured Starts Here -->
   <!-- <div class="featured-items">
       <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <div class="section-heading">
                       <div class="line-dec"></div>
                       <h1>Featured Items</h1>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="owl-carousel owl-theme">
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-01.jpg" alt="Item 1">
                               <h4>Proin vel ligula</h4>
                               <h6>$15.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-02.jpg" alt="Item 2">
                               <h4>Erat odio rhoncus</h4>
                               <h6>$25.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-03.jpg" alt="Item 3">
                               <h4>Integer vel turpis</h4>
                               <h6>$35.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-04.jpg" alt="Item 4">
                               <h4>Sed purus quam</h4>
                               <h6>$45.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-05.jpg" alt="Item 5">
                               <h4>Morbi aliquet</h4>
                               <h6>$55.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-06.jpg" alt="Item 6">
                               <h4>Urna ac diam</h4>
                               <h6>$65.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-04.jpg" alt="Item 7">
                               <h4>Proin eget imperdiet</h4>
                               <h6>$75.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-05.jpg" alt="Item 8">
                               <h4>Nullam risus nisl</h4>
                               <h6>$85.00</h6>
                           </div>
                       </a>
                       <a href="single-product.html">
                           <div class="featured-item">
                               <img src="assets/images/item-06.jpg" alt="Item 9">
                               <h4>Cras tempus</h4>
                               <h6>$95.00</h6>
                           </div>
                       </a>
                   </div>
               </div>
           </div>
       </div>
   </div> -->
   <!-- Featred Ends Here -->
   @endsection