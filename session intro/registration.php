<?php
    require_once 'db_conn.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $Username = $_POST['user_name'];
    $Password = $_POST['pass'];
    $C_Password = $_POST['c_pass'];
    if($Password==$C_Password){
        $sql = "SELECT * FROM users WHERE user_name = '$Username'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==0){
            $sql="INSERT INTO `users` (`user_name`, `pass`) VALUES ('$Username','$Password');";
            $result = mysqli_query($conn,$sql);
            header('location:login.php');
        }
        else{
            $err="Username already exists.";
        }
    }
    else{
        $err = 'Password not matched.';
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/session%20intro/css/style.css">
    <title>Registration</title>
</head>
<body>
    <div class="cont">
        <h1>Registration</h1>
        <form action="registration.php" method="post">
            <?php
                if(isset($err)){
                    echo "<div class='form-group err'><p>$err</p></div>";
                }
            ?>
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label for="c_pass">Confirm Password</label>
                <input type="password" name="c_pass" id="c_pass" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
        <hr>
        <a href="login.php"><button>Log in</button></a>
    </div>
</body>
</html>