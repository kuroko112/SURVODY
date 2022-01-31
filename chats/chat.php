
<?php include_once("php/header.php")?>
<?php include_once('php/config.php')?>
<?php 
    session_start();
    // $username = explode( " " , $_SESSION['user_data']['username']);
    // $fname    = $username[0]; 
    // $lname    = $username[1];

?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php 
                
                $user_id_to = $_GET['user_id'];

                $query  = "SELECT * FROM users WHERE user_id = '$user_id_to'";
                $result = mysqli_query($conn, $query);
                $data   = mysqli_fetch_assoc($result);
                $username = explode( " " , $data['username']);
                $fname    = $username[0];
                $lname    = $username[1];

                $query    = "SELECT * FROM image_users WHERE id_user_img = $user_id_to";
                $result   = mysqli_query($conn, $query);
                $image_data = mysqli_fetch_assoc($result);
                $image_name = $image_data['image_name']; 

               
                
                
                ?>
                <a href="index.php" class="back-icon"> <i class="fas fa-arrow-left"></i> </a>
                <img src="../server/upload/image/<?php echo $image_name?>" alt="">
                    <div class="details">
                        <span><?php echo  $fname . " "  . $lname ?></span>
                        <p>Active now</p>
                    </div>
                
            </header>
                
            <div class="chat-box">

                
                
                
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['user_data']['user_id']?>"hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id_to?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/caht.js"></script>
</body>
</html>