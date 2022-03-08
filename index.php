<?php
opcache_reset();

require_once "config/sql.php";

session_start();

$sql = "SELECT * FROM posts";
$res = mysqli_query($link, $sql);
?>


<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="container">
      <div class="row text-center">
          <?php if ($_SESSION["loggedin"]): ?>
            <a href="../post/newPost.php" class="btn btn-success">New Post</a>
          <?php endif ?>
      </div>      
      <div class="row">      
          <?php while ($r = mysqli_fetch_assoc($res)) { ?>
              <div class="col-4 border text-center">
                <!-- <div class="row"><?= $r['id'] ?></div> -->
                <p><?= $r['title'] ?></p>
                <p><img src="assets/images/exercises/placeholder.png" class="img-fluid"></img></p>
                <p><?= $r['description'] ?></p>
                <p><?= $r['created_at'] ?></p>
              </div> 
          <?php } ?>
      </div>  
    </div>
  </body>
</html>