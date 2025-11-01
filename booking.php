<?php
session_start();
include "footer/nav.php";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G4 HOTEL</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GA Hotel - Book a Room</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #myA{
        text-shadow: 3px 3px 5px gray;
    }
  </style>
</head>
<body>
   
 <!-- Booking Form Section -->
   <div class="container">
     <div class="text-center mb-5">
        
        <section class="py-5" style="
          background-image: url('assets/images/RECEPTIONIST (2).jpg');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;">
       </section>
       <h2 class="fw-bold" id="myA">Book Your Stay</h2>
       <p class="text-muted">Fill in your details to reserve your   room</p>
     </div>
        

     <div class="row justify-content-center">
      <div class="col-md-8">
        <form action="process_booking.php" method="POST" class="p-4  bg-white rounded shadow-sm">

           <!-- Name -->
           <div class="mb-3">
             <label for="name" class="form-label">Full Name</label>
             <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
           </div>

           <!-- Email -->
           <div class="mb-3">
             <label for="email" class="form-label">Email</label>
             <input type="email" name="email" id="email" class="form-control" placeholder="example@mail.com" required>
            </div>

            <!-- Phone -->
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" name="phone" id="phone" class="form-control" placeholder="+2347012345678" required>
           </div>

           <!-- Room Type -->
           <div class="mb-3">
             <label for="room_type" class="form-label">Select Room Type</label>
             <select name="room_type" id="room_type" class="form-select" required>
               <option value="">-- Choose Room --</option>
               <option value="Classic">Classic</option>
               <option value="Standard">Standard</option>
               <option value="Premium">Premium</option>
             </select>
           </div>

           <!-- Check-in / Check-out -->
            <div class="row mb-3">
              <div class="col-md-6">
               <label for="checkin" class="form-label">Check-in Date</label>
                <input type="date" name="checkin" id="checkin" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="checkout" class="form-label">Check-out Date</label>
              <input type="date" name="checkout" id="checkout" class="form-control" required>
            </div>
          </div>

          <!-- Guests -->
          <div class="mb-3">
            <label for="guests" class="form-label">Number of Guests</label>
            <input type="number" name="guests" id="guests" class="form-control" min="1" max="10" value="1" required>
          </div>

          <!-- Additional Services -->
          <div class="mb-3">
            <label class="form-label">Additional Services</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="services[]" value="Breakfast" id="service1">
              <label class="form-check-label" for="service1">Breakfast</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="services[]" value="Airport Pickup" id="service2">
              <label class="form-check-label" for="service2">Airport Pickup</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="services[]" value="Spa" id="service3">
              <label class="form-check-label" for="service3">Spa</label>
            </div>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>

        </form>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>