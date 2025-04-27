<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Placeholder for database check
    // In a real application, you would query the database to verify the user
    if ($email === 'test@gmail.com' && $password === 'password') {
        $_SESSION['user'] = $email;
        header('Location: index.php');
        exit;
    } else {
        echo '<p class="notification is-danger">Invalid email or password.</p>';
    }
}
include 'includes/header.php';
?>