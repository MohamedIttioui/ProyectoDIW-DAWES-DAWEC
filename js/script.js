document.addEventListener("DOMContentLoaded", () => {
    const menuBtn = document.querySelector(".menu-icon");
    const closeBtn = document.querySelector(".close-menu");
    const categoryNav = document.querySelector(".category-nav");

    // Abrir menú
    menuBtn.addEventListener("click", () => {
        if (window.innerWidth < 1024) {
            categoryNav.classList.add("active");
            document.body.style.overflow = "hidden"; // Evita scroll del body
        }
    });

    // Cerrar menú
    closeBtn.addEventListener("click", () => {
        categoryNav.classList.remove("active");
        document.body.style.overflow = ""; // Restaura scroll
    });

    // Cerrar al cambiar de tamaño a desktop
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            categoryNav.classList.remove("active");
            document.body.style.overflow = "";
        }
    });
});


