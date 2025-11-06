<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="GET" action="/student013/shop/backend/database/db_customers/db_customer_select.php">
  <h2>Buscar Cliente</h2>

  <p>
    <label>ID del Cliente:</label>
    <input type="number" name="customer_id">
  </p>

  <p>
    <label>Email:</label>
    <input type="email" name="email">
  </p>

  <p>
    <input type="submit" value="Buscar cliente">
  </p>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>