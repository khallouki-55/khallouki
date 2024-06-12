
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Espace Users</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<style>
  .opacity-div {
      background-color: rgba(6, 6, 6, 0.392); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
      border-radius: 10px; 
      padding: 20px;
    }
  .bg-image {
        background-image: url('{{ asset("image/bg123.jpg") }}');
        background-size: cover;
        background-position: center;
        position: relative;
        color: black;
        
        
    }
    .bg-im{
      background-color: rgba(0, 0, 0, 0.762);
      color: rgb(189, 179, 179)
      
    }
</style>
<body id="page-top" >
  <!-- Page Wrapper -->
  <div id="wrapper">
  
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column text dark">
  
      <!-- Main Content -->
      <div id="content" class="bg-image " >
  
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
  
        <!-- Begin Page Content -->
        <div class="container-fluid text-dark">
  
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-dark">@yield('title')</h1>
          </div>
          
          
          <div class=" text-light">
            @yield('contents')  
          </div>          
  
          <!-- Content Row -->
  
  
        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->
  
      <!-- Footer -->
      <div class="bg-im ng-tranparent" >
        @include('layouts.footer')
      </div>
      <!-- End of Footer -->
  
    </div>
    <!-- End of Content Wrapper -->
  
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>
</body>
</html>