<?php

    session_start();
    include_once('../confg.php');
    $id_user_post = $_SESSION['user_data']['user_id'];
    
    if($_FILES['image']) {

        $post_header = $_POST['post_header'];
        $post_body   = $_POST['post_body'];
        echo $post_header;
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
            if(move_uploaded_file($tmp_name, "image/" . $new_name_img)) {
                $query = "INSERT INTO `post_user`( id_user_post, title_post, body_post, image_post) 
                    VALUES ($id_user_post,'$post_header','$post_body','$new_name_img')";
                
                $result = mysqli_query($conn, $query);
                header('LOCATION: ../../my-profile-feed.php');
            }
        }
        else {
            echo "defrant file";
        }
    } else {
        $query = "INSERT INTO `post_user`( id_user_post, title_post, body_post, image_post) 
                    VALUES ($id_user_post,'$post_header','$post_body','NULL')";
        $result = mysqli_query($conn, $query);
        header('LOCATION: ../../my-profile-feed.php');
    }
    
    


    

?>