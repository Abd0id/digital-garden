<?php

// Database configuration with debug-friendly connection attempts.
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: 'root';
$db_name = getenv('DB_NAME') ?: 'digital_garden';

// Try hosts in order: configured host (often 'localhost' using socket) then 127.0.0.1 (forces TCP).
$try_hosts = [$db_host, '127.0.0.1'];
$conn = null;
foreach ($try_hosts as $host) {
    $conn = new mysqli($host, $db_user, $db_pass, $db_name);
    if (!$conn->connect_error) {
        break;
    }
    error_log("MySQL connect to {$host} failed: " . $conn->connect_error);
}

if ($conn->connect_error) {
    error_log('MySQL connection final error: ' . $conn->connect_error);
}

?>