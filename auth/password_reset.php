<?php
require_once '../includes/constants.php';
if (!isset($_GET['token']) || empty($_GET['token'])) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Token',
                    text: 'Password reset token is missing.'
                }).then(() => {
                    window.location.href = 'forgot_password.php';
                });
            });
          </script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['token'])) {
    $token = $_GET['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate if passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Passwords do not match.'
                });
              </script>";
    } else {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Check if the token exists in the password_resets table
        $stmt = $conn->prepare("SELECT email FROM password_resets WHERE reset_token = ? AND created_at > NOW() - INTERVAL 1 HOUR");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Token is valid, update the password in the users table
            $stmt = $conn->prepare("UPDATE users u JOIN password_resets pr ON u.email = pr.email SET u.password = ? WHERE pr.reset_token = ?");
            $stmt->bind_param("ss", $hashed_password, $token);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Updated',
                            text: 'Your password has been successfully reset. You can now log in.'
                        }).then(() => {
                            window.location.href = 'login.php';
                        }); });
                      </script>";
            } else {
                echo "<script>
                   document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again.'
                        }); });
                      </script>";
            }
        } else {
            echo "<script>
               document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Token',
                        text: 'The reset link is invalid or expired.'
                    }); });
                  </script>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reset Password</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Reset Password</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your new password.</div>
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                name="new_password" placeholder="New Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputConfirmPassword" type="password"
                                                name="confirm_password" placeholder="Confirm Password" required />
                                            <label for="inputConfirmPassword">Confirm Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login.php">Return to login</a>
                                            <button type="submit" class="btn btn-primary">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php include '../includes/shared/footer.php'; ?>
        </div>
    </div>
    <?php include '../includes/scripts.php'; ?>
</body>

</html>