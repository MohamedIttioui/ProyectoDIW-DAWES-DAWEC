<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<?php
if ($userType === 'customer' && isset($_SESSION['customer_id']) && empty($_GET['customer_id'])) {
  $customer_id = intval($_SESSION['customer_id']);
} else {
  $customer_id = isset($_GET['customer_id']) ? intval($_GET['customer_id']) : 0;
}
?>
<link rel="stylesheet" href="/student013/shop/backend/css/customers.css">
<div class="container">
  <h1>Your profile</h1>
  <?php
  $canAccess = false;

  if ($userType === 'admin') {
    $canAccess = true;
  } elseif ($userType === 'customer' && isset($_SESSION['customer_id']) && $_SESSION['customer_id'] == $customer_id) {
    $canAccess = true;
  }

  if ($customer_id > 0 && $canAccess):
    $sql = "SELECT first_name, last_name, nif, email, address, created_at FROM 013_customers WHERE customer_id = $customer_id";
    $result = $conn->query($sql);
    ?>

    <?php if ($result && $result->num_rows > 0):
      $row = $result->fetch_assoc();
      $name = htmlspecialchars($row['first_name'] . ' ' . $row['last_name'] ?? 'Sin nombre');
      $email = htmlspecialchars($row['email'] ?? '');
      $nif = htmlspecialchars($row['nif'] ?? '');
      $address = htmlspecialchars($row['address'] ?? '');
      $createdAt = htmlspecialchars($row['created_at'] ?? '');
      ?>
      <div class="customer-card">
        <img src="/student013/shop/assets/icons/user.svg" alt="Foto de <?= $name ?>" class="customer-img">
        <h3><?= $name ?></h3>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>NIF:</strong> <?= $nif ?></p>
        <p><strong>Dirección:</strong> <?= $address ?></p>
        <p><strong>Registrado el:</strong> <?= $createdAt ?></p>
        <div class="buttons">
          <a href="/student013/shop/backend/database/db_customers/db_customer_update.php?customer_id=<?= $customer_id ?>"
            class="update">Actualizar</a>
          <a href="/student013/shop/backend/database/db_customers/db_customer_delete.php?customer_id=<?= $customer_id ?>"
            class="delete">Eliminar</a>
        </div>
      </div>
    <?php else: ?>
      <p>Cliente no encontrado.</p>
    <?php endif; ?>

  <?php else: ?>
    <p>No tienes permisos para ver este perfil.</p>
  <?php endif; ?>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>