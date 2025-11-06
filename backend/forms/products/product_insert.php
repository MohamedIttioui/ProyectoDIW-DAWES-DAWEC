<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="POST" action="/student013/shop/backend/database/db_products/db_product_insert.php">
    <h2>Insertar producto</h2>
    <p>
        <label>Nombre:</label>
        <input type="text" name="name" required>
    </p>

    <p>
        <label>Descripción:
            <textarea name="description" required></textarea>
        </label>
    </p>

    <p>
        <label>Precio:
            <input type="number" step="0.01" name="price" required>
        </label>
    </p>
    <p>
        <label>IVA incluido:</label>
        <input type="checkbox" name="vat_included">
    </p>
    <p>
        <label>Stock:
            <input type="number" name="stock" required>
        </label>
    </p>
    <p>
        <input type="submit" value="Insertar producto">
    </p>

</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>