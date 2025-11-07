<?php
if (isset($_GET['product_id']) && intval($_GET['product_id']) > 0):
    $product_id = intval($_GET['product_id']);
    header("Location: /student013/shop/backend/database/db_products/db_product_select.php?product_id=$product_id");
    exit;
endif;
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<form method="GET" action="/student013/shop/backend/database/db_products/db_product_select.php">
    <h2>Search product</h2>
    <p>
        <label>Product ID:</label>
        <input type="number" name="product_id">
    </p>
    <p>
        <input type="submit" value="See product(s)">
    </p>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>