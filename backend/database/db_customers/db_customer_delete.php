<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/db_connect.php'; ?>

<?php
$customer_id = isset($_GET['customer_id']) ? intval($_GET['customer_id']) : 0;
$canDelete = false;

if ($userType === 'admin') {
  $canDelete = true;
} elseif ($userType === 'customer' && isset($_SESSION['customer_id']) && $_SESSION['customer_id'] == $customer_id) {
  $canDelete = true;
}
?>

<div class="container">
  <h1>Delete Customer</h1>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["confirm"]) && $_POST["confirm"] === "yes"):
    $customer_id = intval($_POST["customer_id"]);
    $sql = "DELETE FROM 013_customers WHERE customer_id = $customer_id";

    if ($conn->query($sql)):
      echo "<p>Customer with ID <strong>$customer_id</strong> has been deleted correctly.</p>";
      if ($userType === 'customer' && $_SESSION['customer_id'] == $customer_id) {
        session_destroy();
        echo "<p>Your account has been removed. <a href='/student013/shop/index.html'>Return to homepage</a></p>";
      } else {
        echo "<p><a href='/student013/shop/backend/forms/customers/customers_list.php'>Return to customer list</a></p>";
      }
    else:
      echo "<p>Error: " . htmlspecialchars($conn->error) . "</p>";
    endif;
    ?>

  <?php elseif ($customer_id > 0 && $canDelete):
    $sql = "SELECT first_name, last_name, email FROM 013_customers WHERE customer_id = $customer_id";
    $result = $conn->query($sql);
    ?>

    <?php if ($result && $row = $result->fetch_assoc()):
      $name = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
      $email = htmlspecialchars($row['email']);
      ?>
      <div class="customer-card">
        <h3><?= $name ?></h3>
        <p><strong>Email:</strong> <?= $email ?></p>

        <h4 style="color:#c00;">Are you sure you want to delete this customer?</h4>

        <form method="POST" action="db_customer_delete.php?customer_id=<?= $customer_id ?>">
          <input type="hidden" name="customer_id" value="<?= $customer_id ?>">
          <input type="hidden" name="confirm" value="yes">
          <button type="submit" class="delete">Delete</button>
        </form>
        <?php if ($userType === 'customer'): ?>
          <form method="GET" action="/student013/shop/backend/database/db_customers/db_customer_select.php">
            <input type="submit" class="cancel" value="Cancel">>
          </form>
        <?php else: ?>
          <form method="GET" action="/student013/shop/backend/forms/customers/customers_list.php">
            <input type="submit" class="cancel" value="Cancel">
          </form>
        <?php endif; ?>
      </div>
    <?php else: ?>
      <p>Customer not found.</p>
    <?php endif; ?>

  <?php else: ?>
    <p>No valid customer ID or insufficient permissions.</p>
  <?php endif; ?>
</div>

<?php $conn->close(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/student013/shop/backend/footer.php'; ?>