<?php
session_start();
echo $_SESSION['user_name'];
echo $_COOKIE['user_id'];
setcookie('user_id','',time()-46000,'/');
session_unset();
session_destroy();


?>