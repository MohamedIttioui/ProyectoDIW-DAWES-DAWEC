<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<?php
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$defaultImage = "/student013/shop/frontend/img/whey_protein.jpg";
?>

<div class="container">
  <h1>Product details</h1>

  <?php if ($product_id > 0):
    $sql = "SELECT name, description, price, stock, vat_included, image FROM 013_products WHERE product_id = $product_id";
    $result = $conn->query($sql);
    ?>

    <?php if ($result && $result->num_rows > 0):
      $row = $result->fetch_assoc();
      $name = htmlspecialchars($row['name'] ?? 'Producto sin nombre');
      $description = htmlspecialchars($row['description'] ?? '');
      $price = htmlspecialchars($row['price']) ?? '0.00';
      $stock = htmlspecialchars($row['stock'] ?? '');
      $vat = $row['vat_included'] ? 'Sí' : 'No';
      $image = !empty($row['image']) ? $row['image'] : $defaultImage;
      ?>

      <div class="product-card">
        <img src="<?= $image ?>" alt="<?= $name ?>">
        <h3><?= $name ?></h3>
        <p><?= $description ?></p>
        <p><strong>Precio:</strong> €<?= $price ?></p>
        <p><strong>Stock:</strong> <?= $stock ?></p>
        <p><strong>IVA incluido:</strong> <?= $vat ?></p>
        <div class="buttons">
          <a href="/student013/shop/backend/forms/products/product_select.php?product_id=<?= $product_id ?>"
            class="select">Show</a>

          <?php if ($userType === 'admin'): ?>
            <a href="/student013/shop/backend/forms/products/product_update.php?product_id=<?= $product_id ?>"
              class="update">Update</a>
            <a href="/student013/shop/backend/forms/products/product_delete.php?product_id=<?= $product_id ?>"
              class="delete">Delete</a>
          <?php endif; ?>

          <a href="/student013/shop/backend/forms/shopping_cart/update_quantity.php?product_id=<?= $product_id ?>"
            class="update">Add to cart</a>
        </div>
      </div>

    <?php else: ?>
      <p>Producto no encontrado.</p>
    <?php endif; ?>

  <?php else: ?>
    <p>No se ha proporcionado un ID válido.</p>
  <?php endif; ?>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>