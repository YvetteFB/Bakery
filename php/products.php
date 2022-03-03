<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "Fiona";
$dbName = "sweettooth";

if(isset($_POST['submit'])){

    $mysqli = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_FILES['image']['name'];

   
    if (!$mysqli->query("INSERT INTO sweettooth.products(idproduct, productName, productPrice, productImage) VALUES (NULL,'$name','$price', '$img')")) {
        echo ("Error description: " . $mysqli->error);
    } else{
        move_uploaded_file($_FILES['image']['tmp_name'], "productImages/$img");
        echo ("Successful");
    }

}



?>

