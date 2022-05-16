<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rawdati</title>
  <!-- plugins:css -->
  <link rel="shortcut icon" href="{{asset('images/r-logo.png')}}" />
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
<!--   <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
 -->  <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/r2.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="{{ url(app()->getLocale() .'/'.'index'.'?name=admin&password=123456')}}" method="GET">
                <div class="form-group">
                  <input type="text" name="name" class="form-control " class="input" id="exampleInputEmail1" placeholder="Username" >
<!--                   <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
 -->                </div>
                <div class="form-group">
                   <input type="password" class="form-control " name="password" class="input" id="exampleInputPassword1" placeholder="Password">
<!--                   <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
 -->                </div>
                <div class="mt-3">
                  <button type = "submit" class="btn btn-block btn-primary btn-lg font-weight-medium "> SIGN IN </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


	
</body>
</html>


<!-- <img class="wave" src="{{asset('images/wave.png')}}">
  <div class="container">
    <div class="img">
      <img src="{{asset('images/bg.svg')}}">
    </div>
    <div class="login-content">
      <form action="{{ url(app()->getLocale() .'/'.'index'.'?name=admin&password=123456')}}" method="GET">
        @csrf
        <img src="{{asset('images/avatar.svg')}}">
        <h2 class="title">Welcome</h2>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Username</h5>
                    <input type="text" name="name" class="input">
                 </div>
              </div>
              <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Password</h5>
                    <input type="password" name="password" class="input">
                 </div>
              </div>
              <a href="#">Forgot Password?</a>
              <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script> -->