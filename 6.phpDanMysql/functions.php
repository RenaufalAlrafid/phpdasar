<?php

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function querry($querry){
    global $conn;
    $result = mysqli_query($conn, $querry);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; 
    }
    return $rows;
}
