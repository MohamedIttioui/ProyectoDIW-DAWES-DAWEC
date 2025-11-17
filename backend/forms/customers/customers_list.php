<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<link rel="stylesheet" href="/student013/shop/backend/css/customers.css">

<div class="container">
  <h1>Clientes registrados</h1>
  <div class="customers-flex">
    <?php if ($userType === 'admin'): ?>
      <?php
      $sql = "SELECT customer_id, first_name, last_name, nif, email, address, created_at FROM 013_customers LIMIT 20";
      $result = $conn->query($sql);
      ?>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()):
          $customer_id = intval($row['customer_id']);
          $firstName = htmlspecialchars($row['first_name'] ?? '');
          $lastName = htmlspecialchars($row['last_name'] ?? '');
          $nif = htmlspecialchars($row['nif'] ?? '');
          $email = htmlspecialchars($row['email'] ?? '');
          $address = htmlspecialchars($row['address'] ?? '');
          $createdAt = htmlspecialchars($row['created_at'] ?? '');
          ?>
          <div class="customer-card">
            <img src="/student013/shop/assets/icons/user.svg" alt="Foto de <?= $firstName ?>" class="customer-img">
            <h3><?= $firstName ?>       <?= $lastName ?></h3>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>NIF:</strong> <?= $nif ?></p>
            <p><strong>Dirección:</strong> <?= $address ?></p>
            <p><strong>Registrado el:</strong> <?= $createdAt ?></p>
            <div class="buttons">
              <a href="/student013/shop/backend/database/db_customers/db_customer_select.php?customer_id=<?= $customer_id ?>"
                class="select">Ver</a>
              <a href="/student013/shop/backend/database/db_customers/db_customer_update.php?customer_id=<?= $customer_id ?>"
                class="update">Actualizar</a>
              <a href="/student013/shop/backend/database/db_customers/db_customer_delete.php?customer_id=<?= $customer_id ?>"
                class="delete">Eliminar</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No hay clientes registrados.</p>
      <?php endif; ?>
    <?php else: ?>
      <p>No tienes permisos para ver esta sección.</p>
    <?php endif; ?>
  </div>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>