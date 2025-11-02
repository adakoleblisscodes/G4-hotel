<?php

include "header/nav.php";

require "config/db-connet.php";    
// Fetch all service
$sql = "SELECT * FROM services WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);


  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G4 HOTEL</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css`>   
</head>
<body>
    
</body>
</html>