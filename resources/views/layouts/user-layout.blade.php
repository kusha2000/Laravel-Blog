<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BlogX</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/user/home" class="logo d-flex align-items-center">

        <span class="d-none d-lg-block text-white">BlogX &nbsp;</span>
        <i class="bi bi-pencil fs-4 text-white"></i>
      </a>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form id="searchForm" class="search-form d-flex align-items-center" method="GET" action="/search">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword" id="searchInput">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>



    </div>


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <a href="/create/post" wire:navigate class="btn btn-outline-danger mx-2 text-white" style="border:1px solid white;">create</a>

        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell text-white"></i>
            <span class="badge bg-primary badge-number" id="notificationCount">0</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have new notifications
            </li>

            <div class="dropdown">
              <ul class="dropdown-menu notifications" aria-labelledby="notificationDropdown">
                <!-- Notifications will be appended here -->
              </ul>
            </div>

          </ul><!-- End Notification Dropdown Items -->
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img class="rounded-circle" width="30px" height="30px" src="{{ asset('storage/images/'.$user_image) }}" alt="profile image">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-white">{{$logged_user->name}}</span>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{$logged_user->name}}</h6>
              <span>User</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/user/home" wire:navigate>
                <i class="bi bi-grid"></i>
                <span>Home page</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/my/posts" wire:navigate>
                <i class="bi bi-archive-fill"></i>
                <span>My posts</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/profile" wire:navigate>
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <main id="main" class="main" style="padding-bottom: 60px;">
    @yield('space-work')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Designed by <strong><span>Kushan Andarawewa</span></strong>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  @livewireScripts
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function() {
  // Fetch notifications on page load
  $.ajax({
    url: '/notifications',
    method: 'GET',
    success: function(data) {
      let unreadCount = 0;

      // Clear existing notifications
      $('.dropdown-menu.notifications').empty();

      // Check if there are notifications
      if (data.length === 0) {
        $('.dropdown-menu.notifications').append(`
          <li class="dropdown-header">
            You have no new notifications
          </li>
        `);
      } else {
        $('.dropdown-menu.notifications').append(`
          <li class="dropdown-header">
            You have new notifications
          </li>
        `);

        $.each(data, function(index, notification) {
          let actionMessage = notification.message; // Use the message directly

          // Append the notification to the dropdown
          $('.dropdown-menu.notifications').append(`
            <li class="notification-item" data-id="${notification.id}">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>${actionMessage}</h4>
                <p>${new Date(notification.created_at).toLocaleTimeString()}</p>
                <button class="btn btn-danger btn-sm remove-notification" data-id="${notification.id}">Remove</button>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
          `);
          unreadCount++; // Count notifications
        });
      }

      // Update the notification count
      $('#notificationCount').text(unreadCount);
    }
  });

  // Handle notification removal
  $(document).on('click', '.remove-notification', function() {
    const notificationId = $(this).data('id');

    // Mark notification as read in the database
    $.ajax({
      url: `/notifications/${notificationId}/read`,
      method: 'POST',
      success: function(response) {
        if (response.success) {
          // Remove the notification from the UI
          $(this).closest('li.notification-item').next('li').remove(); // Remove the separator
          $(this).closest('li.notification-item').remove(); // Remove the notification item

          // Update the notification count
          let currentCount = parseInt($('#notificationCount').text());
          $('#notificationCount').text(currentCount - 1);

          // Update dropdown header if no notifications left
          if (currentCount - 1 === 0) {
            $('.dropdown-menu.notifications').empty().append(`
              <li class="dropdown-header">
                You have no new notifications
              </li>
            `);
          }
        }
      }.bind(this), // Bind 'this' to retain context in success callback
      error: function(xhr) {
        console.error('Error marking notification as read:', xhr);
      }
    });
  });
});

  </script>



</body>

</html>