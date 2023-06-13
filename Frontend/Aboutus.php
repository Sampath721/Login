<?php

session_start();
if (!isset($_SESSION['name'])) {
    header("location:../Frontend/login.php?msg=vfailed");
    
    exit();
} else {
    echo "welcome " . $_SESSION['name'];
}

// $verify=$_SESSION['name'];

// echo $verify;

    ?>