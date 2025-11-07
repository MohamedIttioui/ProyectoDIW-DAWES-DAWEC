document.addEventListener("DOMContentLoaded", () => {
    // --- EXISTENTE: menú hamburguesa, etc. ---
    const menuBtn = document.querySelector(".menu-icon");
    const closeBtn = document.querySelector(".close-menu");
    const categoryNav = document.querySelector(".category-nav");

    menuBtn.addEventListener("click", () => {
        if (window.innerWidth < 1024) {
            categoryNav.classList.add("active");
            document.body.style.overflow = "hidden";
        }
    });

    closeBtn.addEventListener("click", () => {
        categoryNav.classList.remove("active");
        document.body.style.overflow = "";
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024) {
            categoryNav.classList.remove("active");
            document.body.style.overflow = "";
        }
    });

    const userMenu = document.querySelector(".user-menu");
    const userBtn = document.querySelector(".user-btn");

    if (userBtn) {
        userBtn.addEventListener("click", () => {
            userMenu.classList.toggle("active");
        });

        document.addEventListener("click", (e) => {
            if (!userMenu.contains(e.target)) {
                userMenu.classList.remove("active");
            }
        });
    }
});
