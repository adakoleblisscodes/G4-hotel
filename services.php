<?php
include "header/nav.php";
include "footer/foot.php";

require "config/db-connet.php";    
// Fetch all services
$sql = "SELECT * FROM services";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
          <img src="uploads/<?= htmlspecialchars($service['featured_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($service['name']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($service['name']) ?></h5>
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
