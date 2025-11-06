<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<div class="container">
    <h2>Resultado de inserción</h2>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") :
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = floatval($_POST["price"]);
        $stock = intval($_POST["stock"]);
        $vat = isset($_POST["vat_included"]) ? 1 : 0;

        $sql = "INSERT INTO 013_products (name, description, price, stock, vat_included)
            VALUES ('$name', '$description', $price, $stock, $vat)";

        if ($conn->query($sql)) :
            echo "<p>Producto <strong>" . htmlspecialchars($name) . "</strong> insertado correctamente.</p>";
        else :
            echo "<p>Error al insertar el producto: " . htmlspecialchars($conn->error) . "</p>";
        endif;
    else : ?>
        <p>No se han recibido datos para insertar.</p>
    <?php endif; ?>
</div>

<?php $conn->close(); ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>