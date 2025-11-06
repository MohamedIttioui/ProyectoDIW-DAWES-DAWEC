<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="POST" action="/student013/shop/backend/database/db_login.php">
  <h2>Login</h2>

  <p>
    <label>E-mail:</label>
    <input type="email" name="email" required>
  </p>

  <p>
    <label>Password:</label>
    <input type="password" name="password" required>
  </p>

  <p>
    <input type="submit" value="Enter">
  </p>
</form>