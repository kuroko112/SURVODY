<?php
    $outline = "";
    $image = "";
    if($user_image['image_name']) {

       $image =  "<img width='50px' src='server/upload/image/$image_name' alt=''>";
    
    } else {
    
        $image =  "<img width='50px' class='profile-img-users' src='images/USED.jpg' alt=''>";
    } 
    while($row = mysqli_fetch_assoc($result)) {
         
       $header       = $row['title_post'];
       $body         = $row['body_post'];
       $image_post   = $row['image_post'];

        $post = 
        "<div class='post-bar'>
            <div class='post_topbar'>
                <div class='usy-dt'>
                    ".$image."
                    <div class='usy-name'>
                        <h3>". $_SESSION['user_data']['username']."</h3>
                        <span><img src='images/clock.png' alt=''>3 min ago</span>
                    </div>
                </div>
              <div class='ed-opts'>
                <a href='#' title='' class='ed-opts-open'><i class='la la-ellipsis-v'></i></a>
                <ul class='ed-options'>
                    <li><a href='#' title=''>Edit Post</a></li>
                    <li><a href='#' title=''>Unsaved</a></li>
                    <li><a href='#' title=''>Unbid</a></li>
                    <li><a href='#' title=''>Close</a></li>
                    <li><a href='#' title=''>Hide</a></li>
                </ul>
            </div>
            <div class='epi-sec'>
                <ul class='descp'>
                    <li><img src='images/icon8.png' alt=''><span>Epic Coder</span></li>
                    <li><img src='images/icon9.png' alt=''><span>". $_SESSION['user_data']['nation'] ."</span></li>
                </ul>
            </div>
            
            <div class='job_descp'>
                <h3>".$header."</h3>
                <img src='server/post/image/". $image_post ."' width='100%' height='50%' style='margin-bottom: 20px;' alt=''>
                <p>". $body ." <a href='#' title=''>view more</a></p>
            </div>
            <div class='job-status-bar'>
                <ul class='like-com'>
                    <li>
                        <a href='#'><i class='fas fa-heart'></i> Like</a>
                        <img src='images/liked-img.png' alt=''>
                        <span>25</span>
                    </li> 
                    <li><a href='#' class='com'><i class='fas fa-comment-alt'></i> Comment 15</a></li>
                </ul>
                <a href='#'><i class='fas fa-eye'></i>Views 50</a>
            </div>
        </div>
        </div>";

        echo $post;

        
											
							
    }


?>

