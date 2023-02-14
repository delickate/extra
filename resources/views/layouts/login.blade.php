<!DOCTYPE html>
<html>
<head>
    @include('partials.login-head')
</head>

<body>
    <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 left-bg">
              <div class="about_us">
                <span class="about_heading">About us.</span> </span>
                <p>IntelliTut is an Intelligent Tutoring System that provides customized learning to students using AI. The core of IntelliTut is Beacon, an AI engine.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 pl-0 pr-0">
                <div class="form-box" id="login-box">
                    @yield('content')
                </div>  
            </div>
        </div>
     </div>   

  
  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>
</html>