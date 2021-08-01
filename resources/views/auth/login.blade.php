<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('admin/img/logo/logo.png')}}" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admin/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9 pt-5">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="{{asset('logo.png')}}" alt="" width="70px">
                    <br>
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="{{route('auth.authenticate')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="username" class="form-control" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword"
                        placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('admin/js/ruang-admin.min.js')}}"></script>
</body>

</html>