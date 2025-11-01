// === SQL (place in sql/updates.sql) ===
/*
-- users table (customers)
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  phone VARCHAR(50),
  role ENUM('customer','admin') DEFAULT 'customer',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- bookings table
CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  room_id INT NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  num_guests INT DEFAULT 1,
  status ENUM('pending','confirmed','cancelled') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);
*/


// === File: includes/db_connect.php ===
<?php
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'hotel_db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];
try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  http_response_code(500);
  echo 'Database connection failed.';
  exit;
}
?>


// === File: includes/functions.php ===
<?php
session_start();
require_once __DIR__ . '/db_connect.php';

function is_logged_in() {
  return !empty($_SESSION['user_id']);
}

function require_login() {
  if (!is_logged_in()) {
    header('Location: /login.php');
    exit;
  }
}

function flash_msg() {
  if (!empty($_SESSION['flash'])) {
    $msg = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $msg;
  }
  return '';
}

function set_flash($text) {
  $_SESSION['flash'] = $text;
}

?>


// === File: register.php ===
<?php
require 'includes/db_connect.php';
require 'includes/functions.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $password = $_POST['password'] ?? '';
  $password_confirm = $_POST['password_confirm'] ?? '';

  if (!$name) $errors[] = 'Name is required';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required';
  if (strlen($password) < 6) $errors[] = 'Password must be at least 6 characters';
  if ($password !== $password_confirm) $errors[] = 'Passwords do not match';

  // check existing email
  $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
  $stmt->execute([$email]);
  if ($stmt->fetch()) $errors[] = 'Email already registered';

  if (empty($errors)) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (name,email,password_hash,phone) VALUES (?,?,?,?)');
    $stmt->execute([$name,$email,$password_hash,$phone]);
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['user_name'] = $name;
    set_flash('Registration successful. Welcome, ' . htmlspecialchars($name));
    header('Location: /dashboard.php');
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5" style="max-width:540px;">
  <h2 class="mb-4">Create an account</h2>
  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger"><ul><?php foreach ($errors as $e) echo '<li>'.htmlspecialchars($e).'</li>'; ?></ul></div>
  <?php endif; ?>
  <form method="post" novalidate>
    <div class="mb-3"><label class="form-label">Full name</label><input class="form-control" name="name" required value="<?= htmlspecialchars($name ?? '') ?>"></div>
    <div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($email ?? '') ?>"></div>
    <div class="mb-3"><label class="form-label">Phone</label><input class="form-control" name="phone" value="<?= htmlspecialchars($phone ?? '') ?>"></div>
    <div class="mb-3"><label class="form-label">Password</label><input type="password" class="form-control" name="password" required></div>
    <div class="mb-3"><label class="form-label">Confirm Password</label><input type="password" class="form-control" name="password_confirm" required></div>
    <button class="btn btn-primary w-100">Register</button>
    <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>
</body>
</html>


