document.addEventListener('DOMContentLoaded', () => {
    /*GALERÍA DE IMÁGENES*/
    const mainImage = document.querySelector('.main-image');
    const smallImages = document.querySelectorAll('.small-images img');

    if (mainImage && smallImages.length > 0) {
        smallImages.forEach(img => {
            img.addEventListener('click', () => {
                mainImage.src = img.src;
                smallImages.forEach(t => t.classList.remove('active'));
                img.classList.add('active');
            });
        });
    }

    /*SELECTOR DE FORMATO (500g / 1kg / 2kg)
       Actualiza precio dinámicamente*/
    const formatButtons = document.querySelectorAll('.format-btn');
    const priceEl = document.querySelector('#product-price');

    if (formatButtons.length > 0 && priceEl) {
        formatButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Quitar la clase activa de todos
                formatButtons.forEach(b => b.classList.remove('active'));
                // Activar el clicado
                btn.classList.add('active');

                // Animación suave del cambio de precio
                priceEl.style.opacity = '0';
                setTimeout(() => {
                    priceEl.textContent = `€${btn.dataset.price}`;
                    priceEl.style.opacity = '1';
                }, 200);
            });
        });
    }

    /* SELECTOR DE SABOR (select)
       (Podría usarse en el futuro para modificar stock o imagen)
    */
    const saborSelect = document.getElementById('sabor');
    if (saborSelect) {
        saborSelect.addEventListener('change', () => {
            console.log(`Sabor seleccionado: ${saborSelect.value}`);
        });
    }

    /* CARRITO DE COMPRAS*/
    let cartCount = 0;
    const cartCountEl = document.getElementById('cart-count');
    const addToCartBtn = document.querySelector('.actions .btn-primary');
    const quantityInput = document.getElementById('cantidad');
    const productTitle = document.querySelector('.product-title');

    function updateCartCount() {
        if (cartCountEl) cartCountEl.textContent = cartCount;
    }

    if (addToCartBtn && quantityInput && productTitle) {
        addToCartBtn.addEventListener('click', () => {
            let qty = parseInt(quantityInput.value, 10);
            if (isNaN(qty) || qty < 1) qty = 1;

            const formatBtnActive = document.querySelector('.format-btn.active');
            const selectedFormat = formatBtnActive ? formatBtnActive.dataset.format : "Formato estándar";

            const selectedSabor = saborSelect ? saborSelect.value : "sin sabor";

            cartCount += qty;
            updateCartCount();

            alert(`Has agregado ${qty} unidad(es) de "${productTitle.textContent}" (${selectedFormat}, sabor ${selectedSabor}) al carrito.`);
        });
    }
});
