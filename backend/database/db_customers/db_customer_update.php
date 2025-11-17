<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<link rel="stylesheet" href="/student013/shop/backend/css/customers.css">

<?php
$defaultImage = "https://thumbs.dreamstime.com/b/incognito-icon-man-face-glasses-beard-hat-photo-props-vector-incognito-icon-man-face-glasses-beard-hat-photo-109640094.jpg";
$customer_id = isset($_GET['customer_id']) ? intval($_GET['customer_id']) : ($_SESSION['customer_id'] ?? 0);

// Verificación de permisos
$canEdit = false;
if ($userType === 'admin') {
  $canEdit = true;
} elseif ($userType === 'customer' && isset($_SESSION['customer_id']) && $_SESSION['customer_id'] == $customer_id) {
  $canEdit = true;
}

if ($customer_id > 0 && $canEdit):
  $sql = "SELECT first_name, last_name, nif, email, address FROM 013_customers WHERE customer_id = $customer_id";
  $result = $conn->query($sql);
  if ($result && $row = $result->fetch_assoc()):
    $first_name = $row['first_name'];
    ?>

    <div class="container-form">
      <h1>Actualizar Cliente</h1>
      <div class="profile-update">
        <div class="profile-image">
          <a href=""><img src="<?= $defaultImage ?>" alt="Foto de <?= $first_name ?>" class="profile-icon"></a>
        </div>
        <form method="POST" action="db_customer_update_process.php" class="profile-form">
          <input type="hidden" name="customer_id" value="<?= $customer_id ?>">

          <label>Nombre:</label>
          <input type="text" name="first_name" value="<?= htmlspecialchars($row['first_name']) ?>" required>

          <label>Apellidos:</label>
          <input type="text" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>" required>

          <label>NIF:</label>
          <input type="text" name="nif" value="<?= htmlspecialchars($row['nif']) ?>" required>

          <label>Email:</label>
          <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>

          <label>Dirección:</label>
          <input type="text" name="address" value="<?= htmlspecialchars($row['address']) ?>">

          <input type="submit" value="Guardar cambios" class="update">
        </form>
      </div>
    </div>
    <?php
  else:
    echo "<p>Cliente no encontrado.</p>";
  endif;
else:
  echo "<p>No tienes permisos para editar este perfil.</p>";
endif;

$conn->close();
include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php';
?>