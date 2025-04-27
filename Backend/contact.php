<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $feedback = $_POST['feedback'];

    // Placeholder for email sending or database storage
    echo '<p class="notification is-success">Thank you for your feedback!</p>';
}
include 'includes/header.php';
?>