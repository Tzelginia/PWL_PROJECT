<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pixie Furniture</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('dashboard/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('dashboard/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('dashboard/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('dashboard/images/favicon.png')}}" />
    <!-- Bootstrp Icons  -->
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css')}}">

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->

        @include('layout.dashboard.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->

            @include('layout.dashboard.sidebar')
            <!-- partial -->
            <div class="main-panel">

                {{-- <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2">Dashboard </h2>
            </div>
          </div> --}}

                @yield('content')

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
                <script>
                    function previewImage() {
                        const image = document.querySelector('#file_pendukung');
                        const imgPreview = document.querySelector('.img-preview');

                        imgPreview.style.display = 'block';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(oFREvent) {
                            imgPreview.src = oFREvent.target.result;
                        }

                    }
                </script>
            </div>
            <!-- main-panel ends -->
            <!-- page-body-wrapper ends -->
        
        </div>
        <footer class="footer">
            <div class="footer-inner-wraper">
                <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best templates</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('dashboard/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dashboard/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('dashboard/vendors/jquery-circle-progress/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('dashboard/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dashboard/js/off-canvas.js')}}"></script>
    <script src="{{asset('dashboard/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('dashboard/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('dashboard/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
</body>

</html>