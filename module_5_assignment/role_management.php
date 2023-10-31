<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$usersData = file_get_contents('users.json');
$users = json_decode($usersData, true);

$allRoles = array_column($users, 'role');

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION['role'] === 'admin') {
        $updatedRoles = $_POST['roles'];

        if (count($updatedRoles) > 0) {
            $updatedRoles = array_map('trim', $updatedRoles);

            for ($i = 0; $i < count($allRoles); $i++) {
                $role = $updatedRoles[$i] ?? 'user';
                $users[$i]['role'] = $role;
            }

            file_put_contents('users.json', json_encode($users));
        }
    } else {
        $errorMessage = "Only admins can update roles.";
    }
}
// logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container pt-5">
        <div class="w-75 mx-auto border border-1 shadow-lg py-5">
            <h1 class="text-center">Role Management</h1>
            <form class="w-75 mx-auto pt-2" action="role_management.php" method="POST">
                <div class="mb-3">
                    <label for="roleList" class="form-label">Update Roles</label>
                    <?php foreach ($allRoles as $role): ?>
                        <div class="input-group mb-3">
                            <label for="roles" class="input-group-text">Role</label>
                            <select name="roles[]" class="form-select">
                                <option value="admin" <?php if ($role === 'admin')
                                    echo 'selected'; ?>>Admin</option>
                                <option value="user" <?php if ($role === 'user')
                                    echo 'selected'; ?>>User</option>
                            </select>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p class="text-danger">
                    <?php echo $errorMessage; ?>
                </p>
                <button type="submit" class="btn btn-primary">Update Roles</button>
            </form>
            <div class="d-flex justify-content-end pe-5">
                <form action="role_management.php" method="GET">
                    <button type="submit" name="logout" class="btn btn-danger mt-3">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>