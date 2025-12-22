<?php
include '../config/database.php';

session_start();

$form_errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'register') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if ($username === '') {
        $form_errors[] = 'Username is required';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $form_errors[] = 'A valid email is required';
    }
    if ($password === '') {
        $form_errors[] = 'Password is required';
    }
    if ($password !== $confirm) {
        $form_errors[] = 'Passwords do not match';
    }

    if (empty($form_errors)) {
        if (!isset($conn) || $conn->connect_error) {
            error_log('DB connection error in auth.php: ' . ($conn->connect_error ?? 'no connection'));
            $form_errors[] = 'Database connection failed';
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = 'INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)';
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param('sss', $username, $email, $hashed_password);
                if ($stmt->execute()) {
                    header('Location: /digital-garden/digital-garden/log-in.php');
                    exit();
                } else {
                    error_log('User insert failed: ' . $stmt->error);
                    $form_errors[] = 'Could not create account (username or email may already exist)';
                }
                $stmt->close();
            } else {
                error_log('Prepare failed: ' . $conn->error);
                $form_errors[] = 'Database error';
            }
        }
    }
}

include 'register.php';

?>