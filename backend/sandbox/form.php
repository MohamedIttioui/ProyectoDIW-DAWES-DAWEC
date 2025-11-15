<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Buscador AJAX</title>
  <script>
    function showHint(str) {
      if (str.length === 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "db.php?txt=" + encodeURIComponent(str), true);
      xmlhttp.send();
    }
  </script>
</head>

<body>
  <h2>Buscador de productos</h2>
  <label for="productSearch">Buscar producto:</label>
  <input type="text" id="productSearch" onkeyup="showHint(this.value)" placeholder="Escribe el nombre del producto..." style="padding: 8px; border-radius: 5px;">
  <div id="txtHint"></div>
</body>

</html>