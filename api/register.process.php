<?php

session_start();

require_once "../config/database.php";
// Built variable 
// POST,GET, PUT,DELETE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = $_POST['fullname']; // Alfren Alvaran
    $email = $_POST['email']; // email
    $password = $_POST['password']; // 1234


    

    // email uniqueness check
    // SELECT * FROM users WHERE email = ?
    // If exists, redirect back with error message




    $encrypted = password_hash($password, PASSWORD_BCRYPT); 
    // 1234 => jnsckjnsdcnSIUvnpnvnzdnv

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $encrypted);

    
    if ($stmt->execute()) {

        $_SESSION['message'] = "Registration successful!";
        $_SESSION['type'] = "success";
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['message'] = "Registration failed: " . $stmt->error;
        // Error: Duplicate entry  for key 'email' 
        $_SESSION['type'] = "error";
        header("Location: ../index.php");
        exit();
    }
}
