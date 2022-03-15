<?php
opcache_reset();

require_once "config/sql.php";

session_start();
?>


<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container d-flex justify-content-end">
        <div class="row mt-3">
            <?php if (!$_SESSION["loggedin"]): ?>
                <a href="auth/login.php" class="btn btn-primary mx-3">Ielogoties</a>
                <a href="auth/register.php" class="btn btn-primary">Reģistrēties</a>
            <?php else: ?>
                <a href="auth/logout.php" class="btn btn-danger">Sign Out</a>
            <?php endif ?>
        </div>
    </div>
  </body>
</html>