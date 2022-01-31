<?php 

    session_start();
    

    include_once("config.php");
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message     = mysqli_real_escape_string($conn, $_POST['message']);
    if(!empty($message)) {
        $sql = mysqli_query($conn , "INSERT INTO messages (id_user_from, id_user_to, message)
                                    VALUES ({$outgoing_id}, {$incoming_id} , '{$message}')");
                                    
    }
    



?>