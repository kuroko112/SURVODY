<?php 

    session_start();
    $username = "";
    $username = explode( " " , $_SESSION['user_data']['username']);
    $fname    = $username[0]; 

    if(isset($_SESSION['user_data'] )) {

        include_once("config.php");
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        
        $output      = "";
        
        $sql         = "SELECT * FROM `messages` 
                            LEFT JOIN users ON users.user_id = messages.id_user_to
                            WHERE id_user_from = $outgoing_id AND id_user_to = $incoming_id 
                            OR    id_user_from = $incoming_id AND id_user_to = $outgoing_id ORDER BY msg_id";
        $query       = mysqli_query($conn,$sql);
        $query_image       = "SELECT * FROM image_users WHERE id_user_img = $incoming_id";
        $result            = mysqli_query($conn, $query_image);
        $image_to          = mysqli_fetch_assoc($result);
        $image_name        = $image_to['image_name'];
        
        if(mysqli_num_rows($query) > 0) {

            


            while($row = mysqli_fetch_assoc($query)) {
                $username = explode( " " , $row['username']);
                $fname    = $username[0];
                if($row['id_user_from'] == $outgoing_id) { // if this is eqaul to sender

                    
                    
                    $output .= '                
                    <div class="chat outgoing">
                    
                        <div class="details">
                            <p>'. $row['message'] .'</p>

                        </div> 
                    </div>';

                } else { // he is a msg receive
    
                    $output .= '
                    <div class="chat incoming">
                    <img  src="../server/upload/image/'.$image_name.'" alt="" srcset="">
                        <div class="details">
                            <p>'. $row['message'] .'</p>
                        </div> 
                    </div>
                    ';

                }
            }

            echo $output;

        }
        
        


    } else {
        header("LOCATION: ../");
    }
    


?>