<?php


    session_start();
    include_once('../confg.php');
    $user_id = $_SESSION['user_data']['user_id'];
    $query   = "SELECT * FROM `post_user`  WHERE id_user_post  = $user_id";
    $result  = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        echo "here";
    } else {
        echo "not here";
    }

?>