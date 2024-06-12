<style>
  .bg-dark-we {
    background-image: url('{{ asset("image/bg123.jpg") }}');
    background-size: cover;
    background-position: center;
    position: relative;  }
  .bg-dark-wrr {
    background-image: url('{{ asset("image/bg123.jpg") }}');
    background-size: cover;
    background-position: center;
    position: relative;  }
    .opacity-div {
      background-color: rgba(8, 7, 7, 0.589); /* Adjust the alpha value (0.5 for 50% opacity) as needed */
      border-radius: 10px; 
      padding: 20px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-dark-wrr " >
  <div class="container ">
    <!-- Outer Row -->
    <div class="row justify-content-center ">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-4 shadow-lg my-5  " style="top:50px">
          <div class="card-body p-0 opacity-div ">
            <!-- Nested Row within Card Body -->
            <div class="row p-2 text-dark bg-opacity-2 ">
              <div class="col-lg-6 d-none d-lg-block ">
                <img src="{{ asset('image/lo.png') }}" alt="" width="90%" height="363px">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-light mb-4">Content de te revoir!</h1>
                  </div>
                  <form action="{{ route('login.action') }}" method="POST" class="user">
                    @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input name="remember" type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label text-light" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block btn-user">se connecter
                    </button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>