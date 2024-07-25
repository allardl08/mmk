<?php
session_start();

// Check if cart, address, or payment method is missing
if (!isset($_SESSION['cart']) || empty($_SESSION['cart']) || !isset($_SESSION['location']) || !isset($_POST['payment_method'])) {
    header("Location: placeorder.php");
    exit();
}

// Calculate total amount
$total_amount = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_amount += $item['price'] * $item['quantity'];
}

// Store selected payment method
$payment_method = $_POST['payment_method'];

// Get address details from session
$address = [
    'name' => $_SESSION['name'],
    'phone' => $_SESSION['phone'],
    'location' => $_SESSION['location'],
    'municipality' => $_SESSION['municipality'],
    'district' => $_SESSION['district'],
    'barangay' => $_SESSION['barangay'],
    'other_details' => $_SESSION['other_details']
];

// Clear cart after order confirmation
$ordered_items = $_SESSION['cart'];
unset($_SESSION['cart']);
unset($_SESSION['location']);
unset($_SESSION['municipality']);
unset($_SESSION['district']);
unset($_SESSION['barangay']);
unset($_SESSION['other_details']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="confirm_order.css">
</head>
<body>
    <div class="container">
        <h1>Order Confirmation</h1>

        <!-- Display Selected Address -->
        <div id="selected-address">
            <h2>Delivery Address</h2>
            <?php if ($address): ?>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($address['name']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($address['phone']); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($address['location']); ?></p>
                <p><strong>Municipality:</strong> <?php echo htmlspecialchars($address['municipality']); ?></p>
                <p><strong>District:</strong> <?php echo htmlspecialchars($address['district']); ?></p>
                <p><strong>Barangay:</strong> <?php echo htmlspecialchars($address['barangay']); ?></p>
                <p><strong>Other Details:</strong> <?php echo htmlspecialchars($address['other_details']); ?></p>
            <?php else: ?>
                <p>no address provided.</p>
            <?php endif; ?>
        </div>

        <!-- Display Ordered Items -->
        <div id="ordered-items">
            <h2>Ordered Items</h2>
            <?php if ($ordered_items && count($ordered_items) > 0): ?>
                <?php foreach ($ordered_items as $item): ?>
                    <div class="item">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        <div class="item-details">
                            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                            <p>Price: PHP <?php echo number_format($item['price'], 2); ?></p>
                            <p>Quantity: <?php echo htmlspecialchars($item['quantity']); ?></p>
                            <p>Total: PHP <?php echo number_format($item['price'] * $item['quantity'], 2); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>

        <!-- Display Payment Method -->
        <div id="payment-method">
            <h2>Payment Method</h2>
            <p><?php echo htmlspecialchars($payment_method); ?></p>
        </div>

        <!-- Display Total Amount -->
        <div id="total-amount">
            <h2>Total Amount: PHP <?php echo number_format($total_amount, 2); ?></h2>
        </div>

        <!-- Confirmation Message -->
        <p class="confirmation-message">Thank you for your order! Your order has been confirmed.</p>

        <!-- Back to Homepage Button -->
        <a href="index.php" class="back-button">Back to Homepage</a>
    </div>
</body>
</html>
