<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
    header("Location: ../public/index.php");
    exit();
}

$db = new Database();
$conn = $db->connect();

$total_orders = $conn->query("SELECT COUNT(*) FROM Orders")->fetchColumn();
$total_users = $conn->query("SELECT COUNT(*) FROM User WHERE role = 0")->fetchColumn();
$total_products = $conn->query("SELECT COUNT(*) FROM Product")->fetchColumn();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'templates/navbar_admin.php'; ?>
    <div class="container mt-5">
        <h2>Welcome, Admin!</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text"><?php echo $total_orders; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text"><?php echo $total_users; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text"><?php echo $total_products; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>