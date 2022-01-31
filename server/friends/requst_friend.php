<?php


    session_start();
    $conn      = mysqli_connect("localhost","root","","survody_native");
    $user_to   = $_GET['id_to'];
    $user_from = $_SESSION['user_data']['user_id'];
    $query     = "INSERT INTO friend (id_user_from, id_user_to ) VALUES ($user_from, $user_to)";
    $result    = mysqli_query($conn, $query);
    if($result) {
        header("LOCATION: ../../profiles.php");
    }



?>