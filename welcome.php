<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../auth/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <p>Logged in as <b><?= htmlspecialchars($_SESSION["username"]); ?></b></p>
    <p>
        <a href="index.php" class="btn btn-primary">Home</a>
        <a href="auth/logout.php" class="btn btn-danger">Sign Out</a>
    </p>
</body>
</html>