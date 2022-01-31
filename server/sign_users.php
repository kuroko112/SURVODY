
<?php 


    /* 
     1 - Push all data from form sign up users
     2 - and check if the user is exist in database
     3 - and push the error -> [ message errors and show the message  ]    
    */

    session_start();
    // include the file configration
    include_once('confg.php');
    
   


    // This inti Var and save the data -> POST  
    $error              = [];
    $name               = $_POST['name'];
    $email              = $_POST['email'];
    $country            = $_POST['country'];
    $password           = $_POST['password'];
    $repeat_password    = $_POST['repeat-password'];
    


    if(empty($name )) {

        $error[] = "Name is empty";

    } elseif(empty($country)) {
        $error[] = "country is empty";
    } elseif(empty($password)) {
        $error[] = "password is empty";
    } elseif(empty($repeat_password)) {
        $error[] = "password 2 is empty";
    }


    if($password != $repeat_password) {
        $error[] = "password 1 and Password 2 is not match";
    }


    $user_data = "SELECT * FROM users WHERE email = '$email'";

    $result_user_data = mysqli_query($conn, $user_data);

    // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if (!$user) { // if user exists
    
    if ($user['email'] === $email) {
      array_push($error, "Username already exists");
    }

  } 
    



    if(count($error) == 0) {

        
        $inser_user  = "INSERT INTO users (username, email,  password, ruls, nation) 
                    VALUES ('$name','$email', '$password',0, '$country')";

        $result_user = mysqli_query($conn, $inser_user);
        

        if($result_user == 1) {
            
            $_SESSION['email'] = $email;
            header('LOCATION: defult_img.php');
        }

    }

     else {
        header("LOCATION: ../");
    }


    


?>