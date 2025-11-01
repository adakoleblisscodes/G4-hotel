<?php
$pdo = new PDO("mysql:host=localhost;dbname=hotel_db", "root", "");
$services = $pdo->query("SELECT * FROM services")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="text-center mb-4">Our Services</h2>
  <div class="row">
    <?php foreach ($services as $service): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
          <img src="uploads/<?= htmlspecialchars($service['featured_image']) ?>" class="card-img-top" alt="Service Image">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($service['roomname']) ?></h5>
            <p class="card-text"><?= substr(htmlspecialchars($service['description']), 0, 100) ?>...</p>
            <a href="service.php?id=<?= $service['id'] ?>" class="btn btn-primary btn-sm">View Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</body>
</html>
