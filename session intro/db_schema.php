<?php

    $server_name = 'localhost';
    $user_name = 'root';
    $password = '';
    $db_name = 'auth';

    $conn = mysqli_connect($server_name,$user_name,$password);
    if($conn){
        echo "<h1>Server Connection Successfull!</h1>";
    }
    else{
        echo "<h1>Server Connection Error!</h1>";
    }

    $sql = 'CREATE DATABASE '.$db_name;
    if($result = mysqli_query($conn,$sql)){
        echo '<h2>Success! DB Creation Connection</h2>';
    }
    else{
        echo '<h2>Error! DB Creation Connection</h2>';
    }

    $conn = mysqli_connect($server_name,$user_name,$password,$db_name);
    if($conn){
        echo "<h1>DB Connection Successfull!</h1>";
    }
    else{
        echo "<h1>DB Connection Error!</h1>";
    }

    $sql="CREATE TABLE `users` (`sr` INT NOT NULL AUTO_INCREMENT , `user_name` VARCHAR(20) NOT NULL , `pass` VARCHAR(20) NOT NULL , PRIMARY KEY (`sr`), UNIQUE (`user_name`));";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<h1>Table Creation Successfull!</h1>";
    }
    else{
        echo "<h1>Table Creation Error!</h1>";
    }
?>