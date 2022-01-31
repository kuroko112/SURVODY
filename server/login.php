<?php 

    include_once('confg.php');
    session_start();    
    
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // $user_data = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

     

    // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0) {

    $_SESSION['user_data'] = $user;
    
    header('LOCATION: ../my-profile-feed.php');
  
} else {
      header("LOCATION: ../");
  }


    // print_r($_POST);
    


?>