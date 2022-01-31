<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Realtime chat app | Mida.dev</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    </head>
<body>
    <?php 
    
        session_start();
    
        
    
    ?>

    <div class="wrapper">
        <section class="form signup">
            <header>SURVODY Settings</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>UserName</label>
                        <input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['user_data']['username']?>" required>
                    </div>
                    
                </div>

                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $_SESSION['user_data']['email']?>"  required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="new_password" placeholder="Enter new password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input">

                    <input type="hidden" name="old_password" placeholder="Enter new password" value="<?php echo $_SESSION['user_data']['password']?>"  >
                    
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Settings">
                </div>
            </form>
            
        </section>
    </div>
    
    <script src="js/singup.js"></script>
    <script src="js/pass-show-hide.js"></script>
</body>
</html>