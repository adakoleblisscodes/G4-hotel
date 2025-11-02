<?php


include "header/nav.php"; // use existing nav in the project
include "footer/foot.php"; // include footer for consistency



  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Background Image: use project assets and make body a positioned container so the absolute overlay covers it */
    body {
      position: relative;
      min-height: 100vh;
      padding: 2rem 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('assets/images/RECEPTIONIST (2).jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    /* Overlay for soft dark layer - increased opacity to reduce brightness of background image */
    .overlay {
      background: linear-gradient(rgba(0,0,0,0.66), rgba(0,0,0,0.66));
      position: absolute;
      inset: 0;
      z-index: 1;
      backdrop-filter: none;
    }

    /* Form container: larger, softer, and more readable */
    .contact-container {
      position: relative;
      z-index: 2;
      background: rgba(255, 255, 255, 0.94);
      border-radius: 16px;
      box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35);
      padding: 48px;
      max-width: 820px; /* increased width */
      width: 100%;
      border: 1px solid rgba(255,255,255,0.6);
      backdrop-filter: blur(6px); /* subtle glass effect */
    }

    /* Slight accent bar for personality */
    .contact-container::before{
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      height: 6px;
      width: 60px;
      background: linear-gradient(90deg, #0069d9, #0056b3);
      border-top-left-radius: 16px;
      z-index: 3;
    }

    h2 {
      font-weight: 700;
      color: #1f2937; /* darker slate */
      font-size: 1.75rem;
    }

    label {
      font-weight: 600;
      color: #374151;
    }

    .btn-primary {
      background: linear-gradient(180deg,#0b63c6,#0056b3);
      border: none;
      border-radius: 12px;
      padding: 12px 22px;
      font-weight: 700;
      box-shadow: 0 8px 20px rgba(3,102,214,0.25);
      transition: transform .12s ease, box-shadow .12s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 30px rgba(3,102,214,0.28);
    }

    .alert {
      border-radius: 10px;
    }

    /* Make form inputs a bit larger and more comfortable */
    .form-control, .form-select, textarea.form-control{
      padding: 0.85rem 0.9rem;
      border-radius: 10px;
      border: 1px solid rgba(15,23,42,0.08);
      background-clip: padding-box;
    }

    @media (max-width: 767px){
      .contact-container{ padding: 28px; margin: 1rem; }
      h2{ font-size: 1.5rem; }
    }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <div class="contact-container">
    <h2 class="text-center mb-4">Contact Us</h2>
    <p class="text-center text-muted mb-4">We’d love to hear from you! Please fill in the form below.</p>

    

    <form method="POST" action="">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="+234 801 234 5678">
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea name="message" id="message" rows="4" class="form-control" placeholder="Write your message here..."></textarea>
      </div>

      <button type="submit" name="send_message" class="btn btn-primary w-100 mt-3">Send Message</button>
    </form>

    <div class="text-center mt-4">
      <h6>📍 Address: No. 10 Otukpo Road, Makurdi, Benue State</h6>
      <h6>📞 Phone: +234 80 1234 5678</h6>
      <h6>📧 Email: support@yourhotel.com</h6>
    </div>
  </div>
</body>
</html>
