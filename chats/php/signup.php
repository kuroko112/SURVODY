<?php 

    session_start();

    // echo "This is Data Come From PHP File";
    include_once("config.php");
    $fname      = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname      = mysqli_real_escape_string($conn, $_POST['lname']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $password   = mysqli_real_escape_string($conn, $_POST['password']);
    // $image      = mysqli_real_escape_string($conn, $_POST['image']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ) {

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // check that user[email] already exist in the database or not 
            // echo "ok imge uploaded here";
            $sql = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' ");
            if(mysqli_num_rows($sql) > 0) {

                echo "$email - This is already Esists";

            } else { 
                // check if user uploaded File or not 
                if(isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];      // getting user upload img name
                    $img_type = $_FILES['image']['type'];      // getting user upload img type
                    $tmp_name = $_FILES['image']['tmp_name'];  // this temporary name is used to save/move file in our folder
                    
                    // here explode image and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext     =  end($img_explode); // here we get the extension of an user uploaded img file
                    
                    $extensions  = ["png", "jpeg", "jpg"]; // these are some valid img ext and we've store them in array 
                    if(in_array($img_ext ,$extensions) === true) {

                        $time   = time();
                        $new_name_img = $time . $img_name;
                        if(move_uploaded_file($tmp_name, "../image/" . $new_name_img)) {

                            //  move the image and change the name
                            $random_id = rand(time(), 1000000);
                            
                            
                            $status = "Active now";

                            $query = "INSERT INTO users (unique_id, fname, lname, 	email, password, image, status) 
                            VALUES('$random_id', '$fname', '$lname', '$email', '$password', '$new_name_img', '$status')";

                            mysqli_query($conn, $query);
                            if($query) { // if data inserted 

                                $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' ");
                                if(mysqli_num_rows($sql3) > 0) {

                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    
                                    echo "success";

                                }   

                            } else { 

                                echo "Error To Insert the data to database!";

                            }

                        } else {
                            echo "Error To upload the image";
                        }

                        

                    } else {

                        echo "$email - This not a valid email";

                    }

                } else {
                    echo "please select an Image";
                }

            }


        } else {

            echo "$email - This not a valid email ";
        
        }


    } else {
        echo "All input field are required!";
    }

?>