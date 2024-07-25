<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['location'] = $_POST['location'];
    $_SESSION['municipality'] = $_POST['municipality'];
    $_SESSION['district'] = $_POST['district'];
    $_SESSION['barangay'] = $_POST['barangay'];
    $_SESSION['other_details'] = $_POST['other_details'];
    
    header("Location: placeorder.php?address_saved=true");
    exit();
}
?>