<?php
session_start();

// Handle removal of items from the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_items'])) {
    foreach ($_POST['remove_items'] as $index) {
        unset($_SESSION['cart'][$index]);
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
    header("Location: placeorder.php");
    exit();
}

// Initialize total amount
$total_amount = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link rel="stylesheet" href="placeorder.css">
    <script>
        function openAddressModal() {
            document.getElementById('address-modal').style.display = 'block';
        }

        function closeAddressModal() {
            document.getElementById('address-modal').style.display = 'none';
        }

        function toggleEdit() {
            const editButton = document.getElementById('edit-button');
            const checkboxes = document.querySelectorAll('.item-checkbox');
            const selectAll = document.getElementById('select-all');

            if (editButton.innerText === 'Edit') {
                editButton.innerText = 'Remove';
                checkboxes.forEach(checkbox => checkbox.style.display = 'block');
                selectAll.style.display = 'block';
            } else {
                removeSelectedItems();
                editButton.innerText = 'Edit';
                checkboxes.forEach(checkbox => checkbox.style.display = 'none');
                selectAll.style.display = 'none';
            }
        }

        function selectAllItems() {
            const selectAllCheckbox = document.getElementById('select-all-checkbox');
            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
        }

        function removeSelectedItems() {
            const checkboxes = document.querySelectorAll('.item-checkbox:checked');
            const form = document.getElementById('order-form');
            checkboxes.forEach(checkbox => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'remove_items[]';
                input.value = checkbox.value;
                form.appendChild(input);
            });
            form.submit();
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Review Your Order</h1>

        <!-- Customized Address Button -->
        <button id="customize-address" onclick="openAddressModal()">Customized Address</button>

        <!-- Address Modal -->
        <div id="address-modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeAddressModal()">&times;</span>
                <h2>Address</h2>
                <button id="add-address" onclick="window.location.href='setaddress.php'">Add Address</button>
            </div>
        </div>

        <!-- Display Saved Address -->
        <div id="saved-address">
            <h2>Delivery Address</h2>
            <?php
            if (isset($_SESSION['location'])) {
                echo "<p>Name: " . $_SESSION['name'] . "</p>";
                echo "<p>Phone: " . $_SESSION['phone'] . "</p>";
                echo "<p>Location: " . $_SESSION['location'] . "</p>";
                echo "<p>Municipality: " . $_SESSION['municipality'] . "</p>";
                echo "<p>District: " . $_SESSION['district'] . "</p>";
                echo "<p>Barangay: " . $_SESSION['barangay'] . "</p>";
                echo "<p>Other Details: " . $_SESSION['other_details'] . "</p>";
            } else {
                echo "<p>No address selected. Please add an address.</p>";
            }
            ?>
        </div>

        <!-- Order Details Section -->
        <div id="order-details">
            <button id="edit-button" onclick="toggleEdit()">Edit</button>
            <label id="select-all" style="display: none;">
                <input type="checkbox" id="select-all-checkbox" onclick="selectAllItems()"> Select All
            </label>
            <form id="order-form" method="POST" action="placeorder.php">
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    foreach ($_SESSION['cart'] as $index => $item) {
                        $total_amount += $item['price'] * $item['quantity'];
                        echo "<div class='order-item'>";
                        echo "<input type='checkbox' class='item-checkbox' value='{$index}' style='display: none;'>";
                        echo "<img src='{$item['image']}' alt='{$item['name']}'>";
                        echo "<div class='item-details'>";
                        echo "<h2>{$item['name']}</h2>";
                        echo "<p>Price: PHP " . number_format($item['price'], 2) . "</p>";
                        echo "<p>Quantity: {$item['quantity']}</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Your cart is empty.</p>";
                }
                ?>
            </form>
        </div>

        <!-- Total Amount Section -->
        <div id="total-amount">
            <h2>Total Amount: PHP <?php echo number_format($total_amount, 2); ?></h2>
        </div>

        <!-- Payment Method Section -->
        <div id="payment-method">
            <h2>Select Payment Method</h2>
            <form action="confirm_order.php" method="POST">
                <label for="payment-cod">
                    <input type="radio" id="payment-cod" name="payment_method" value="COD" required> Cash on Delivery (COD)
                </label>
                <br>
                <label for="payment-gcash">
                    <input type="radio" id="payment-gcash" name="payment_method" value="GCash" required> GCash
                </label>
                <br>
                <button type="submit" id="confirm-order">Confirm Order</button>
            </form>
        </div>

        <?php
        if (isset($_GET['order_confirmed']) && $_GET['order_confirmed'] === 'true') {
            echo "<p class='success-message'>Order confirmed successfully!</p>";
        }
        ?>
    </div>
</body>
</html>