// === File: login.php ===
<?php
require 'includes/db_connect.php';
require 'includes/functions.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required';
  if (!$password) $errors[] = 'Password required';

  if (empty($errors)) {
    $stmt = $pdo->prepare('SELECT id,name,password_hash,role FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      $_SESSION['user_role'] = $user['role'];
      set_flash('Welcome back, ' . htmlspecialchars($user['name']));
      header('Location: /dashboard.php');
      exit;
    } else {
      $errors[] = 'Invalid credentials';
    }
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5" style="max-width:420px;">
  <h2 class="mb-4">Login</h2>
  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger"><?php foreach ($errors as $e) echo '<div>'.htmlspecialchars($e).'</div>'; ?></div>
  <?php endif; ?>
  <form method="post">
    <div class="mb-3"><input type="email" class="form-control" name="email" placeholder="Email" required></div>
    <div class="mb-3"><input type="password" class="form-control" name="password" placeholder="Password" required></div>
    <button class="btn btn-primary w-100">Login</button>
    <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register</a></p>
  </form>
</div>
</body>
</html>


// === File: logout.php ===
<?php
require 'includes/functions.php';
session_unset();
session_destroy();
setcookie(session_name(), '', time()-3600);
header('Location: /');
exit;
?>


// === File: book_room.php ===
<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
require_login(); // require user to be logged in

$room_id = intval($_GET['id'] ?? 0);
$stmt = $pdo->prepare('SELECT * FROM rooms WHERE id = ?');
$stmt->execute([$room_id]);
$room = $stmt->fetch();
if (!$room) { set_flash('Room not found'); header('Location: /rooms.php'); exit; }

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $check_in = $_POST['check_in'] ?? '';
  $check_out = $_POST['check_out'] ?? '';
  $num_guests = max(1,intval($_POST['num_guests'] ?? 1));

  // basic validation
  if (!$check_in || !$check_out) $errors[] = 'Select check-in and check-out dates';
  if ($check_in >= $check_out) $errors[] = 'Check-out must be after check-in';

  // availability check: ensure no overlapping bookings
  $stmt = $pdo->prepare("SELECT COUNT(*) as cnt FROM bookings WHERE room_id = ? AND status != 'cancelled' AND NOT (check_out <= ? OR check_in >= ?)");
  $stmt->execute([$room_id, $check_in, $check_out]);
  $row = $stmt->fetch();
  if ($row && $row['cnt'] > 0) $errors[] = 'Room is not available for selected dates';

  if (empty($errors)) {
    $stmt = $pdo->prepare('INSERT INTO bookings (user_id,room_id,check_in,check_out,num_guests) VALUES (?,?,?,?,?)');
    $stmt->execute([$_SESSION['user_id'],$room_id,$check_in,$check_out,$num_guests]);
    set_flash('Booking submitted. We will contact you to confirm.');
    header('Location: /bookings.php');
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Book <?= htmlspecialchars($room['room_name']) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5" style="max-width:720px;">
  <h2>Book <?= htmlspecialchars($room['room_name']) ?></h2>
  <p>Price: ₦<?= number_format($room['price_per_night']) ?> / night</p>
  <?php if ($msg = flash_msg()): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
  <?php if (!empty($errors)): ?><div class="alert alert-danger"><?php foreach($errors as $e) echo '<div>'.htmlspecialchars($e).'</div>'; ?></div><?php endif; ?>
  <form method="post">
    <div class="mb-3">
      <label>Check-in</label>
      <input type="date" name="check_in" class="form-control" required value="<?= htmlspecialchars($_POST['check_in'] ?? '') ?>">
    </div>
    <div class="mb-3">
      <label>Check-out</label>
      <input type="date" name="check_out" class="form-control" required value="<?= htmlspecialchars($_POST['check_out'] ?? '') ?>">
    </div>
    <div class="mb-3">
      <label>Guests</label>
      <input type="number" name="num_guests" class="form-control" min="1" value="<?= htmlspecialchars($_POST['num_guests'] ?? 1) ?>">
    </div>
    <button class="btn btn-success">Confirm Booking</button>
  </form>
  <p class="mt-3"><a href="/rooms.php">Back to rooms</a></p>
</div>
</body>
</html>


// === File: bookings.php (user dashboard) ===
<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
require_login();

$stmt = $pdo->prepare('SELECT b.*, r.room_name, r.price_per_night FROM bookings b JOIN rooms r ON b.room_id = r.id WHERE b.user_id = ? ORDER BY b.created_at DESC');
$stmt->execute([$_SESSION['user_id']]);
$bookings = $stmt->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>My Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2>My Bookings</h2>
  <?php if ($msg = flash_msg()): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
  <?php if (empty($bookings)): ?><p>You have no bookings yet. <a href="/rooms.php">Book a room</a></p><?php else: ?>
  <div class="list-group">
    <?php foreach ($bookings as $b): ?>
      <div class="list-group-item">
        <div class="d-flex justify-content-between">
          <div>
            <h5><?= htmlspecialchars($b['room_name']) ?></h5>
            <div>From <strong><?= htmlspecialchars($b['check_in']) ?></strong> to <strong><?= htmlspecialchars($b['check_out']) ?></strong></div>
            <div>Guests: <?= (int)$b['num_guests'] ?> • Status: <?= htmlspecialchars($b['status']) ?></div>
          </div>
          <div class="text-end">
            <div>₦<?= number_format($b['price_per_night']) ?> / night</div>
            <div class="small text-muted">Booked: <?= htmlspecialchars($b['created_at']) ?></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</div>
</body>
</html>
