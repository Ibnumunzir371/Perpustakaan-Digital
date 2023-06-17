{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  @include('backend.partial.link')
</head>
<body id="page-top">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.partial.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      
      <!-- partial:partials/_sidebar.html -->
      @include('backend.partial.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" >
          
          @yield('content')
      
        <!-- content-wrapper ends -->
        </div>
          <!-- partial:partials/_footer.html -->
        @include('backend.partial.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('backend.partial.js')
  <!-- End custom js for this page-->
  @yield('script')
</body>

</html>
 --}}

 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @include('backend.partial.link')
  <style>
    .breadcrumb {
      border-color: white;
    }
  
    .breadcrumb-item {
      border-color: white;
    }
  
    .breadcrumb-item a {
      color: #000;
    }
  </style>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('backend.partial.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('backend.partial.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    {{-- <div class="content-wrapper" > --}}
          
    @yield('content')

    {{-- </div> --}}
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('backend.partial.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('backend.partial.js')

  <!-- End custom js for this page-->
  @yield('script')

</body>

</html>