<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Role-based access control
$role = $_SESSION['role'];

if ($role === 'admin') {
    // Redirect to admin dashboard or allow access to admin-only features
    header("Location: /admin/index.php");
    exit;
} elseif ($role === 'organizer') {
    // Redirect to organizer dashboard or allow access to organizer-only features
    header("Location: /organizer/index.php");
    exit;
} else {
    // Redirect to user dashboard for regular users or allow access to user-only features
    header("Location: /user/index.php");
    exit;
}
?>