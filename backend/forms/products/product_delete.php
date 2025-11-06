<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php
if (isset($_GET['product_id']) && intval($_GET['product_id']) > 0) {
    $product_id = intval($_GET['product_id']);
    header("Location: /student013/shop/backend/database/db_products/db_product_delete.php?product_id=$product_id");
    exit;
}
?>;

<form method="POST" action="/student013/shop/backend/database/db_products/db_product_delete.php">
    <h2>Eliminar producto</h2>
    <p>
        <label>ID del producto a eliminar:</label>
        <input type="number" name="product_id" required>
    </p>
    <p>
        <input type="submit" value="Buscar producto">
    </p>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>