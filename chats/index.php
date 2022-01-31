<?php include_once("php/header.php")?>
<?php include_once('php/config.php')?>
<?php

    session_start();
    $username    = explode( " " , $_SESSION['user_data']['username']);
    $fname       = $username[0]; 
    $lname       = $username[1];
    $id_user_img = $_SESSION['user_data']['user_id'];
    $query    = "SELECT * FROM image_users WHERE id_user_img = $id_user_img";
    $result   = mysqli_query($conn, $query);
    $image_data = mysqli_fetch_assoc($result);
    $image_name = $image_data['image_name']; 
    

?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                
                <div class="content">
                    <img src="../server/upload/image/<?php echo $image_name ?>"   alt="">
                    <div class="details">
                        <span><?php echo $fname  . " " . $lname ?></span>
                        <p>online</p>
                    </div>
                </div>
                <a href="../my-profile-feed.php" class="logout">Home</a>
            </header>
            <?php ?>
            <div class="search">
                <span class="text">Select an user start chat</span>
                <input type="text" name="searchTerm" placeholder="Enter name to search...">
                <button> <i class="fas fa-search"></i> </button>
            </div>
            <div class="user-list">
                <a href="#">
                    <div class="content">
                        <img src="200.jpg" alt="">
                        <div class="details">
                            <span>S.U.R.V.O.D.Y</span>
                            <p>This is text message</p>
                        </div>
                    </div>
                    <div class="status-dot"> <i class="fas fa-circle"></i> </div>
                </a>

                
            </div>
        </section>
    </div>
    <script src="js/users.js"></script>
</body>
</html>