<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>G4 HOTEL</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">


  <style>
    /* Custom Styling */
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .nav-link {
      font-weight: 500;
      transition: color 0.3s ease;
    }
    .nav-link:hover {
      color: #0d6efd !important;
    }
    .btn-custom {
      background-color: #0d6efd;
      color: #fff;
      border-radius: 25px;
      padding: 6px 18px;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #084298;
      color: #fff;
    }
    #gg{
      text-shadow: 3px 3px 5px gray;
      font-size: 50px;
      color:  darkgoldenrod;
        

    }

  </style>
</head>
<body>

<!-- Navbar Start -->


<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
  <img src="assets/images/G.jpg" alt="GA Hotel Logo" height="50" class="d-inline-block align-text-top">
</a>  
    <a class="navbar-brand"  href="index.php" id="gg">G4 HOTEL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav me-3">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="service.php">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="rooms.php">Rooms</a></li>
            <li><a class="dropdown-item" href="booking.php">Book Now</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="contact.php">Contact</a></li>
          </ul>
        </li>
      </ul>
      <a href="help.php" class="btn btn-custom">Help</a>
    </div>
  </div>
</nav>
<!-- Navbar End -->

<!-- Bootstrap 5 JS -->
 <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (includes Popper for dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  

</script>

</body>
</html>
