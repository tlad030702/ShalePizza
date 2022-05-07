<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="favicon.ico"/>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
        crossorigin="anonymous">
  <style>

    body {
      margin: 0;
      font-size: .9rem;
      font-weight: 400;
      line-height: 1.6;
      color: #212529;
      text-align: left;
      background: #f5f5f5;
      background-image: url('https://thumbs.dreamstime.com/b/d-illustration-savoury-pizza-rich-toppings-engraved-style-chalk-doodle-background-copy-space-slogan-savoury-pizza-ads-128297250.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    .navbar-laravel {
      box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
    }

    .navbar-brand, .nav-link, .my-form, .login-form {
        font-family: 'Nunito', sans-serif;
    }

    .my-form {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .my-form .row {
      margin-left: 0;
      margin-right: 0;
    }

    .login-form {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
    }

    .login-form .row {
      margin-left: 0;
      margin-right: 0;
    }
    .card{
        background: #f5f5f5;
    }
  </style>

  <title>Login Shale Pizza</title>
</head>
<body>

<nav class="navbar navbar-dark bg-dark navbar-laravel">
  <div class="container">
    <a class="navbar-brand" href="#">Shale Pizza</a>
  </div>
</nav>

<main class="login-form">
  <div class="cotainer">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg">
          <div class="card-header">Login</div>
          <div class="card-body">
            
            <form action="{{route('auth.signin')}}" method="post">
              @csrf
              @include('sessionmessage')
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input type="email" id="email" class="form-control" name="email">
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                  <input type="password" id="password" class="form-control" name="password">
                  @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember"> Remember Me
                    </label>
                  </div>
                </div>
              </div>

              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Sign In
                </button>
                <a href="#" class="btn btn-link">
                  Forgot Your Password?
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

</main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
</body>
</html>
