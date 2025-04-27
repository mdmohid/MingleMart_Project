<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        // Placeholder for database insertion
        // In a real application, you would hash the password and insert into the database
        $_SESSION['user'] = $email;
        header('Location: index.php');
        exit;
    } else {
        echo '<p class="notification is-danger">Passwords do not match.</p>';
    }
}
include 'includes/header.php';
?>