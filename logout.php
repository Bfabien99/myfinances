<?php
    require('./isuser.php');
    unset($_SESSION['username']);
    header('location:./login.php');
?>