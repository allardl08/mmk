<?php
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    // Decode the JSON data
    $cart = json_decode($data, true);

    // Save the cart data to the session
    $_SESSION['cart'] = $cart;

    // Return a success response
    echo json_encode(['success' => true]);
} else {
    // Return an error response if the request method is not POST
    echo json_encode(['success' => false]);
}
?>
