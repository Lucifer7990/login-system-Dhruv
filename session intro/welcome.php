<?php
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header('location:login.php');   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/session%20intro/css/w-style.css">
    <title>Welcome</title>
</head>
<body>
    <div class="card">
        <div class="card-img">
            <img src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="">
        </div>
        <div class="card-text">
            <h2>Welcome <?php echo $_SESSION['user_name']; ?></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, possimus?</p>
        </div>
        <a href="logout.php"><div class="card-btn">Log out</div></a>
    </div>
</body>
</html>