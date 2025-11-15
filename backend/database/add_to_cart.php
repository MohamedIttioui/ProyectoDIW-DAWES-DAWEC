<?php
session_start();
// include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'customer') {
  header("Location: /student013/shop/backend/database/db_login.php");
  exit;
}
include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php';

$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['product_id'] ?? null;

if ($product_id && $customer_id) {
  $checkSql = "SELECT quantity FROM 013_shopping_cart WHERE customer_id = $customer_id AND product_id = $product_id";
  $checkResult = $conn->query($checkSql);

  if ($checkResult && $checkResult->num_rows > 0) {
    $updateSql = "UPDATE 013_shopping_cart SET quantity = quantity + 1 WHERE customer_id = $customer_id AND product_id = $product_id";
    $conn->query($updateSql);
  } else {
    $insertSql = "INSERT INTO 013_shopping_cart (customer_id, product_id, quantity) VALUES ($customer_id, $product_id, 1)";
    $conn->query($insertSql);
  }

  header("Location: /student013/shop/backend/views/shopping_cart.php");
  exit;
} else {
  echo "Error: producto o usuario no válido.";
}

$conn->close();
?>