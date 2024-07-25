document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector("header");
    const hamburgerBtn = document.querySelector("#hamburger-btn");
    const closeMenuBtn = document.querySelector("#close-menu-btn");
    const orderNowBtn = document.querySelector("#order-now-btn");

    hamburgerBtn.addEventListener("click", () => {
        header.classList.toggle("show-mobile-menu");
    });

    closeMenuBtn.addEventListener("click", () => {
        header.classList.toggle("show-mobile-menu");
    });

    orderNowBtn.addEventListener("click", () => {
        window.location.href = 'login.php';
    });
});
