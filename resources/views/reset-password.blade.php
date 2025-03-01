<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!-- Favicons -->
 <link href="{{ asset('img/favicon.png')}}" rel="icon">
 <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

 <!-- Vendor CSS Files -->
 <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
 <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
 <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
 <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
 <script src="{{ asset('js/jquery.min.js') }}"></script>
 <script src="{{ asset('js/export-excel.min.js') }}"></script>
 <script src="{{ asset('row_merger/dist/row-merge-bundle.min.js') }}"></script>
 <!-- Template Main CSS File -->
 <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Recover Your Password</h5>
                    <p class="text-center small">Create Your new Password</p>
                  </div>
                    {{-- display flash message here --}}
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                  <form class="row g-3" action="{{ route('ResetPassword')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user_data->id}}">
                    <input type="hidden" name="user_email" value="{{$user_data->email}}">
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">New Password</label>
                      <input type="password" name="password" class="form-control">
                      <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>
                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>
                      </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"> <a href="/login/form">login</a></p>
                    </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   <!-- Vendor JS Files -->
   <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
   <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
   <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
   <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
 
   <!-- Template Main JS File -->
   <script src="{{ asset('assets/js/main.js') }}"></script>
   <script src="{{ asset('js/jquery.min.js') }}"></script>

</body>

</html>