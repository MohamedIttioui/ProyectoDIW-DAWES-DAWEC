<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php');

$customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

$sql = "SELECT * FROM 013_customers";

if ($customer_id != '') {
  $sql .= " WHERE customer_id = " . intval($customer_id);
} elseif ($email != '') {
  $sql .= " WHERE email = '" . $conn->real_escape_string($email) . "'";
}

$result = $conn->query($sql);
?>

<div class="container">
  <h2>Listado de Clientes</h2>

  <?php if ($result && $result->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>NIF</th>
          <th>Email</th>
          <th>Dirección</th>
          <th>Creado</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['customer_id']) ?></td>
            <td><?= htmlspecialchars($row['first_name']) ?></td>
            <td><?= htmlspecialchars($row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['nif']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No hay clientes registrados.</p>
  <?php endif; ?>
</div>