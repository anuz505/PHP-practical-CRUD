<?php
require_once 'config.php';

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$errors = [];

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Handle file upload
    if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['profile_photo']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if(in_array(strtolower($filetype), $allowed)) {
            $newname = "uploads/" . uniqid() . "." . $filetype;
            if(move_uploaded_file($_FILES['profile_photo']['tmp_name'], $newname)) {
                $stmt = $pdo->prepare("UPDATE users SET profile_photo = ? WHERE id = ?");
                $stmt->execute([$newname, $_SESSION['user_id']]);
            }
        } else {
            $errors[] = "Invalid file type. Only JPG, JPEG, and PNG are allowed.";
        }
    } else {
        $errors[] = "Profile photo is required.";
    }
    
    // Update user information
    if(empty($errors)) {
        $stmt = $pdo->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ? WHERE id = ?");
        $stmt->execute([$firstName, $lastName, $email, $phone, $_SESSION['user_id']]);
        
        // Refresh user data
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
        
        $success = "Profile updated successfully!";
    }
}
include 'views/profile.view.php';