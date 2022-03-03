<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "Fiona";
    $dbName = "sweettooth";

    $mysqli = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phnumber = $_POST['phnumber'];
    $address = $_POST['address'];
    $date = $_POST['date'];

    if (isset($_POST['submit'])) {
        if (!empty($name) || !empty($email) || !empty($phnumber) || !empty($address) || !empty($date)) {

            if (!$mysqli->query("INSERT INTO sweettooth.order VALUES (NULL,'$name','$email',$phnumber,'$address', '$date');")) {
                echo ("Error description: " . $mysqli->error);
            }
        }
    }


    $mysqli->close();
    ?>

</body>

</html>