<?php

function get_data(){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "Fiona";
    $dbName = "sweettooth";

    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    $prod_data = array();

    while ($row = mysqli_fetch_array($result)) {
        $prod_data[] = array (
            'id' => $row["idproduct"],
            'name' => $row["productName"],
            'price' => $row["productPrice"]
            
        );
    }

    return json_encode($prod_data);
}

 echo '<pre>';
 print_r(get_data());
 echo '</pre>';

 $file_name = date('d-m-Y') . '.json';
echo $file_name;
?>