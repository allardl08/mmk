<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MMK</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="x-icon" href="images/LOGO.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons&display=swap">
</head>
<body>
<header>
    <nav class="navbar">
        <a class="logo" href="#"><img src="images/LOGO.png" alt="MMK Logo"></a>
        <ul class="menu-links">
            <span id="close-menu-btn" class="material-symbols-outlined">close</span>
            <li><a href="#">Home</a></li>
            <li><a href="#contact-us">Contact us</a></li>
            <li><a href="#about-us">About us</a></li> 
            <li><a href="login.php">SignUp/Login</a></li>
        </ul>
        <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav>
</header>

<section class="hero-section">
    <div class="content">
        <h2>Welcome to MMK</h2>
        <p>
            Discover the irresistible flavors of MMK's delicious fast food. 
        </p>
        <button id="order-now-btn">Order Now</button>
    </div>
</section>

<section id="contact-us" class="contact-us-section">
    <div class="contact-us-content">
        <h2>Contact Us</h2>
        <p>
            For inquiries or feedback, you can reach us using the following contact details:
        </p>
        <ul>
            <li>
                <span class="material-icons">email</span>
                <a href="mailto:mmk@gmail.com">mmk@gmail.com</a>
            </li>
            <li>
                <span class="material-icons">phone</span>
                <a href="tel:+09145536821">0914 553 6821</a>
            </li>
            <li>
                <span class="material-icons">facebook</span>
                <a href="https://web.facebook.com/rondillasfastfood.linas" target="_blank">Rondilla's FastFood Linas</a>
            </li>
        </ul>
    </div>
</section>

<section id="about-us" class="about-us-section">
    <div class="content">
        <h2>About Us</h2>
        <p>
            Welcome to Rondelina's Fast Food, a cherished institution in Calatagan, Batangas. Rondelina's fast food is a well-known fast food restaurant in Calatagan, Batangas. In 2005, they launched their tiny business and named it Linas Restaurants after their family name. 
        </p>
        <img src="images/about.png" alt="Rondelina's Fast Food" class="about-us-img">
    </div>
</section>

<script>
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
</script>

<script src="index.js"></script>
</body>
</html>
