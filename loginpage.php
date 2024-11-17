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

  