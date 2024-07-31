<?php
session_start();

// Clear cart and other order-related session variables
unset($_SESSION['cart']);
unset($_SESSION['location']);
unset($_SESSION['municipality']);
unset($_SESSION['district']);
unset($_SESSION['barangay']);
unset($_SESSION['other_details']);


$messages = [
    "You have canceled your order. Feel free to explore more delicious options!",
    
    "Your order has been canceled. Hope to serve you again soon!",
    
    "You've canceled your order. Check out our menu for other tasty choices!"
];


$random_message = $messages[array_rand($messages)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Canceled</title>
    <link rel="stylesheet" href="confirm_order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
    
        <!-- Back Button -->
        <button class="back-button" onclick="window.location.href='homepage.php'">
            <i class="fas fa-arrow-left"></i>
        </button>
        <h1>Order Canceled</h1>

        <!-- Display Random Cancellation Message -->
        <p class="cancel-message"><?php echo htmlspecialchars($random_message); ?></p>

        <!-- Back to Homepage Button -->
        <a href="homepage.php" class="back-button">Back to Food Menu</a>
    </div>
</body>
</html>
