<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="POST" action="/student013/shop/backend/database/db_orders/db_order_delete.php">
    <h2>Eliminar Pedido</h2>

    <p>
        <label>ID del Pedido:</label>
        <input type="number" name="order_id" required>
    </p>

    <p>
        <input type="submit" value="Eliminar pedido">
    </p>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>