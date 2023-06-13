<?php   
session_start(); //to ensure you are using same session
session_destroy();
unset($_SESSION['user2']); //destroy the session
header("location:./login.php"); //to redirect back to "index.php" after logging out
exit();
?>
