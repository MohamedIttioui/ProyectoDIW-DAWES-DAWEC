<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<?php
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$defaultImage = "/student013/shop/assets/img/whey_protein.jpg";
?>

<div class="container">
  <h1>Delete product</h1>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirm"]) && $_POST["confirm"] === "yes") :
    $product_id = intval($_POST["product_id"]);
    $sql = "DELETE FROM 013_products WHERE product_id = $product_id";

    if ($conn->query($sql)) :
      echo "<p>Product with ID <strong>$product_id</strong> has been deleted correctly.</p>";
    else :
      echo "<p>Error: " . htmlspecialchars($conn->error) . "</p>";
    endif;
  ?>

  <?php elseif ($product_id > 0) :
    $sql = "SELECT name, description, price, image FROM 013_products WHERE product_id = $product_id";
    $result = $conn->query($sql);
  ?>
    <?php if ($result && $row = $result->fetch_assoc()) :
      $name = htmlspecialchars($row['name'] ?? 'Producto sin nombre');
      $description = htmlspecialchars($row['description'] ?? '');
      $price = htmlspecialchars($row['price'] ?? '0.00');
      $image = !empty($row['image']) ? $row['image'] : $defaultImage;
    ?>
      <div class="product-card">
        <img src="<?= $image ?>" alt="<?= $name ?>">
        <h3><?= $name ?></h3>
        <p><?= $description ?></p>
        <p><strong>Precio:</strong> €<?= $price ?></p>

        <h4 style="color:#c00;">Are you sure you want to delete this product?</h4>

        <form method="POST" action="db_product_delete.php">
          <input type="hidden" name="product_id" value="<?= $product_id ?>">
          <input type="hidden" name="confirm" value="yes">
          <button type="submit" class="delete">Delete</button>
        </form>

        <form method="GET" action="/student013/shop/backend/forms/products/products_list.php">
          <button type="submit" class="cancel">Cancel</button>
        </form>
      </div>

    <?php else : ?>
      <p>Producto no encontrado.</p>
    <?php endif; ?>

  <?php else : ?>
    <p>No se ha proporcionado un ID válido.</p>
  <?php endif; ?>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>