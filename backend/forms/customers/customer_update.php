<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php
if ($userType === 'customer' && isset($_SESSION['customer_id']) && empty($_GET['customer_id'])) {
  $customer_id = intval($_SESSION['customer_id']);
} else {
  $customer_id = isset($_GET['customer_id']) ? intval($_GET['customer_id']) : 0;
}
?>
<form method="POST" action="/student013/shop/backend/database/db_customers/db_customer_update.php">
  <h2>Actualizar Cliente</h2>

  <p>
    <label>ID del Cliente:</label>
    <input type="number" name="customer_id" required>
  </p>

  <p>
    <label>Nombre:</label>
    <input type="text" name="first_name">
  </p>

  <p>
    <label>Apellidos:</label>
    <input type="text" name="last_name">
  </p>

  <p>
    <label>NIF:</label>
    <input type="text" name="nif">
  </p>

  <p>
    <label>Email:</label>
    <input type="email" name="email">
  </p>

  <p>
    <label>Contraseña:</label>
    <input type="password" name="password">
  </p>

  <p>
    <label>Dirección:</label>
    <input type="text" name="address"></textarea>
  </p>

  <p>
    <input type="submit" value="Actualizar cliente">
  </p>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>