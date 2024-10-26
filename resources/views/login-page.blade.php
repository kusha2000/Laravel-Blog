<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login</title>

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <style>
    body {
      background-image: url("{{ asset('assets/img/register.jpg') }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .form-container {
      width: 40vw; 
      padding: 2rem;
      border-radius: 8px;
      margin-right: 3rem;
      height: 100vh;
      display: flex;
      align-items: center;
    }
  </style>

</head>

<body>
  <div class="form-container">
    <main>
      <section class="section register d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card-body">
                <div class="pt-4 pb-2">
                <h5 class="card-title text-center text-white pb-3" style="font-weight: 800; font-size: 5rem;">Login</h5>

                </div>
                @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                  <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <form class="row g-3" action="{{ route('LoginUser') }}" method="POST">
                  @csrf
                  <div class="col-12">
                  <label for="yourUsername" class="form-label" style="color: 	#E2DFD2;">Email</label>
                    <div class="input-group has-validation">
                      <input type="text" name="email" class="form-control " value="{{ old('email') }}">
                    </div>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label" style="color: 	#E2DFD2;">Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0" style="color:#E2DFD2;">Forgot password? <a href="/forgot/password">Recover here!</a></p>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0" style="color:#E2DFD2;">Don't have an account? <a href="/registration/form">Create an account</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
