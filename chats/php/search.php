<?php 

    include_once("config.php");
    session_start();
    $user_id = $_SESSION['user_data']['user_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    // echo $searchTerm;
    $output    = "";
    // $sql       = "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'";
    $sql    = mysqli_query($conn , "SELECT * FROM users
                                    JOIN image_users
                                    ON image_users.id_user_img = users.user_id
                                    WHERE username LIKE '%{$searchTerm}%' AND 
								    user_id!=$user_id");
   
    if(mysqli_num_rows($sql) > 0) {

        include("data.php");

    } else {
        $output .= "No user found related to your search trem";
    }

    echo $output;

?>