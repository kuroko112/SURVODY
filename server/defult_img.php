<?php 


    session_start();
    
    include_once('confg.php');
    
    $email = $_SESSION['email'];

    $query  = "SELECT * FROM users WHERE email = '$email'";
    
    $result = mysqli_query($conn, $query);
    
    $user    = mysqli_fetch_assoc($result);
    
    $user_id =  $user['user_id']; 

    $query_insert  = "INSERT INTO `image_users`(`image_name`, `id_user_img`) 
                        VALUES ('NULL','$user_id')";
    $result_insert = mysqli_query($conn, $query_insert);
    
    if($result_insert) {
        header('LOCATION: ../');
    } else {
        header('LOCATION: ../');
    }

?>