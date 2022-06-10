<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Binary Pathsala || @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('user') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('user') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('user') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('user') }}/assets/css/style.css" rel="stylesheet">

  @yield('css')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.user.partial.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <!-- End Hero -->

  <main id="main">
    @yield('user_content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.user.partial.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('user') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('user') }}/assets/js/main.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" charset="utf-8"></script>





@if(Session::has('insert'))
  <script type="text/javascript">
    swal("Inserted Data","Added Sucessfully...","success")
  </script>
@endif


@if(Session::has('update'))
  <script type="text/javascript">
    swal("Updated Data","Update Sucessfully...","success")
  </script>
@endif

@if(Session::has('delete'))
  <script type="text/javascript">
    swal("Delete Successfully","Delete Secessfully","success")
  </script>
@endif

@if(Session::has('inactive'))
  <script type="text/javascript">
    swal("Incomplate","Incomplate Unsuccessfully","success")
  </script>
@endif

@if(Session::has('Active'))
  <script type="text/javascript">
    swal("Complate","Status Update Successfully","success")
  </script>
@endif

@if(Session::has('reset_password'))
  <script type="text/javascript">
    swal("Enter your valid Password","Dont matched the password plz inter your valid password...","success")
  </script>
@endif


  @yield('js')



</body>

</html>
