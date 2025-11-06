<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php
if (isset($_GET['product_id']) && intval($_GET['product_id']) > 0) {
    $product_id = intval($_GET['product_id']);
    header("Location: /student013/shop/backend/database/db_products/db_product_update.php?product_id=$product_id");
    exit;
}
?>;

<form method="POST" action="/student013/shop/backend/database/db_products/db_product_update.php">
    <h2>Update product</h2>

    <p>
        <label>Product ID to upadte:</label>
        <input type="number" name="product_id" required>
    </p>
    <p>
        <label>New name:</label>
        <input type="text" name="name">
    </p>
    <p>
        <label>New description:
            <textarea name="description"></textarea>
        </label>
    </p>
    <p>
        <label>New price:
            <input type="number" step="0.01" name="price">
        </label>
    </p>
    <p>
        <label>VAT included:</label>
        <input type="checkbox" name="vat_included">
    </p>
    <p>
        <label>New stock:
            <input type="number" name="stock">
        </label>
    </p>
    <p>
        <input type="submit" value="Update product">
    </p>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>