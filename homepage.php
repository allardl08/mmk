<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="menu-icon" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
            <div class="logo">
                <img src="images/LOGO.png" alt="Logo" class="logo">
            </div>
            <div class="icons">
                <input type="text" id="search-input" placeholder="Search...">
                <button class="search-btn" onclick="searchItems()"><i class="fas fa-search"></i></button>
                <i class="fas fa-shopping-cart" onclick="openCart()"><span class="cart-count">0</span></i>
            </div>
        </div>
        <div class="side-menu" id="menu">
            <a href="account.php"><i class="fas fa-user"></i> My Account</a>
            <a href="#"><i class="fas fa-cog"></i> Customize</a>
            <a href="#"><i class="fas fa-shopping-bag"></i> Orders</a>
            <a href="login.php" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
        <div class="filters">
            <button onclick="filterMenu('all')">All</button>
            <button onclick="filterMenu('breakfast')">Breakfast</button>
            <button onclick="filterMenu('lunch')">Lunch</button>
            <button onclick="filterMenu('dinner')">Dinner</button>
            <button onclick="filterMenu('whats new?')">What's New?</button>
        </div>
        <div class="menu-items">
            <!-- Menu items will go here -->
            <div class="item breakfast">
                <img src="images/hotsilog.jpg" alt="Hotsilog">
                <h3>HOTSILOG</h3>
                <p>PHP 80</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>

            <!-- Item 2: LUGAW -->
            <div class="item breakfast">
                <img src="images/lugaw.jpg" alt="Lugaw">
                <h3>LUGAW</h3>
                <p>PHP 30</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                </div>
            </div>

            <!-- Item 5: Kare-Kare -->
            <div class="item dinner">
                <img src="images/kare-kare.jpg" alt="Kare-kare">
                <h3>KARE-KARE</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                   
                    
                </div>
            </div>

            <!-- Item 3: ADOBONG BABOY -->
            <div class="item dinner">
                <img src="images/adobo.jpg" alt="Adobong Baboy">
                <h3>ADOBONG BABOY</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 6: Palabok -->
            <div class="item lunch">
                <img src="images/palabok.jpg" alt="Palabok">
                <h3>PALABOK</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 7: KALDERETA -->
            <div class="item dinner">
                <img src="images/kaldereta.jpg" alt="Kaldereta">
                <h3>KALDERETA</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 8: Lumpia -->
            <div class="item lunch">
                <img src="images/lumpia.jpg" alt="Lumpia">
                <h3>LUMPIA</h3>
                <p>PHP 60 8pcs </p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 9: Barbeque -->
            <div class="item lunch">
                <img src="images/barbeque.jpg" alt="Barbeque">
                <h3>BARBEQUE</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 10: Tapsilog -->
            <div class="item breakfast">
                <img src="images/tapsilog.jpg" alt="Tapsilog">
                <h3>TAPSILOG</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 11: Tosilog -->
            <div class="item breakfast">
                <img src="images/tosilog.jpg" alt="Tosilog">
                <h3>TOSILOG</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 12: ADOBONG MANOK-->
            <div class="item dinner">
                <img src="images/adobongmanok.jpg" alt="Adobong Manok">
                <h3>ADOBONG MANOK</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 13: CHAMPORADO -->
            <div class="item breakfast">
                <img src="images/champorado.jpg" alt="Champorado">
                <h3>CHAMPORADO</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 14: SINIGANG NA BABOY -->
            <div class="item dinner">
                <img src="images/sinigang.jpg" alt="Sinigang na Baboy">
                <h3>SINIGANG NA BABOY</h3>
                <p>PHP 70</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

            <!-- Item 15: TORTANG TALONG -->
            <div class="item lunch">
                <img src="images/torta.jpg" alt="Tortang Talong">
                <h3>TORTANG TALONG</h3>
                <p>PHP 15</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

             <!-- Item 16: Chicksilog -->
             <div class="item breakfast">
                <img src="images/chicksilog.jpg" alt="Chicksilog">
                <h3>CHICKSILOG</h3>
                <p>PHP 80</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>

             <!-- Item 17: Bangsilog -->
             <div class="item breakfast">
                <img src="images/bangsilog.jpg" alt="Bangsilog">
                <h3>BANGSILOG</h3>
                <p>PHP 80</p>
                <div class="item-actions">
                    <button class="add-to-cart-btn" onclick="addToCart(this.parentElement.parentElement)"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="cart-container" id="cart-container">
        <div class="cart">
            <button class="cart-exit-btn" onclick="closeCart()"><i class="fas fa-times"></i></button>
            <h2>Shopping Cart</h2>
            <div class="cart-items" id="cart-items"></div>
            <div class="cart-total">
                <h3>Total:</h3>
                <h3 id="cart-total-price">PHP 0</h3>
            </div>
            <button class="checkout-btn" id="checkout-btn"><i class="fas fa-credit-card"></i> Checkout</button>
        </div>
    </div>

    <script>
        document.getElementById('checkout-btn').addEventListener('click', function() {
            window.location.href = 'placeorder.php';
        });
        
    </script>
    
    <script src="homepage.js"></script>
</body>
</html>
