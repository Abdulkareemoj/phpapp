<?php
// Include the database connection
require_once '../includes/constants.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Check if login is an email or username and prepare the appropriate query
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT id, username, email, password, role FROM users WHERE email = '$login'";
        } else {
            $query = "SELECT id, username, email, password, role FROM users WHERE username = '$login'";
        }

        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $password_hash = $row['password'];
            $role = $row['role'];

            if (password_verify($password, $password_hash)) {
                session_start();
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['email'] = $email;

                // Redirect based on user role
                if ($role === 'admin') {
                    header("Location: /admin/index.php");
                } elseif ($role === 'organizer') {
                    header("Location: /organizer/index.php");
                } else {
                    header("Location: /dashboard/index.php");
                }
                exit;
            } else {
                $alert = [
                    'icon' => 'error',
                    'title' => 'Login Failed',
                    'text' => 'Incorrect password.'
                ];
            }
        } else {
            $alert = [
                'icon' => 'error',
                'title' => 'Login Failed',
                'text' => 'No user found with that email or username.'
            ];
        }
    } else {
        $alert = [
            'icon' => 'warning',
            'title' => 'Incomplete Fields',
            'text' => 'Please fill in all fields.'
        ];
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
    <title>Login - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

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
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Display error message if login fails -->
                                    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="login" type="text" name="login"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password"
                                                placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="/auth/forgot_password.php">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="/auth/register.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php include '../includes/shared/footer.php' ;?>
        </div>
    </div>
    <?php include '../includes/scripts.php' ;?>
    <?php if (isset($alert)): ?>
    <script>
    Swal.fire({
        icon: '<?= $alert['icon'] ?>',
        title: '<?= $alert['title'] ?>',
        text: '<?= $alert['text'] ?>',
    });
    </script>
    <?php endif; ?>

</body>

</html>