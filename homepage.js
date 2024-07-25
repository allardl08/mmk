function logout() {
    // You can add any logout logic here if needed, like clearing session data

    // Redirect to login.php
    window.location.href = 'login.php';
}

// Toggle side menu
function toggleMenu() {
    document.getElementById('menu').classList.toggle('active');
}

// Search items
function searchItems() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const items = document.querySelectorAll('.menu-items .item');

    items.forEach(item => {
        const itemName = item.querySelector('h3').textContent.toLowerCase();
        if (itemName.includes(searchInput)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

// Filter menu items
function filterMenu(category) {
    const items = document.querySelectorAll('.menu-items .item');
    items.forEach(item => {
        if (category === 'all' || item.classList.contains(category)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

// Add to cart
let cart = [];
function addToCart(itemElement) {
    const itemName = itemElement.querySelector('h3').textContent;
    const itemPrice = parseInt(itemElement.querySelector('p').textContent.replace('PHP ', ''));
    const itemImage = itemElement.querySelector('img').src;
    const itemQuantity = 1;  // Default to 1 when adding to cart

    const existingItem = cart.find(item => item.name === itemName);
    if (existingItem) {
        existingItem.quantity += itemQuantity;
    } else {
        cart.push({ name: itemName, price: itemPrice, image: itemImage, quantity: itemQuantity });
    }
    updateCart();
}

// Update cart
function updateCart() {
    const cartContainer = document.getElementById('cart-items');
    cartContainer.innerHTML = '';

    let total = 0;
    cart.forEach(item => {
        total += item.price * item.quantity;

        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item-details">
                <h4>${item.name}</h4>
                <p>PHP ${item.price}</p>
                <div class="cart-quantity">
                    <button class="quantity-btn" onclick="decrementCartItemQuantity('${item.name}')">-</button>
                    <span class="quantity-number">${item.quantity}</span>
                    <button class="quantity-btn" onclick="incrementCartItemQuantity('${item.name}')">+</button>
                </div>
            </div>
            <button class="remove-btn" onclick="removeFromCart('${item.name}')"><i class="fas fa-trash"></i></button>
        `;
        cartContainer.appendChild(cartItem);
    });

    document.querySelector('.cart-count').textContent = cart.length;
    document.getElementById('cart-total-price').textContent = `PHP ${total}`;
}

// Remove from cart
function removeFromCart(itemName) {
    cart = cart.filter(item => item.name !== itemName);
    updateCart();
}

// Increment cart item quantity
function incrementCartItemQuantity(itemName) {
    const cartItem = cart.find(item => item.name === itemName);
    if (cartItem) {
        cartItem.quantity++;
        updateCart();
    }
}

// Decrement cart item quantity
function decrementCartItemQuantity(itemName) {
    const cartItem = cart.find(item => item.name === itemName);
    if (cartItem && cartItem.quantity > 1) {
        cartItem.quantity--;
        updateCart();
    }
}

// Open cart
function openCart() {
    document.getElementById('cart-container').style.display = 'block';
}

// Close cart
function closeCart() {
    document.getElementById('cart-container').style.display = 'none';
}

// Save cart and proceed to checkout
document.getElementById('checkout-btn').addEventListener('click', function() {
    const cartData = JSON.stringify(cart);

    fetch('save_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: cartData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'placeorder.php';
        } else {
            alert('Failed to save cart data');
        }
    })
    .catch(error => console.error('Error:', error));
});