<?php
$servername = 'localhost';
$username = 'root';
$password = 'Sam133@331';
$dbname = "users";
try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phnumber = $_POST['phnumber'];
    $passwordd = $_POST['password'];
    $hashed_password = password_hash($passwordd, PASSWORD_DEFAULT);

    date_default_timezone_set("Asia/Calcutta");
    $insertdate = date("Y-m-d H:i:s");
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /* set the PDO error mode to exception */
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "INSERT INTO login(Name,Email,Phno,Password) VALUES ('$name','$email','$phnumber','$hashed_password')";

    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {

    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>