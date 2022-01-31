<?php 

    session_start();

   
    include_once("config.php");
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $password   = mysqli_real_escape_string($conn, $_POST['password']);
    //  echo "This is Data Come From PHP File";

    if(!empty($email) && !empty($password)) {

        // check if email and password is exist in database 
        $check_user = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' ";
        $result     = mysqli_query($conn , $check_user);
        if(mysqli_num_rows($result)) {
            $row                   = mysqli_fetch_assoc($result);
            $_SESSION['unique_id'] = $row['unique_id'];  // session id to get all data from this id           
            echo "success";
        } else {
            echo "Email or password is incorrect! ";
        }




    } else {
        echo "All input field are required!";
    }


?>