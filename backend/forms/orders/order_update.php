<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>

<form method="POST" action="/student013/shop/backend/database/db_orders/db_order_update.php">
    <h2>Actualizar Pedido</h2>

    <p>
        <label>ID del Pedido:</label>
        <input type="number" name="order_id" required>
    </p>

    <p>
        <label>ID del Cliente:</label>
        <input type="number" name="customer_id" required>
    </p>

    <p>
        <label>Fecha del pedido:</label>
        <input type="datetime-local" name="order_date" required>
    </p>

    <p>
        <label>Total (€):</label>
        <input type="number" step="0.01" name="total" required>
    </p>

    <p>
        <label>Estado:</label>
        <select name="status" required>
            <option value="pending">Pendiente</option>
            <option value="paid">Pagado</option>
            <option value="shipped">Enviado</option>
            <option value="cancelled">Cancelado</option>
        </select>
    </p>

    <p>
        <input type="submit" value="Actualizar pedido">
    </p>
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>