<?php 

    session_start();
    $user_id = $_SESSION['user_data']['user_id'];
    include_once("config.php");
    $username = $_SESSION['user_data']['username'];
    
    $sql    = mysqli_query($conn,"SELECT * FROM users
                                 JOIN image_users
                                 ON image_users.id_user_img = users.user_id
                                 WHERE 
								 user_id!=$user_id");
    
    $output = "";
    if(mysqli_num_rows($sql) == 1) {

        $output .= "No users are available to caht";

    } elseif(mysqli_num_rows($sql) > 0) {

        include("data.php");

    } 

    echo $output;
    

?>