<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <?php
    //accessing variables
    
    $formemailemail = $_POST['email'];
    $formpassword = $_POST['password'];
    $formpass = md5($formpassword);


    // Step 1: establish a connection to the database

    $servername = "localhost";
    $username = "root";
    $password = "Sam133@331";
    $dbname = "users";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Step 2: fetch data from the database

    $sql = "SELECT name, email,Password FROM login";
    $result = mysqli_query($conn, $sql);
    

    // Step 3: display the fetched data in the front-end
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($formemailemail == $row["email"]) {
                if (password_verify($formpassword, $row['Password'])) {
                    $_SESSION['usernameindb'] = $row["name"];
                    $_SESSION['name'] = $row["name"]; // Store the username in the session
                    $_SESSION['user_login_status'] = 1;
                    header('Location: ../Frontend/MainHomePage.php');
                    exit();

                } else {
                    // $_SESSION['passnotmatched'] = "The password u entered not matching our records";
                    header("location:../Frontend/login.php?msg=pfailed");

                }

            } else {
                // $_SESSION['emailnotmatched'] = "The email u entered not matching our records";
                header("location:../Frontend/login.php?msg=failed");
               


            }
        }
    } else {
        echo "No data found.";
    }


    // Step 4: close the database connection
    
    mysqli_close($conn);


    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>