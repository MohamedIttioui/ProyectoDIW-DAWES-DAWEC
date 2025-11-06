<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="POST" action="/student013/shop/backend/database/db_customers/db_customer_insert.php">
  <h2>Insertar Cliente</h2>

  <p>
    <label>Nombre:</label>
    <input type="text" name="first_name" required>
  </p>

  <p>
    <label>Apellidos:</label>
    <input type="text" name="last_name" required>
  </p>

  <p>
    <label>NIF:</label>
    <input type="text" name="nif" required>
  </p>

  <p>
    <label>Email:</label>
    <input type="email" name="email" required>
  </p>

  <p>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
  </p>

  <p>
    <label>Dirección:</label>
    <input type="text" name="address" required></textarea>
  </p>

  <p>
    <input type="submit" value="Insertar cliente">
  </p>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>