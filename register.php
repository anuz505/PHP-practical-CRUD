<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if($stmt->fetch()) {
        $errors[] = "Email already registered";
    }

    // Validate password
    if(strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

  

    // If no errors, create the user
    if(empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$firstName, $lastName, $email, $hashedPassword]);
            
            // Log the user in
            $_SESSION['user_id'] = $pdo->lastInsertId();
            header("Location: profile.php");
            exit();
        } catch(PDOException $e) {
            $errors[] = "Registration failed. Please try again.";
        }
    }
}
include 'views/register.view.php';