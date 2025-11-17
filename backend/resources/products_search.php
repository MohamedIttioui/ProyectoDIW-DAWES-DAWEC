<?php
session_start(); // importante
$userType = $_SESSION['user_type'] ?? 'guest';
require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php';

$txt = $_GET['txt'] ?? '';
$txt = $conn->real_escape_string($txt);

$sql = "SELECT * FROM 013_products WHERE name LIKE '%$txt%'";
$result = $conn->query($sql);
$defaultImage = "/student013/shop/assets/img/whey_protein.jpg";

// Aquí generamos los mismos divs que ya tienes
if ($result && $result->num_rows > 0):
  while ($row = $result->fetch_assoc()):
    $name = htmlspecialchars($row['name'] ?? 'Producto sin nombre');
    $price = htmlspecialchars($row['price'] ?? '0.00');
    $image = !empty($row['image']) ? $row['image'] : $defaultImage;
    ?>
    <div class="product-card">
      <img src="<?= $image ?>" alt="<?= $name ?>">
      <h3><?= $name ?></h3>
      <p><strong>Price:</strong> €<?= $price ?></p>
      <div class="buttons">
        <?php if ($userType === 'customer' || $userType === 'guest'): ?>
          <a href="/student013/shop/backend/forms/products/product_select.php?product_id=<?= $row['product_id'] ?>"
            class="select">Show</a>
          <a href="/student013/shop/backend/database/add_to_cart.php?product_id=<?= $row['product_id'] ?>" class="update">Add
            to cart</a>
        <?php endif; ?>
        <?php if ($userType === 'admin'): ?>
          <a href="/student013/shop/backend/forms/products/product_select.php?product_id=<?= $row['product_id'] ?>"
            class="select">Show</a>
          <a href="/student013/shop/backend/forms/products/product_update.php?product_id=<?= $row['product_id'] ?>"
            class="update">Update</a>
          <a href="/student013/shop/backend/forms/products/product_delete.php?product_id=<?= $row['product_id'] ?>"
            class="delete">Delete</a>
        <?php endif; ?>
      </div>
    </div>
    <?php
  endwhile;
else:
  echo "<p>No hay productos disponibles.</p>";
endif;

$conn->close();
?>