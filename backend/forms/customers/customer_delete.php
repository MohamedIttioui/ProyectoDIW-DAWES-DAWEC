<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="POST" action="/student013/shop/backend/database/db_customers/db_customer_delete.php">
  <h2>Eliminar Cliente</h2>

  <p>
    <label>ID del Cliente:</label>
    <input type="number" name="customer_id" required>
  </p>
  <p>
    <label>Email:</label>
    <input type="email" name="email" required>
  </p>

  <p>
    <input type="submit" value="Eliminar cliente">
  </p>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>