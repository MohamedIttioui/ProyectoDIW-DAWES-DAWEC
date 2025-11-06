<?php
require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"] ?? '';
    $last_name = $_POST["last_name"] ?? '';
    $nif = $_POST["nif"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $address = $_POST["address"] ?? '';

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO 013_customers (first_name, last_name, nif, email, password, address)
            VALUES ('$first_name', '$last_name', '$nif', '$email', '$hashedPassword', '$address')";

    if ($conn->query($sql)) {
        echo "<p>Cliente <strong>" . htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name) . "</strong> insertado correctamente.</p>";
    } else {
        echo "<p>Error al insertar el cliente: " . htmlspecialchars($conn->error) . "</p>";
    }
} else {
    echo "<p>No se han recibido datos para insertar.</p>";
}

$conn->close();
?>;