<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    // No active session, send to login page
    header("Location: /auth/login.php");
    exit;
}

// Role-based access control
$role = $_SESSION['role'] ?? null; // Safely get the role, if set

// Get the current page's script name and directory
$currentDir = basename(dirname($_SERVER['PHP_SELF']));

// Check the user role and the directory they are trying to access
if ($role === 'admin' && $currentDir !== 'admin') {
    // Admin trying to access a page outside the 'admin' folder
    header("Location: /admin/index.php");
    exit;
} elseif ($role === 'organizer' && $currentDir !== 'organizer') {
    // Organizer trying to access a page outside the 'organizer' folder
    header("Location: /organizer/index.php");
    exit;
} elseif ($role === 'user' && $currentDir !== 'dashboard') {
    // Regular user trying to access a page outside the 'dashboard' folder
    header("Location: /dashboard/index.php");
    exit;
} elseif (!$role) {
    // Invalid role or unauthorized access, redirect to 401 page
    header("Location: /error/401.php");
    exit;
}
?>