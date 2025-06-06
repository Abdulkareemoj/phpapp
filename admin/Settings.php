<?php
include '../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <?php include '../includes/shared/header.php' ;?>
    <!-- Top Navigation Code -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include '../includes/admin//sidebar.php' ;?>

            <!-- Sidebar Code -->
        </div>
        <div id="layoutSidenav_content">
            <main>
                <!-- Add content here -->
                Settings
            </main><?php include '../includes/shared/footer.php' ;?>
        </div>
    </div>
    </div><?php include '../includes/scripts.php' ;?>
</body>

</html>