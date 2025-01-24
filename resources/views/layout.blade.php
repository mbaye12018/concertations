<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Concertation nationale</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include other head elements and styles here -->
    <style>
      /* Add your custom styles here */
    </style>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />
  </head>

  <body>
    <div class="wrapper">
      <!-- Sidebar code here -->
      <div class="main-panel">
        <div class="main-header">
          <!-- Navbar and logo code here -->
        </div>
        <div class="container">
          <!-- Content Section -->
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Footer and Scripts -->
    <footer class="footer">
      <div class="container-fluid d-flex justify-content-center">
        <div class="copyright text-center">
            © 2024 Copyright MFPRSP
        </div>
      </div>
    </footer>

    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <!-- Add other script files here -->
  </body>
</html>
