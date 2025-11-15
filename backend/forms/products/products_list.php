<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>
<?php
$sql = "SELECT product_id, name, price, image FROM 013_products LIMIT 10";
$result = $conn->query($sql);

// Imagen por defecto
$defaultImage = "/student013/shop/assets/img/whey_protein.jpg";
?>
<div class="container">
    <h1>Productos destacados</h1>
    <div class="products-flex">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()):
                $name = htmlspecialchars($row['name'] ?? 'Producto sin nombre');
                $price = htmlspecialchars($row['price'] ?? '0.00');
                $image = !empty($row['image']) ? $row['image'] : $defaultImage;
            ?>
                <div class="product-card">
                    <img src="<?= $image ?>" alt="<?php echo $name ?>">
                    <h3><?php echo $name ?></h3>
                    <p><strong>Price:</strong> €<?= $price ?></p>
                    <div class="buttons">
                        <?php if ($userType === 'customer'): ?>
                            <a href="/student013/shop/backend/forms/products/product_select.php?product_id=<?= $row['product_id'] ?>"
                                class="select">Show</a>
                            <a href="/student013/shop/backend/database/add_to_cart.php?product_id=<?= $row['product_id'] ?>"
                                class="update">Add to cart</a>
                        <?php endif; ?>
                        <?php if ($userType === 'admin'): ?>
                            <a href="/student013/shop/backend/forms/products/product_select.php?product_id=<?= $row['product_id'] ?>"
                                class="select">Show</a>
                            <a href="/student013/shop/backend/forms/products/product_update.php?product_id=<?= $row['product_id'] ?>"
                                class="update">Update</a>
                            <a href="/student013/shop/backend/forms/products/product_delete.php?product_id=<?= $row['product_id'] ?>"
                                class="delete">Delete
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay productos disponibles.</p>
        <?php endif; ?>
    </div>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>