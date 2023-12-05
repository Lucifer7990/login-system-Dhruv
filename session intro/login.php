<?php
    require_once 'db_conn.php';
    session_start();
    $err;
    // check coockie for login
    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
        //fatch data from database and start session
        $query = "SELECT * FROM users WHERE sr = $user_id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_name'] = $row['user_name'];
        header("location:welcome.php");
    }
    else{
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $userName = $_POST['user_name'];
            $query = "SELECT * FROM users WHERE user_name = '$userName'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            echo var_dump($row);
            if(mysqli_num_rows($result)>0){
                if($row['pass']==$_POST['pass']){
                    $_SESSION['user_name'] = $row['user_name'];
                    setcookie('user_id', $row['sr'],time()+46000,'/session%20intro','localhost');
                    header("location:welcome.php");
                }
                else{
                    $err = "Invalid Password";
                }
            }
            else{
                $err = "Invalid Username OR Not Registered";
            }
            
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
    <title>Login</title>
</head>
<body>
    <div class="cont">
        <h1>Login</h1>
        <form action="" method="post">
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
                <input type="submit" value="Log in">
            </div>
        </form>
        <hr>
        <a href="registration.php"><button>New User</button></a>
    </div>
</body>
</html>