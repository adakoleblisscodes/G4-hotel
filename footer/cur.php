
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Professional Auto Carousel</title>

  <!-- Bootstrap 5 CSS -->
  
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css"> 

  <style>
    /* Carousel full height for hero look */
    .carousel-item {
      height: 100vh;
      min-height: 500px;
      background-position: center;
      background-size: cover;
      position: relative;
    }

    /* Dark overlay on images */
    .carousel-item::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    /* Caption styling */
    .carousel-caption {
      z-index: 2;
      bottom: 30%;
    }
    .carousel-caption h1 {
      font-size: 3rem;
      font-weight: 700;
      letter-spacing: 1px;
      color: #fff;
    }
    .carousel-caption p {
      font-size: 1.1rem;
      color: #f1f1f1;
      margin-top: 10px;
    }
    .carousel-caption .btn {
      margin-top: 20px;
      padding: 10px 28px;
      border-radius: 30px;
      font-weight: 500;
    }

    /* Control icons */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: brightness(0) invert(1);
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
      .carousel-caption h1 {
        font-size: 2rem;
      }
      .carousel-caption p {
        font-size: 1rem;
      }
    }
    #myH2{
        text-shadow: 2px 2px 4px gray;
    }
    #myR{
        text-shadow: 2px 2px 4px gray;
    }
  </style>
</head>
<body>

<!-- Carousel -->
<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

  <div class="carousel-inner">

    <div class="carousel-item active" style="background-image: url('assets/images/G4 HOTELS (2).jpg');">
      <div class="carousel-caption text-start">
        <h1>Welcome to G4 Hotel</h1>
        <p>Where luxury meets comfort in the heart of the city.</p>
        <a href="booking.php" class="btn btn-primary">Book Now</a>
      </div>
    </div>

    <div class="carousel-item" style="background-image: url('assets/images/RESTUARANT/FOOD/fod.jpg');">
      <div class="carousel-caption">
        <h1>Experience Serenity</h1>
        <p>Enjoy our spa, fine dining, and breathtaking views.</p>
        <a href="service.php" class="btn btn-outline-light">Explore Rooms</a>
      </div>
    </div>

    <div class="carousel-item" style="background-image: url('assets/images/BAR/bar.jpg');">
      <div class="carousel-caption text-end">
        <h1>Unforgettable Moments</h1>
        <p>Perfect ambiance for vacations and events.</p>
        <a href="contact.php" class="btn btn-primary">Contact Us</a>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
  </div>

</div>
<!-- Services Section -->
<section class="py-5 bg-light" id="services">
  <div class="container">
    <!-- Section Title -->
    <div class="text-center mb-5">
      <h2 class="fw-bold" id="myH2">Welcome to GA Hotel</h2>
      <p class="text-muted">Experience comfort, luxury, and unforgettable moments</p>
    </div>

    <!-- Rooms Section -->
<section class="py-5" id="rooms">
  <div class="container">
    <!-- Section Title -->
    <div class="text-center mb-5">
      <h2 class="fw-bold" id="myR">Our Rooms</h2>
      <p class="text-muted">Choose the perfect room for your stay</p>
    </div>

    <!-- Rooms Grid -->
    <div class="row g-4">
      
      <!-- Premium Room -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/ROOMS/PREMIUM/INTERIOR/pre.jpg" class="card-img-top" alt="Premium Room">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Premium Room</h5>
            <p class="card-text">Spacious room with king-size bed, ensuite bathroom, free Wi-Fi, and premium amenities.</p>
            <a href="booking.php" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Standard Room -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/ROOMS/STANDARD/INTERIOR/stand.jpg" class="card-img-top" alt="Standard Room">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Standard Room</h5>
            <p class="card-text">Comfortable room with queen-size bed, ensuite bathroom, and essential amenities.</p>
            <a href="booking.php" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Classic Room -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/ROOMS/CLASSIC/INTERIOR/class.jpg" class="card-img-top" alt="Classic Room">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Classic Room</h5>
            <p class="card-text">Cozy room with comfortable bed, basic amenities, and a pleasant environment.</p>
            <a href="booking.php" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
 <section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      
      <!-- Conference Hall -->
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/CONFERENCE/coni.jpg" class="card-img-top" alt="Conference Hall">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Conference Hall</h5>
            <p class="card-text">Fully equipped conference and meeting halls for business events.</p>
          </div>
        </div>
      </div>

      <!-- Restaurant -->
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/RESTUARANT/ff.jpg" class="card-img-top" alt="Restaurant">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Restaurant & Dining</h5>
            <p class="card-text">Enjoy delicious meals and beverages in a relaxing atmosphere.</p>
          </div>
        </div>
      </div>

      <!-- Gym Facilities -->
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/GYM/gymi.jpg" class="card-img-top" alt="Gym">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Gym & Fitness</h5>
            <p class="card-text">State-of-the-art fitness center to keep you active during your stay.</p>
          </div>
        </div>
      </div>

      <!-- Swimming Pool -->
      <div class="col-md-6 col-lg-3">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/SWIMMING/swin.jpg" class="card-img-top" alt="Swimming Pool">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Swimming Pool</h5>
            <p class="card-text">Relax and unwind in our clean and spacious pool area.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

      <!-- Spa & Wellness -->
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm border-0">
          <img src="assets/images/SPA/spa.jpg" class="card-img-top" alt="Spa">
          <div class="card-body text-center">
            <h5 class="card-title fw-bold">Spa & Wellness</h5>
            <p class="card-text">Indulge in our spa services for total relaxation and rejuvenation.</p>
          </div>
        </div>
      </div>
   </div>  
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
