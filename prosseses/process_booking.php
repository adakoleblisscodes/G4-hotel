<?php
session_start();
include "footer/nav.php";
if (isset($_POST['check_price'])) {
      $room_type = $_POST['room_type'];

      // define room prices
      $prices = [
        "Classic" => 25000,
        "Standard" => 40000,
        "Premium" => 70000
      ];

      if (array_key_exists($room_type, $prices)) {
        echo "<div class='alert alert-info mt-4 text-center'>
                The price for a <strong>$room_type</strong> room is 
                <strong>₦" . number_format($prices[$room_type]) . "</strong> per night.
              </div>";
      } else {
        echo "<div class='alert alert-warning mt-4 text-center'>Please select a valid room type.</div>";
      }
    }
    ?>
  </div>
</div>

</body>
</html>
<!-- ✅ How it works: -->

<!-- The user selects a room type and clicks Check Price.

The page reloads, and PHP displays the correct price using the $prices array.

Everything is done with HTML + Bootstrap + PHP only, no JavaScript.

🥈 Option 2: Instant Price Change (PHP + JS)
If you ever decide to use a tiny bit of JavaScript, then PHP can load the prices dynamically — but the change happens instantly on the browser without reload.

🧩 Bonus Tip:
If you store room details in a database, PHP can fetch the price automatically from your table:

php
Copy code
$query = "SELECT price FROM rooms WHERE room_type='$room_type'";



?> -->