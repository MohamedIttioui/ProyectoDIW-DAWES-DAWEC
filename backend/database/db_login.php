<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Buscar en admins
$sqlAdmin = "SELECT email, password FROM 013_admins WHERE email = '$email'";
$resultAdmin = $conn->query($sqlAdmin);

if ($resultAdmin && $resultAdmin->num_rows > 0) {
  $admin = $resultAdmin->fetch_assoc();
  if (password_verify($password, $admin['password'])) {
    $_SESSION['user_type'] = 'admin';
    $_SESSION['user_name'] = 'Administrador';
    $_SESSION['user_email'] = $admin['email'];
    $_SESSION['admin_id'] = $customer['admin_id'];
    header("Location: /student013/shop/backend/index.php");
    exit;
  }
}

// Buscar en customers
$sqlCustomer = "SELECT customer_id, first_name, last_name, email, password FROM 013_customers WHERE email = '$email'";
$resultCustomer = $conn->query($sqlCustomer);

if ($resultCustomer && $resultCustomer->num_rows > 0) {
  $customer = $resultCustomer->fetch_assoc();
  if (password_verify($password, $customer['password'])) {
    $_SESSION['user_type'] = 'customer';
    $_SESSION['user_name'] = $customer['first_name'] . ' ' . $customer['last_name'];
    $_SESSION['user_email'] = $customer['email'];
    $_SESSION['customer_id'] = $customer['customer_id'];
    header("Location: /student013/shop/backend/forms/products/products_list.php");
    exit;
  }
}

echo "<p>Credenciales incorrectas.</p>";
?>