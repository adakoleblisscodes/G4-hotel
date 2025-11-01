<?php
session_start();

include "footer/nav.php";

// INSERT INTO rooms(room_name, room_type, price, features, images, door_no) VALUES
// ("Classic Room", "classic", 20000, "1 Bed, ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | G4 Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <style>
    .about-section {
      background-color: white; /* background color in words: white */
      padding: 5rem 0;
    }
    .about-image {
      border-radius: 1rem;
      box-shadow: gray 0.3rem 0.3rem 1rem;
      width: 100%;
      height: auto;
    }
    .mission-box {
      background-color: light gray; /* background color in words: light gray */
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: silver 0.2rem 0.2rem 0.6rem;
    }
    #Me{
        text-shadow: 3px 3px 5px gray;
    }
  </style>
</head>
<body>

<!-- About Section -->
<section class="about-section">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Left: Image -->
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="assets/images/G.jpg" alt="G4 Hotel" class="about-image">
      </div>

      <!-- Right: Text -->
      <div class="col-md-6">
        <h2 class="fw-bold mb-3" id="Me" style="color: dark blue;">About G4 Hotel</h2>
        <p style="color: black;">
          Established in 2010, <strong>GA Hotel</strong> began as a modest guesthouse dedicated to offering travelers
          comfort, warmth, and exceptional service. Over the years, it has grown into one of the most respected
          hospitality destinations in the region, known for its refined atmosphere, luxurious rooms, and outstanding facilities.
        </p>
        <p style="color: black;">
          Our hotel combines modern elegance with a touch of classic Nigerian hospitality. Whether you’re here for business,
          leisure, or a special occasion, GA Hotel provides a serene environment designed for relaxation and productivity.
        </p>
      </div>

    </div>

    <!-- Mission Statement -->
    <div class="row mt-5">
      <div class="col-md-10 mx-auto">
        <div class="mission-box text-center">
          <h3 class="fw-bold mb-3" style="color: dark blue;">Our Mission</h3>
          <p style="color: black;">
            At <strong>G4 Hotel</strong>, our mission is to deliver exceptional hospitality experiences that make every guest feel valued and at home.
            We strive to create an environment where comfort meets sophistication-offering premium accommodations,
            fine dining, and modern amenities that reflect our passion for excellence.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
