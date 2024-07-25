<?php
// Handle changing user's password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["current-password"]) && isset($_POST["new-password"]) && isset($_POST["confirm-password"])) {
    $currentPassword = $_POST["current-password"];
    $newPassword = $_POST["new-password"];
    $confirmPassword = $_POST["confirm-password"];
    
    // Validate passwords and handle change
    if ($newPassword === $confirmPassword) {
        // Assuming you have a session and database setup
        session_start();
        $userId = $_SESSION["user_id"]; // Adjust accordingly based on your session variable
        
        // Connect to your database and update user's password securely
        // Example: Update user's password in users table (with password hashing)
        // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        // $sql = "UPDATE users SET password='$hashedPassword' WHERE id='$userId'";
        // Execute your SQL query here
        
        // Example response
        if ($sql_executed_successfully) {
            echo "Password changed successfully!";
        } else {
            echo "Error changing password: " . mysqli_error($conn); // Adjust for your database connection
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>
