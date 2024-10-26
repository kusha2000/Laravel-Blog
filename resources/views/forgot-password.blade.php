<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forgot Password</title>
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

  <style>
    body {
      background-image: url("{{ asset('assets/img/forgot.jpg') }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      /* Center horizontally */
    }

    .form-container {
      width: 100%;
      max-width: 500px;
      padding: 2rem;
      border-radius: 8px;

    }

    .custom-btn {
        background-color: #FF5733 !important; 
        border: none; 
    }

    .custom-btn:hover {
        background-color: #C7441B !important; 
        color: white; 
    }
    .custom-txt {
        color: #FF5733 !important; 
    }

    .custom-txt:hover {
        color: #C7441B !important; 
    }

  </style>

</head>

<body>

  <main>
    <div class="form-container">
      <section class="section register d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-2 fs-1 text-white" style="font-weight: 800;">Recover Your Password</h5>
                </div>
                {{-- display flash message here --}}
                @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <form class="row g-3" action="{{ route('forgot')}}" method="POST">
                  @csrf
                  <div class="col-12">
                    <label for="yourPassword" class="form-label" style="color: 	#E2DFD2;">Email</label>
                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                  </div>

                  <div class="col-12">
                    <button class="btn custom-btn  w-100">Send Email</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">
                      <a href="/login/form" class="custom-txt">| login to your account</a>
                    </p>

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