<?php
function renderProductCard(array $product, string $defaultImage, string $userType = 'guest', array $options = [])
{
  $product_id = intval($product['product_id'] ?? 0);
  $name = htmlspecialchars($product['name'] ?? 'Producto sin nombre');
  $description = htmlspecialchars($product['description'] ?? '');
  $price = htmlspecialchars($product['price'] ?? '0.00');
  $image = !empty($product['image']) ? $product['image'] : $defaultImage;

  echo '<div class="product-card">';
  echo "<img src=\"$image\" alt=\"$name\">";
  echo "<h3>$name</h3>";
  if (!empty($description)) echo "<p>$description</p>";
  echo "<p><strong>Precio:</strong> €$price</p>";

  // Opcionales
  if (!empty($product['stock'])) {
    $stock = htmlspecialchars($product['stock']);
    echo "<p><strong>Stock:</strong> $stock</p>";
  }

  if (isset($product['vat_included'])) {
    $vat = $product['vat_included'] ? 'Sí' : 'No';
    echo "<p><strong>IVA incluido:</strong> $vat</p>";
  }

  // Botones
  echo '<div class="buttons">';
  if (!empty($options['show'])) {
    echo "<a href=\"{$options['show']}?product_id=$product_id\" class=\"select\">Show</a>";
  }

  if ($userType === 'admin') {
    if (!empty($options['update'])) {
      echo "<a href=\"{$options['update']}?product_id=$product_id\" class=\"update\">Update</a>";
    }
    if (!empty($options['delete'])) {
      echo "<a href=\"{$options['delete']}?product_id=$product_id\" class=\"delete\">Delete</a>";
    }
  }

  if (!empty($options['cart'])) {
    echo "<a href=\"{$options['cart']}?product_id=$product_id\" class=\"update\">Add to cart</a>";
  }

  echo '</div>
</div>';
}
?>;