<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<?php
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$mensaje = '';
?>

<div class="container">
  <h1>Update product</h1>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["product_id"])) :
    $product_id = intval($_POST["product_id"]);
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = floatval($_POST["price"]);
    $stock = intval($_POST["stock"]);
    $vat = isset($_POST["vat_included"]) ? 1 : 0;

    $sql = "UPDATE 013_products SET 
              name = '$name',
              description = '$description',
              price = $price,
              stock = $stock,
              vat_included = $vat
            WHERE product_id = $product_id";

    if ($conn->query($sql)) {
      $mensaje = "Producto actualizado correctamente.";
    } else {
      $mensaje = "Error al actualizar: " . htmlspecialchars($conn->error);
    }
  endif;
  ?>

  <?php if ($product_id > 0) :
    $sql = "SELECT name, description, price, stock, vat_included FROM 013_products WHERE product_id = $product_id";
    $result = $conn->query($sql);
  ?>

    <?php if ($result && $row = $result->fetch_assoc()) : ?>
      <?php if ($mensaje) : ?><p><?= $mensaje ?></p><?php endif; ?>

      <form method="POST" action="db_product_update.php?product_id=<?= $product_id ?>">
        <input type="hidden" name="product_id" value="<?= $product_id ?>">

        <p><label>Nombre:</label>
          <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        </p>

        <p><label>Descripción:</label>
          <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea>
        </p>

        <p><label>Precio (€):</label>
          <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($row['price']) ?>" required>
        </p>

        <p><label>Stock:</label>
          <input type="number" name="stock" value="<?= htmlspecialchars($row['stock']) ?>" required>
        </p>

        <p><label><input type="checkbox" name="vat_included" <?= $row['vat_included'] ? 'checked' : '' ?>> IVA incluido</label></p>

        <p><input type="submit" value="Guardar cambios"></p>
      </form>

    <?php else : ?>
      <p>Producto no encontrado.</p>
    <?php endif; ?>

  <?php else : ?>
    <p>No se ha proporcionado un ID válido.</p>
  <?php endif; ?>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>