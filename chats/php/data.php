<?php 

while($row = mysqli_fetch_assoc($sql)) {
    $username = explode( " " , $row['username']);
    $fname    = $username[0]; 
    $lname    = $username[1];
    $image_name = $row['image_name'];
    
    $output .= '
        <a href="chat.php?user_id='.$row['user_id'].'">
            <div class="content">
            <img src="../server/upload/image/'.$image_name.'" alt="" srcset="">         
                <div class="details">
                    <span>'. $fname .'  '. $lname  .'  </span>
                    <p>This is text message</p>
                </div>v
            </div>
            <div class="status-dot"> <i class="fas fa-circle"></i> </div>
        </a>
    ';
}




?>

