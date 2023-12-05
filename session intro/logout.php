<?php
    session_start();
    session_unset();
    session_destroy();
    setcookie('user_id','',time()-46000,'/');
    header('location:welcome.php');
?>