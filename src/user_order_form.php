<?php
session_start();
require_once '../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/index.php");
    exit();
}

$db = new Database();
$conn = $db->connect();

$products = $conn->query("SELECT * FROM Product WHERE status = 'available'")->fetchAll(PDO::FETCH_ASSOC);
$users = $_SESSION['role'] == 1 ? $conn->query("SELECT * FROM User WHERE role = 0")->fetchAll(PDO::FETCH_ASSOC) : [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['role'] == 1 ? $_POST['user_id'] : $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0) {
        $stmt = $conn->prepare("INSERT INTO Orders (order_date, status, f_user_id) VALUES (NOW(), 'Processing', :user_id)");
        $stmt->execute(['user_id' => $user_id]);
        $order_id = $conn->lastInsertId();

        $stmt = $conn->prepare("INSERT INTO Order_product (f_order_id, f_product_id, quntity) VALUES (:order_id, :product_id, :quantity)");
        $stmt->execute(['order_id' => $order_id, 'product_id' => $product_id, 'quantity' => $quantity]);
    }
    header("Location: " . ($_SESSION['role'] == 1 ? "admin_orders.php" : "user_orders.php"));
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Place Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'templates/' . ($_SESSION['role'] == 1 ? 'navbar_admin.php' : 'navbar_user.php'); ?>
    <div class="container">
        <h2>Place an Order</h2>
        <form method="POST">
            <?php if ($_SESSION['role'] == 1): ?>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Select User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">Choose a user...</option>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['user_id']; ?>"><?php echo $user['user_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="product_id" class="form-label">Select Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">Choose a product...</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['product_id']; ?>">
                            <?php echo $product['product_name'] . " - $" . $product['price']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="0" value="1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
    <?php include 'templates/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>