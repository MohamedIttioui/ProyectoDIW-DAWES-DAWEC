document.addEventListener('DOMContentLoaded', () => {

    /* -------------------------------
       MENÚ HAMBURGUESA
    --------------------------------*/
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('active');
            menuToggle.classList.toggle('open');
        });

        document.addEventListener('click', (e) => {
            if (!mainNav.contains(e.target) && !menuToggle.contains(e.target)) {
                mainNav.classList.remove('active');
                menuToggle.classList.remove('open');
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                mainNav.classList.remove('active');
                menuToggle.classList.remove('open');
            }
        });
    }

    /* -------------------------------
       DESPLEGABLE DE USUARIO (LOGIN / REGISTER)
    --------------------------------*/
    const userIcon = document.querySelector('.user-icon');
    const userDropdown = document.querySelector('.user-dropdown');

    if (userIcon && userDropdown) {
        userIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!userDropdown.contains(e.target) && !userIcon.contains(e.target)) {
                userDropdown.classList.remove('active');
            }
        });
    }

    /* -------------------------------
       BUSCADOR INTERACTIVO
    --------------------------------*/
    const searchIcon = document.querySelector('.search-icon');
    const searchInput = document.querySelector('.search-input');

    if (searchIcon && searchInput) {
        searchIcon.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                searchInput.classList.toggle('active');
                if (searchInput.classList.contains('active')) {
                    searchInput.focus();
                }
            }
        });
    }

    /* -------------------------------
       GALERÍA DE IMÁGENES
    --------------------------------*/
    const mainImage = document.querySelector('.main-image');
    const thumbs = document.querySelectorAll('.thumbs img');

    if (mainImage && thumbs.length > 0) {
        thumbs.forEach(img => {
            img.addEventListener('click', () => {
                mainImage.src = img.src;
                thumbs.forEach(t => t.classList.remove('active'));
                img.classList.add('active');
            });
        });
    }

    /* -------------------------------
       SELECTOR DE FORMATO (500g / 1kg / 2kg)
       Actualiza precio dinámicamente
    --------------------------------*/
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

    /* -------------------------------
       SELECTOR DE SABOR (select)
       (Podría usarse en el futuro para modificar stock o imagen)
    --------------------------------*/
    const saborSelect = document.getElementById('sabor');
    if (saborSelect) {
        saborSelect.addEventListener('change', () => {
            console.log(`Sabor seleccionado: ${saborSelect.value}`);
        });
    }

    /* -------------------------------
       CARRITO DE COMPRAS
    --------------------------------*/
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
