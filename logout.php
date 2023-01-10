<?php

include('check_login.php');
    setcookie('usertoken', null, time() - 3600); 
    return true;
    header("Location:./index.php;");
?>
