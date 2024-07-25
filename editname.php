<?php
// Handle updating user's name
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new-name"])) {
    $newName = $_POST["new-name"];
    
    // Assuming you have a session and database setup
    session_start();
    $userId = $_SESSION["user_id"]; // Adjust accordingly based on your session variable
    
    // Connect to your database and update user's name
    // Example: Update user's name in users table
    // $sql = "UPDATE users SET name='$newName' WHERE id='$userId'";
    // Execute your SQL query here
    
    // Example response
    if ($sql_executed_successfully) {
        echo "Name updated successfully!";
    } else {
        echo "Error updating name: " . mysqli_error($conn); // Adjust for your database connection
    }
}
?>
