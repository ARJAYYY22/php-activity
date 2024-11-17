<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login Page</title>
</head>
<body>
<div class="container">

    <?php
    $users = [
        ["User Type" => "Admin", "Username" => "admin", "Password" => "Pass1234"],
        ["User Type" => "Admin", "Username" => "mark", "Password" => "Pogi1234"],
        ["User Type" => "Content Manager", "Username" => "pepito", "Password" => "manaloto"],
        ["User Type" => "Content Manager", "Username" => "juan", "Password" => "delacruz"],
        ["User Type" => "System User", "Username" => "pedro", "Password" => "penduko"]
    ];
    
    $message = "";
    $alertClass = "alert-info";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $selectedAccount = $_POST["Accounts"];
        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        $isValid = false;
        foreach ($users as $user) {
            if ($user["User Type"] === $selectedAccount && $user["Username"] === $enteredUsername && $user["Password"] === $enteredPassword) {
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

  
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>

        <form class="form-signin" method="post">
            <select name="Accounts" class="form-control" id="Accounts" required>
                <option value="">Select Account Type</option>
                <option value="Admin">Admin</option>
                <option value="Content Manager">Content Manager</option>
                <option value="System User">System User</option>
            </select>
            
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
        </form>
    </div>
</div>
</body>
</html>
