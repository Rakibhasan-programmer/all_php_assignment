<?php

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usersData = file_get_contents('users.json');
    $users = json_decode($usersData, true);

    $error = true;

    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $error = false;
            // Set up a session
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];

            // Redirect based on user role
            if ($user['role'] === 'admin') {
                header('Location: role_management.php');
            } else {
                header('Location: index.php');
            }
            exit();
        }
    }
    if ($error)
        $errorMessage = "Invalid email or password";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container pt-5 ">
        <div class="w-50 mx-auto border border-1 shadow-lg py-5">
            <h1 class="text-center">Welcome to Login</h1>
            <form class="w-75 mx-auto pt-2" action="login.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <p class="text-danger">
                    <?php echo $errorMessage; ?>
                </p>
                <button type="submit" class="btn btn-primary">Login</button>
                <p class="text-center pt-2">Don't have account? <a href="register.php" class="text-primary">register</a>
                </p>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>