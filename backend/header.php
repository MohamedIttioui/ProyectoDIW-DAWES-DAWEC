<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/student013/shop/backend/css/style.css">
    <title>NutriCore</title>
</head>

<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $userType = $_SESSION['user_type'] ?? 'guest';
    $userEmail = $_SESSION['user_email'] ?? '';
    ?>

    <header class="header">
        <img src="/student013/shop/frontend/img/logo_transparenteRecotado.png" alt="NutriCore" class="logo">

        <?php if ($userType === 'admin') : ?>
            <!-- Menú completo para admin -->
            <nav class="nav-menu">
                <div class="menu-left">
                    <div class="menu-item">
                        <a href="/student013/shop/frontend/home.html">
                            <i class="fas fa-home"></i>
                            <span class="menu-text">Home</span>
                        </a>
                    </div>
                </div>

                <div class="menu-center">
                    <div class="menu-item">
                        <a href="/student013/shop/backend/forms/products/products_list.php">
                            <i class="fas fa-box"></i>
                            <span class="menu-text">Products</span>
                        </a>
                        <div class="submenu">
                            <a href="/student013/shop/backend/forms/products/product_select.php">Select</a>
                            <a href="/student013/shop/backend/forms/products/product_insert.php">Insert</a>
                            <a href="/student013/shop/backend/forms/products/product_update.php">Update</a>
                            <a href="/student013/shop/backend/forms/products/product_delete.php">Delete</a>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <span class="menu-text">Customer</span>
                        </a>
                        <div class="submenu">
                            <a href="/student013/shop/backend/forms/customers/customer_select.php">Select</a>
                            <a href="/student013/shop/backend/forms/customers/customer_insert.php">Insert</a>
                            <a href="/student013/shop/backend/forms/customers/customer_update.php">Update</a>
                            <a href="/student013/shop/backend/forms/customers/customer_delete.php">Delete</a>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a href="#">
                            <i class="fas fa-truck"></i>
                            <span class="menu-text">orders</span>
                        </a>
                        <div class="submenu">
                            <a href="/student013/shop/backend/forms/orders/order_select.php">Select</a>
                            <a href="/student013/shop/backend/forms/orders/order_insert.php">Insert</a>
                            <a href="/student013/shop/backend/forms/orders/order_update.php">Update</a>
                            <a href="/student013/shop/backend/forms/orders/order_delete.php">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="menu-right">
                    <div class="menu-item">
                        <a href="#">
                            <i class="fas fa-user-shield"></i>
                            <span>
                                <?= isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'User' ?>
                            </span>
                        </a>
                        <div class="submenu">
                            <a href="/student013/shop/backend/database/db_logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>

        <?php else : ?>
            <!-- Menú simple para guest y customer -->
            <nav class="nav-links">
                <p>
                    <input type="text" class="search-input" placeholder="Buscar..." aria-label="Buscar">
                    <i class="fas fa-search search-icon"></i>
                </p>

                <a href="#" class="nav-link">
                    <i class="fas fa-home"></i><span>Home</span>
                </a>

                <div class="user-menu">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>
                            <?= isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Usuario' ?>
                        </span>
                    </a>
                    <div class="user-dropdown">
                        <?php if ($userType === 'guest') : ?>
                            <a href="/student013/shop/backend/forms/form_login.php" class="btn-log">Login</a>
                            <a href="/student013/shop/backend/forms/customers/customer_insert.php" class="btn-reg">Register</a>
                        <?php else : ?>
                            <a href="/student013/shop/backend/customer_profile.php">My count</a>
                            <a href="/student013/shop/backend/database/db_logout.php">Logout</a>
                            <a href="/student013/shop/backend/orders.php">Your orders</a>
                        <?php endif; ?>
                    </div>
                </div>

                <a href="/student013/shop/backend/views/shopping_cart.php" class="cart-btn nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Carrito</span>
                    <span id="cart-count">0</span>
                </a>
            </nav>
        <?php endif; ?>
    </header>