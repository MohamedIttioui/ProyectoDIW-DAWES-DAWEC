<!-- FOOTER -->
<footer class="footer">
    <div class="social-links">
        <a href="https://www.facebook.com/NutriCore" target="_blank"><i class="fab fa-facebook"></i>
            <span>Facebook</span>
        </a>
        <a href="https://twitter.com/NutriCore" target="_blank"><i class="fab fa-twitter"></i>
            <span>Twitter</span>
        </a>
        <a href="https://www.instagram.com/NutriCore" target="_blank"><i class="fab fa-instagram"></i>
            <span>Instagram</span>
        </a>
        <a href="https://www.linkedin.com/company/NutriCore" target="_blank"><i class="fab fa-linkedin"></i>
            <span>LinkedIn</span>
        </a>
        <a href="https://www.youtube.com/NutriCore" target="_blank"><i class="fab fa-youtube"></i>
            <span>YouTube</span>
        </a>
    </div>
    <div class="politics">
        <a href="#">Política de privacidad</a>
    </div>
    <div class="terminos">
        <a href="#">Términos de uso</a>
    </div>
    <div class="contacto">
        <a href="#">Contacto</a>
    </div>
    <p>&copy; 2025 NutriCore. Todos los derechos reservados.</p>
</footer>
<script>
    function searchProducts(query) {
        const container = document.getElementById("products-container");

        if (query.length === 0) {
            // Si el input está vacío, recarga los productos por defecto
            container.innerHTML = ""; // o podrías hacer otra petición para productos destacados
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                container.innerHTML = this.responseText; // PHP devuelve ya los divs <div class="product-card">
            }
        };

        xhr.open("GET", "/student013/shop/backend/resources/products_search.php?txt=" + encodeURIComponent(query), true);
        xhr.send();
    }
</script>

</body>

</html>