<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ../src/" . ($_SESSION['role'] == 1 ? "admin_orders.php" : "user_orders.php"));
    exit();
} else {
    header("Location: ../src/login.php");
    exit();
}
?>