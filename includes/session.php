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

// Get the current page's script name
$currentPage = basename($_SERVER['PHP_SELF']);

if ($role === 'admin' && $currentPage !== 'index.php') {
    // Admin access, redirect to admin dashboard only if not already there
    header("Location: /admin/index.php");
    exit;
} elseif ($role === 'organizer' && $currentPage !== 'index.php') {
    // Organizer access, redirect to organizer dashboard only if not already there
    header("Location: /organizer/index.php");
    exit;
} elseif ($role === 'user' && $currentPage !== 'index.php') {
    // Regular user access, redirect to user dashboard only if not already there
    header("Location: /dashboard/index.php");
    exit;
} elseif (!$role) {
    // Invalid role or unauthorized access, redirect to 401 page
    header("Location: /error/401.php");
    exit;
}
?>