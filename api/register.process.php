<?php

require_once "../config/database.php";
// Built variable 
// POST, 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $password);
    
    if($stmt->execute()) {
        $_SESSION['message'] = "Registration successful!";
        $_SESSION['type'] = "success";
        header("Location: ../index.php");
        exit();
    }else {
        $_SESSION['message'] = "Registration failed: " . $stmt->error;
        $_SESSION['type'] = "error";
        header("Location: ../index.php");
        exit();
    }
}