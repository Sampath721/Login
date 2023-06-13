<?php

session_start();
if (!isset($_SESSION['name'])) {
    // echo '<script language="javascript">';
    // echo 'alert("you need to login 1st")';
    // echo '</script>';
    header("location:../Frontend/login.php?msg=vfailed");

    exit();
} else {
    echo "welcome " . $_SESSION['name'];
}

?>