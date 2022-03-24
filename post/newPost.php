<?php
opcache_reset();

require_once "../config/sql.php";
// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../auth/login.php");
    exit;
}

$title = $desc = "";

$sessionUsername = $_SESSION["username"];
$getUsernameSql = "SELECT id FROM users WHERE username = '$sessionUsername'";
$res = mysqli_query($link, $getUsernameSql);
$sessionUserId = intval(mysqli_fetch_assoc($res)['id']);

//$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $sql = "INSERT INTO posts (title, description, user_id) VALUES (?, ?, ?)";
     
        echo var_dump(mysqli_prepare($link, $sql));
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssi", $param_title, $param_description, $param_userid);
            
            $param_title = trim($_POST["title"]);
            $param_description = trim($_POST["desc"]);
            $param_userid = $sessionUserId;

            echo $param_username . $param_title . $param_description;
            
            if(mysqli_stmt_execute($stmt)){
                echo "passed";
                echo $stmt->error;
                header("location: ../index.php");
            } else{
                echo $stmt->error;
            }

            mysqli_stmt_close($stmt);
        }
    mysqli_close($link);
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
        <a href="../index.php" class="btn btn-primary">Home</a>
        <a href="../auth/logout.php" class="btn btn-danger">Sign Out</a>
    </p>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= $title; ?>">
        </div>    
        <div class="form-group">
            <label>Description</label>
            <input type="textarea" name="desc" class="form-control" value="<?= $desc; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</body>
</html>