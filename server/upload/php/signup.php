<?php 

    include_once('config.php');
    session_start();
    $user_id = $_SESSION['user_data']['user_id'];

    // check if user uploaded File or not 
    if(isset($_FILES['image'])) {

        $img_name = $_FILES['image']['name'];      // getting user upload img name
        $img_type = $_FILES['image']['type'];      // getting user upload img type
        $tmp_name = $_FILES['image']['tmp_name'];  // this temporary name is used to save/move file in our folder
       
        // // here explode image and get the last extension like jpg png
        $img_explode = explode('.', $img_name);
        $img_ext     =  end($img_explode); // here we get the extension of an user uploaded img file
        
        $extensions  = ["png", "jpeg", "jpg"]; // these are some valid img ext and we've store them in array 
        if(in_array($img_ext ,$extensions) === true) {

            $time   = time();
            $new_name_img = $time . $img_name;
            if(move_uploaded_file($tmp_name, "../image/" . $new_name_img)) {

                $query  = "UPDATE `image_users` 
                            SET `image_name`='$new_name_img' WHERE id_user_img = $user_id";
                mysqli_query($conn, $query);
                echo "success";

            } else {
                echo "Error To upload the image";
            }

            

        } else {

            echo "$email - This not a valid email";

        }

    } 






   

?>