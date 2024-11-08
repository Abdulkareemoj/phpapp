<?php
require_once 'includes/constants.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists; proceed with password reset
        $reset_token = bin2hex(random_bytes(16));
        $created_at = date('Y-m-d H:i:s');

        // Insert token into password_resets table
        $stmt = $conn->prepare("INSERT INTO password_resets (email, reset_token, created_at) VALUES (?, ?, ?)
                                ON DUPLICATE KEY UPDATE reset_token = VALUES(reset_token), created_at = VALUES(created_at)");
        $stmt->bind_param("sss", $email, $reset_token, $created_at);
        $stmt->execute();

        $reset_link = "http://phpapp.test/password_reset.php?token=" . $reset_token;

        // Send the email
        $to = $email;
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: " . $reset_link;
        $headers = "From: no-reply@example.com";

        mail($to, $subject, $message, $headers);

        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Email Sent!',
                    text: 'A password reset link has been sent to your email.'
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No account found with that email address.'
                });
              </script>";
    }

    $stmt->close();
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
    <title>Forgot Password - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
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
                                    <h3 class="text-center font-weight-light my-4">Forgot Password</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your email address and we will send you a
                                        link to reset your password.</div>
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" type="email"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login.php">Return to login</a>
                                            <button type="submit" class="btn btn-primary" href="forgot_password">Send
                                                Link</button>
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
            <?php include 'includes/footer.php' ;?>
        </div>
    </div>
    <?php include 'includes/scripts.php' ;?>
</body>

</html>