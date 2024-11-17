<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Login Page</title>
    <style>
        body {
            background: linear-gradient(135deg, #f3f4f6, #e9ecef);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 30px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-signin {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .btn-signin:hover {
            background-color: #218838;
        }
        .alert {
            margin-top: 15px;
            border-radius: 8px;
        }
        #profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="text-center mb-4">
        <!-- Profile Picture -->
        <img id="profile-img" src="images/profile.jpg" class="img-fluid rounded-circle" alt="Profile Image" />
    </div>

    <?php
    // Define an array of users
    $users = [
        ["User Type" => "Admin", "Username" => "admin", "Password" => password_hash("Pass1234", PASSWORD_DEFAULT)],
        ["User Type" => "Admin", "Username" => "mark", "Password" => password_hash("Pogi1234", PASSWORD_DEFAULT)],
        ["User Type" => "Content Manager", "Username" => "pepito", "Password" => password_hash("manaloto", PASSWORD_DEFAULT)],
        ["User Type" => "Content Manager", "Username" => "juan", "Password" => password_hash("delacruz", PASSWORD_DEFAULT)],
        ["User Type" => "System User", "Username" => "pedro", "Password" => password_hash("penduko", PASSWORD_DEFAULT)]
    ];

    $message = "";
    $alertClass = "alert-info";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $selectedAccount = $_POST["Accounts"];
        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        $isValid = false;
        foreach ($users as $user) {
            if (
                $user["User Type"] === $selectedAccount &&
                $user["Username"] === $enteredUsername &&
                password_verify($enteredPassword, $user["Password"])
            ) {
                $isValid = true;
                $message = "Welcome to the system, " . htmlspecialchars($user["Username"]) . "!";
                break;
            }
        }

        if (!$isValid) {
            $message = "Incorrect username or password.";
            $alertClass = "alert-danger";
        }
    }
    ?>

    <?php if ($message): ?>
        <div class="alert <?php echo $alertClass; ?> text-center"><?php echo $message; ?></div>
    <?php endif; ?>

    <!-- Login Form -->
    <form method="post">
        <div class="mb-3">
            <select name="Accounts" class="form-select" id="Accounts" required>
                <option value="">Select Account Type</option>
                <option value="Admin">Admin</option>
                <option value="Content Manager">Content Manager</option>
                <option value="System User">System User</option>
            </select>
        </div>

        <div class="mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-lg btn-signin w-100" type="submit">Sign in</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
