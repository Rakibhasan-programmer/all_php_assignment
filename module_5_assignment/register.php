<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usersData = file_get_contents('users.json');
    $users = json_decode($usersData, true);

    $users[] = array(
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'role' => 'user'
    );

    file_put_contents('users.json', json_encode($users));

    header('Location: login.php');
    exit();
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
            <h1 class="text-center">Welcome to Register</h1>
            <form class="w-75 mx-auto pt-2" action="register.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="text-center pt-2">Already have account? <a href="login.php" class="text-primary">Login</a>
            </p>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>