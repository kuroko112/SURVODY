<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>WorkWise Html Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>


<body>
	<?php
	
		include_once('chats/php/config.php');
		session_start();
		$user_id = $_SESSION['user_data']['user_id'];
		$query  = "SELECT * FROM image_users WHERE id_user_img  = $user_id";
		$result = mysqli_query($conn, $query);
		$user_image = mysqli_fetch_assoc($result);
		$image_name = $user_image['image_name'];
		
		
	
	?>

	<div class="wrapper">
		<?php include('layout/include/header.php')?>	


		<section class="cover-sec">
			<img src="images/resources/cover-img.jpg" alt="">
			<div class="add-pic-box">
				<div class="container">
					<div class="row no-gutters">
						<div class="col-lg-12 col-sm-12">					
							<input type="file" id="file">
							<label for="file">Change Image</label>				
						</div>
					</div>
				</div>
			</div>
		</section>


		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="user-pro-img">
										
											<?php 
												if($user_image['image_name']) {

													echo "<img width='170px' src='server/upload/image/$image_name' alt=''>";
													
												} else {
													
													echo "<img width='170px' class='profile-img-users' src='images/USED.jpg' alt=''>";
												}

											
											?>
											<div class="add-dp" id="OpenImgUpload">
												<!-- form send the upload image to server -->
												<a href="server/upload/form_upload_image.php">upload Image</a>												
												

													
												
											</div>
										</div><!--user-pro-img end-->
										<div class="user_pro_status">
											<ul class="flw-status">
												<li>
													<span>Following</span>
													<b>0</b>
												</li>
												<li>
													<span>Followers</span>
													<b>0</b>
												</li>
											</ul>
										</div><!--user_pro_status end-->
										<ul class="social_links">
											<li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
											<li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
											<li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
											<li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
											<li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
											<li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
											<li><a href="#" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
											<li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
										</ul>
									</div><!--user_profile end-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>People Viewed Profile</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
											<?php
												// get all users in database and images
												$user_id =  $_SESSION['user_data']['user_id'];
												
												$query   = "SELECT * FROM `users` 

												JOIN image_users ON users.user_id = image_users.id_user_img 
												
												
												WHERE user_id != $user_id";

												$result  = mysqli_query($conn, $query);
												
												
											?>

											<?php while($row = mysqli_fetch_assoc($result)) {
												$image_users_name = $row['image_name'];
												$username         = explode( " " , $row['username']);
												$fname 			  = $username[0];
												$lname			  = $username[1];
												
												echo "<div class='suggestion-usd'>";
												if($image_users_name) {
													echo "<img width='35px' src='server/upload/image/$image_users_name' alt=''>";
												} else {
													echo "<img width='35px' class='profile-img-users' src='images/USED.jpg' alt=''>";
												}
												echo  "<div class='sgt-text'>";
												echo   "<h4>$fname  $lname</h4>";
												echo   "<span>Graphic Designer</span>";
												echo	"</div>";
												echo	"<span><i class='la la-plus'></i></span>";
												echo   "</div>";
											}
											
											
											?>
											
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6">
								<div class="main-ws-sec">
									<div class="user-tab-sec rewivew">
										<h3><?php echo $_SESSION['user_data']['username']?></h3>
										<div class="star-descp">
											<span>Graphic Designer at Self Employed</span>
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
											<a href="#" title="">Status</a>
										</div><!--star-descp end-->
                                            <div class="tab-feed st2 settingjb">
											<ul>
												
												<li data-tab="feed-dd" class="active">
													<a href="#" title="">
														<img src="images/ic1.png" alt="">
														<span>Posts</span>
													</a>
												</li>

												<li data-tab="payment-dd">
													<a href="#" title="">
														<i class="fas fa-marker"></i>
														<span>Blog</span>
													</a>
												</li>

												<li data-tab="info-dd">
													<a href="#" title="">
														<img src="images/ic2.png" alt="">
														<span>CV Building</span>
													</a>
												</li>

												<li data-tab="info-dd">
													<a href="#" title="">
														<img src="images/ic2.png" alt="">
														<span>C.V</span>
													</a>
												</li>
												
												<li data-tab="portfolio-dd">
													<a href="#" title="">
														<img src="images/ic3.png" alt="">
														<span>Portfolio</span>
													</a>
												</li>

												<li data-tab="saved-jobs">
													<a href="#" title="">
														<img src="images/ic4.png" alt="">
														<span>Jobs</span>
													</a>
												</li>
												<li data-tab="my-bids">
													<a href="#" title="">
														<img src="images/ic5.png" alt="">
														<span>Bids</span>
													</a>
												</li>
												
												
												
												
											</ul>
										</div><!-- tab-feed end-->
									</div><!--user-tab-sec end-->
									<div class="product-feed-tab" id="saved-jobs">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
                                           <li class="nav-item">
                                             <a class="nav-link active" id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">Manage Jobs</a>
                                           </li>
                                           <li class="nav-item">
                                             <a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Saved Jobs</a>
                                           </li>
                                           <li class="nav-item">
                                             <a class="nav-link" id="contact-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="false">Applied Jobs</a>
                                           </li>
                                           <li class="nav-item">
                                             <a class="nav-link" id="cadidates-tab" data-toggle="tab" href="#cadidates" role="tab" aria-controls="contact" aria-selected="false">Applied cadidates</a>
                                           </li>
                                         </ul>
                                         <div class="tab-content" id="myTabContent">
                                         <div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
                                                <div class="posts-bar">
                                                    <div class="post-bar bgclr">
                                                        <div class="wordpressdevlp">
                                                            <h2>Senior Wordpress Developer</h2>
                                                           
                                                            <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                        </div>
                                                        <br>
                                                        <div class="row no-gutters">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="cadidatesbtn">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <span class="badge badge-light">3</span>Candidates
                                                                    </button>
                                                                    <a href="#">
																		<i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="#">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <ul class="bk-links bklink">
                                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="posts-bar">
                                                    <div class="post-bar bgclr">
                                                        <div class="wordpressdevlp">
                                                            <h2>Senior Php Developer</h2>
                                                            
                                                            <p><i class="la la-clock-o"></i> Posted on 29 August 2018</p>
                                                        </div>
                                                        <br>
                                                        <div class="row no-gutters">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="cadidatesbtn">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <span class="badge badge-light">3</span>Candidates
                                                                    </button>
																	<a href="#">
																		<i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="#">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <ul class="bk-links bklink">
                                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="posts-bar">
                                                    <div class="post-bar bgclr">
                                                        <div class="wordpressdevlp">
                                                            <h2>Senior UI UX Designer</h2>
                                                          
                                                            <div class="row no-gutters">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <p class="posttext"><i class="la la-clock-o"></i>Posted on 5 June 2018</p>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <p><i class="la la-clock-o"></i>Expiried on 5 October 2018</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row no-gutters">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="cadidatesbtn">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <span class="badge badge-light">3</span>Candidates
                                                                    </button>																	
                                                                    <a href="#">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <ul class="bk-links bklink">
                                                                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
                                                <div class="post-bar">
                                                    <div class="p-all saved-post">
                                                        <div class="usy-dt">
                                                            <div class="wordpressdevlp">
                                                                <h2>Senior Wordpress Developer</h2>
                                                              
                                                                <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Applicants</h3>
                                                            <p>10</p>
                                                        </li>
                                                        <li>
                                                            <h3>Job Type</h3>
                                                            <p>Full Time</p>
                                                        </li>
                                                        <li>
                                                            <h3>Salary</h3>
                                                            <p>$600 - Mannual</p>
                                                        </li>
                                                        <li>
                                                            <h3>Posted : 5 Days Ago</h3>
                                                            <p>Open</p>
                                                        </li>
                                                        <div class="devepbtn saved-btn">
                                                            <a class="clrbtn" href="#">Unsaved</a>
                                                            <a class="clrbtn" href="#">Message</a>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <div class="post-bar">
                                                    <div class="p-all saved-post">
                                                        <div class="usy-dt">
                                                            <div class="wordpressdevlp">
                                                                <h2>Senior PHP Developer</h2>
                                                                
                                                                <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Applicants</h3>
                                                            <p>10</p>
                                                        </li>
                                                        <li>
                                                            <h3>Job Type</h3>
                                                            <p>Full Time</p>
                                                        </li>
                                                        <li>
                                                            <h3>Salary</h3>
                                                            <p>$600 - Mannual</p>
                                                        </li>
                                                        <li>
                                                            <h3>Posted : 5 Days Ago</h3>
                                                            <p>Open</p>
                                                        </li>
                                                        <div class="devepbtn saved-btn">
                                                            <a class="clrbtn" href="#">Unsaved</a>
                                                            <a class="clrbtn" href="#">Message</a>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <div class="post-bar">
                                                    <div class="p-all saved-post">
                                                        <div class="usy-dt">
                                                            <div class="wordpressdevlp">
                                                                <h2>UI UX Designer</h2>
                                                               
                                                                <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Applicants</h3>
                                                            <p>10</p>
                                                        </li>
                                                        <li>
                                                            <h3>Job Type</h3>
                                                            <p>Full Time</p>
                                                        </li>
                                                        <li>
                                                            <h3>Salary</h3>
                                                            <p>$600 - Mannual</p>
                                                        </li>
                                                        <li>
                                                            <h3>Posted : 5 Days Ago</h3>
                                                            <p>Open</p>
                                                        </li>
                                                        <div class="devepbtn saved-btn">
                                                            <a class="clrbtn" href="#">Unsaved</a>
                                                            <a class="clrbtn" href="#">Message</a>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
                                                <div class="post-bar">
                                                    <div class="p-all saved-post">
                                                        <div class="usy-dt">
                                                            <div class="wordpressdevlp">
                                                                <h2>Senior Wordpress Developer</h2>
                                                                
                                                                <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Applicants</h3>
                                                            <p>10</p>
                                                        </li>
                                                        <li>
                                                            <h3>Job Type</h3>
                                                            <p>Full Time</p>
                                                        </li>
                                                        <li>
                                                            <h3>Salary</h3>
                                                            <p>$600 - Mannual</p>
                                                        </li>
                                                        <li>
                                                            <h3>Posted : 5 Days Ago</h3>
                                                            <p>Open</p>
                                                        </li>
                                                        <div class="devepbtn saved-btn">
                                                            <a class="clrbtn" href="#">Applied</a>
                                                            <a class="clrbtn" href="#">Message</a>
                                                            <a href="#">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <div class="post-bar">
                                                    <div class="p-all saved-post">
                                                        <div class="usy-dt">
                                                            <div class="wordpressdevlp">
                                                                <h2>Senior PHP Developer</h2>
                                                                
                                                                <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Applicants</h3>
                                                            <p>10</p>
                                                        </li>
                                                        <li>
                                                            <h3>Job Type</h3>
                                                            <p>Full Time</p>
                                                        </li>
                                                        <li>
                                                            <h3>Salary</h3>
                                                            <p>$600 - Mannual</p>
                                                        </li>
                                                        <li>
                                                            <h3>Posted : 5 Days Ago</h3>
                                                            <p>Open</p>
                                                        </li>
                                                        <div class="devepbtn saved-btn">
                                                            <a class="clrbtn" href="#">Applied</a>
                                                            <a class="clrbtn" href="#">Message</a>
                                                            <a href="#">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </ul>
                                                </div>
                                                <div class="post-bar">
                                                    <div class="p-all saved-post">
                                                        <div class="usy-dt">
                                                            <div class="wordpressdevlp">
                                                                <h2>UI UX Designer</h2>
                                                               
                                                                <p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <ul class="savedjob-info saved-info">
                                                        <li>
                                                            <h3>Applicants</h3>
                                                            <p>10</p>
                                                        </li>
                                                        <li>
                                                            <h3>Job Type</h3>
                                                            <p>Full Time</p>
                                                        </li>
                                                        <li>
                                                            <h3>Salary</h3>
                                                            <p>$600 - Mannual</p>
                                                        </li>
                                                        <li>
                                                            <h3>Posted : 5 Days Ago</h3>
                                                            <p>Open</p>
                                                        </li>
                                                        <div class="devepbtn saved-btn">
                                                            <a class="clrbtn" href="#">Applied</a>
                                                            <a class="clrbtn" href="#">Message</a>
                                                            <a href="#">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">
                                                <div class="post-bar">
                                                    <div class="post_topbar applied-post">
                                                        <div class="usy-dt">
                                                            <img src="images/resources/us-pic.png" alt="">
                                                            <div class="usy-name">
                                                                <h3>SURVODY</h3>
                                                                <div class="epi-sec epi2">
                                                                    <ul class="descp descptab bklink">
                                                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Accept</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="job_descp noborder">
                                                            <div class="star-descp review profilecnd">
                                                                <ul class="bklik">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                    <a href="#" title="">5.0 of 5 Reviews</a>
                                                                </ul>
                                                            </div>
                                                            <div class="devepbtn appliedinfo noreply">
                                                                <a class="clrbtn" href="#">Accept</a>
                                                                <a class="clrbtn" href="#">View Profile</a>
                                                                <a class="clrbtn" href="#">Message</a>
                                                                <a href="#">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-bar">
                                                    <div class="post_topbar  applied-post">
                                                        <div class="usy-dt">
                                                            <img src="images/resources/us-pic.png" alt="">
                                                            <div class="usy-name">
                                                                <h3>SURVODY</h3>
                                                                <div class="epi-sec epi2">
                                                                    <ul class="descp descptab bklink">
                                                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Accept</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="job_descp noborder">
                                                            <div class="star-descp review profilecnd">
                                                                <ul class="bklik">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                    <a href="#" title="">5.0 of 5 Reviews</a>
                                                                </ul>
                                                            </div>
                                                            <div class="devepbtn appliedinfo noreply">
                                                                <a class="clrbtn" href="#">Accept</a>
                                                                <a class="clrbtn" href="#">View Profile</a>
                                                                <a class="clrbtn" href="#">Message</a>
                                                                <a href="#">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-bar">
                                                    <div class="post_topbar applied-post">
                                                        <div class="usy-dt">
                                                            <img src="images/resources/us-pic.png" alt="">
                                                            <div class="usy-name">
                                                                <h3>SURVODY</h3>
                                                                <div class="epi-sec epi2">
                                                                    <ul class="descp descptab bklink">
                                                                        <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                                        <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Accept</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="job_descp noborder">
                                                            <div class="star-descp review profilecnd">
                                                                <ul class="bklik">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star-half-o"></i></li>
                                                                    <a href="#" title="">5.0 of 5 Reviews</a>
                                                                </ul>
                                                            </div>
                                                            <div class="devepbtn appliedinfo noreply">
                                                                <a class="clrbtn" href="#">Accept</a>
                                                                <a class="clrbtn" href="#">View Profile</a>
                                                                <a class="clrbtn" href="#">Message</a>
                                                                <a href="#">
                                                                   <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>	
                                         </div>
									</div>
									<div class="product-feed-tab current" id="feed-dd">

								<!-- this area to show all post with the user and for loop to   -->
										<div class="posts-section">

											<!-- for loop show all posts from database -->
											<?php 
											
												$get_all_post = "SELECT * FROM `post_user`  
												WHERE id_user_post  = $user_id 
												 ORDER BY id_post DESC";
												$result	      = mysqli_query($conn, $get_all_post);
												if(mysqli_num_rows($result) > 0) {
													
													include_once('server/post/show_posts.php');

												} else {
													$outline = "<div class='post-bar'>
													<div class='post_topbar'>
														<div class='usy-dt'>
															<div class='usy-name'>
																<h3> NOT POSTS YET .. </h3>
																
															</div>
														</div>
													</div>
													</div>";
													echo $outline;
												}
											
											?>
											
											
											

											<div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div><!--process-comm end-->
										</div><!--posts-section end-->





									</div><!--product-feed-tab end-->

									<div class="product-feed-tab" id="my-bids">
										<ul class="nav nav-tabs bid-tab" id="myTab" role="tablist">
                                           <li class="nav-item">
                                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Manage Bids</a>
                                           </li>
                                           <li class="nav-item">
                                             <a class="nav-link" id="bidders-tab" data-toggle="tab" href="#bidders" role="tab" aria-controls="contact" aria-selected="false">Manage Bidders</a>
                                           </li>
                                           <li class="nav-item">
                                             <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Active Bids</a>
                                           </li>
                                         </ul>
                                         <div class="tab-content" id="myTabContent">
                                           <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                           	<div class="post-bar">
												<div class="post_topbar">
													<div class="wordpressdevlp">
												<h2>Travel Wordpress Theme</h2>
												
												<p><i class="la la-clock-o"></i>5 Hour Lefts</p>
											</div>
											<ul class="savedjob-info mangebid manbids">
													<li>
														<h3>Bids</h3>
														<p>4</p>
													</li>
													<li>
														<h3>Avg Bid (USD)</h3>
														<p>$510</p>
													</li>
													<li>
														<h3>Project Budget (USD)</h3>
														<p>$500 - $600</p>
													</li>
													<ul class="bk-links bklink">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
												</ul>
											</ul>
												<br>
													<div class="cadidatesbtn bidsbtn">
													<button type="button" class="btn btn-primary">
														<span class="badge badge-light">3</span>Candidates 
													</button>
													<a href="#">
														<i class="far fa-edit"></i>
													</a>
													<a href="#">
														<i class="far fa-trash-alt"></i>
													</a>
                                              </div>
											</div>
										</div>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="wordpressdevlp">
												<h2>Travel Wordpress Theme</h2>
												
												<p><i class="la la-clock-o"></i>5 Hour Lefts</p>
											</div>
											<ul class="savedjob-info mangebid manbids">
													<li>
														<h3>Bids</h3>
														<p>4</p>
													</li>
													<li>
														<h3>Avg Bid (USD)</h3>
														<p>$510</p>
													</li>
													<li>
														<h3>Project Budget (USD)</h3>
														<p>$500 - $600</p>
													</li>
													<ul class="bk-links bklink">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
												</ul>
											</ul>
												<br>
													<div class="cadidatesbtn bidsbtn">
														<button type="button" class="btn btn-primary">
															<span class="badge badge-light">3</span>Candidates 
														</button>
														<a href="#">
															<i class="far fa-edit"></i>
														</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</div>
										</div>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="wordpressdevlp">
												<h2>Travel Wordpress Theme</h2>
												
												<p><i class="la la-clock-o"></i>5 Hour Lefts</p>
											</div>
											<ul class="savedjob-info mangebid manbids">
													<li>
														<h3>Bids</h3>
														<p>4</p>
													</li>
													<li>
														<h3>Avg Bid (USD)</h3>
														<p>$510</p>
													</li>
													<li>
														<h3>Project Budget (USD)</h3>
														<p>$500 - $600</p>
													</li>
													<ul class="bk-links bklink">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
												</ul>
											</ul>
												<br>
													<div class="cadidatesbtn bidsbtn">
														<button type="button" class="btn btn-primary">
															<span class="badge badge-light">3</span>Candidates 
														</button>
														<a href="#">
															<i class="far fa-edit"></i>
														</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</div>
										</div>	
                                           </div>
                                           <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          <div class="post-bar">
												<div class="post_topbar active-bids">
													<div class="usy-dt">
														<div class="wordpressdevlp" >
														<h2>Travel Wordpress Theme</h2>
													</div>
													</div>
												</div>
												<ul class="savedjob-info activ-bidinfo">
													<li>
														<h3>Fixed Price</h3>
														<p>$500</p>
													</li>
													<li>
														<h3>Delivery Time</h3>
														<p>8 Days</p>
													</li>
													<div class="devepbtn activebtn">
														<a href="#">
															<i class="far fa-edit"></i>
														</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</ul>
											</div>
											<div class="post-bar">
												<div class="post_topbar active-bids">
													<div class="usy-dt">
														<div class="wordpressdevlp" >
														<h2>Restaurant Android Application</h2>
													</div>
													</div>
												</div>
												<ul class="savedjob-info activ-bidinfo">
													<li>
														<h3>Fixed Price</h3>
														<p>$1500</p>
													</li>
													<li>
														<h3>Delivery Time</h3>
														<p>15 Days</p>
													</li>
													<div class="devepbtn activebtn">
														<a href="#">
															<i class="far fa-edit"></i>
														</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</ul>
											</div>
											<div class="post-bar">
												<div class="post_topbar active-bids">
													<div class="usy-dt">
														<div class="wordpressdevlp" >
														<h2>Online Shopping Html Template with PHP</h2>
													</div>
													</div>
												</div>
												<ul class="savedjob-info activ-bidinfo">
													<li>
														<h3>Fixed Price</h3>
														<p>$1500</p>
													</li>
													<li>
														<h3>Delivery Time</h3>
														<p>15 Days</p>
													</li>
													<div class="devepbtn activebtn">
														<a href="#">
															<i class="far fa-edit"></i>
														</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</ul>
											</div>
                                           </div>
                                           <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                           	<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<div class="wordpressdevlp" >
														<h2>Senior Wordpress Developer</h2>
														<br>
														<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
													</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<ul class="savedjob-info">
													<li>
														<h3>Applicants</h3>
														<p>10</p>
													</li>
													<li>
														<h3>Job Type</h3>
														<p>Full Time</p>
													</li>
													<li>
														<h3>Salary</h3>
														<p>$600 - Mannual</p>
													</li>
													<li>
														<h3>Posted : 5 Days Ago</h3>
														<p>Open</p>
													</li>
													<div class="devepbtn">
														<a class="clrbtn" href="#">Applied</a>
														<a class="clrbtn" href="#">Message</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</ul>
											</div>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<div class="wordpressdevlp" >
														<h2>Senior PHP Developer</h2>
														<br>
														<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
													</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<ul class="savedjob-info">
													<li>
														<h3>Applicants</h3>
														<p>10</p>
													</li>
													<li>
														<h3>Job Type</h3>
														<p>Full Time</p>
													</li>
													<li>
														<h3>Salary</h3>
														<p>$600 - Mannual</p>
													</li>
													<li>
														<h3>Posted : 5 Days Ago</h3>
														<p>Open</p>
													</li>
													<div class="devepbtn">
														<a class="clrbtn" href="#">Applied</a>
														<a class="clrbtn" href="#">Message</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</ul>
											</div>
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<div class="wordpressdevlp" >
														<h2>UI UX Designer</h2>
														<br>
														<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
													</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<ul class="savedjob-info">
													<li>
														<h3>Applicants</h3>
														<p>10</p>
													</li>
													<li>
														<h3>Job Type</h3>
														<p>Full Time</p>
													</li>
													<li>
														<h3>Salary</h3>
														<p>$600 - Mannual</p>
													</li>
													<li>
														<h3>Posted : 5 Days Ago</h3>
														<p>Open</p>
													</li>
													<div class="devepbtn">
														<a class="clrbtn" href="#">Applied</a>
														<a class="clrbtn" href="#">Message</a>
														<a href="#">
															<i class="far fa-trash-alt"></i>
														</a>
													</div>
											</ul>
											</div>
                                           </div>
                                           <div class="tab-pane fade" id="bidders" role="tabpanel" aria-labelledby="bidders-tab">
                                           	<div class="post-bar">
												<div class="post_topbar post-bid">
													<div class="usy-dt">
														<img src="images/resources/us-pic.png" alt="">
														<div class="usy-name">
														<h3>SURVODY</h3>
														<div class="epi-sec epi2">
													     <ul class="descp descptab bklink">
														<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													    </ul>
												        </div>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Accept</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
													<div class="job_descp noborder">
													<div class="star-descp review profilecnd">
											             <ul class="bklik">
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star-half-o"></i></li>
												         <a href="#" title="">5.0 of 5 Reviews</a>
											             </ul>
										                </div>
										                <ul class="savedjob-info biddersinfo">
										                	<li>
										                		<h3>Fixed Price</h3>
										                		<p>$500</p>
										                	</li>
										                	<li>
										                		<h3>Delivery Time</h3>
										                		<p>10 Days</p>
										                	</li>
										                </ul>
										                    <div class="devepbtn appliedinfo bidsbtn">
														    <a class="clrbtn" href="#">Accept</a>
														    <a class="clrbtn" href="#">View Profile</a>
														    <a class="clrbtn" href="#">Message</a>
														    <a href="#">
														    	<i class="far fa-trash-alt"></i>
														    </a>    
													</div>
									              </div>
												</div>
											</div>
											<div class="post-bar">
												<div class="post_topbar post-bid">
													<div class="usy-dt">
														<img src="images/resources/Jassica.jpg" alt="">
														<div class="usy-name">
														<h3>SURVODY</h3>
														<div class="epi-sec epi2">
													     <ul class="descp descptab bklink">
														<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													    </ul>
												        </div>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Accept</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
													<div class="job_descp noborder">
													<div class="star-descp review profilecnd">
											             <ul class="bklik">
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star-half-o"></i></li>
												         <a href="#" title="">5.0 of 5 Reviews</a>
											             </ul>
										                </div>
										                <ul class="savedjob-info biddersinfo">
										                	<li>
										                		<h3>Fixed Price</h3>
										                		<p>$500</p>
										                	</li>
										                	<li>
										                		<h3>Delivery Time</h3>
										                		<p>10 Days</p>
										                	</li>
										                </ul>
										                    <div class="devepbtn appliedinfo bidsbtn">
														    <a class="clrbtn" href="#">Accept</a>
														    <a class="clrbtn" href="#">View Profile</a>
														    <a class="clrbtn" href="#">Message</a>
														    <a href="#">
														    	<i class="far fa-trash-alt"></i>
														    </a>    
													</div>
									              </div>
												</div>
											</div>
											<div class="post-bar">
												<div class="post_topbar post-bid">
													<div class="usy-dt">
														<img src="images/resources/rock.jpg" alt="">
														<div class="usy-name">
														<h3>SURVODY</h3>
														<div class="epi-sec epi2">
													     <ul class="descp descptab bklink">
														<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													    </ul>
												        </div>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Accept</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
													<div class="job_descp noborder">
													<div class="star-descp review profilecnd">
											             <ul class="bklik">
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star"></i></li>
												         <li><i class="fa fa-star-half-o"></i></li>
												         <a href="#" title="">5.0 of 5 Reviews</a>
											             </ul>
										                </div>
										                <ul class="savedjob-info biddersinfo">
										                	<li>
										                		<h3>Fixed Price</h3>
										                		<p>$500</p>
										                	</li>
										                	<li>
										                		<h3>Delivery Time</h3>
										                		<p>10 Days</p>
										                	</li>
										                </ul>
										                    <div class="devepbtn appliedinfo bidsbtn">
														    <a class="clrbtn" href="#">Accept</a>
														    <a class="clrbtn" href="#">View Profile</a>
														    <a class="clrbtn" href="#">Message</a>
														    <a href="#">
														    	<i class="far fa-trash-alt"></i>
														    </a>    
													</div>
									              </div>
												</div>
											</div>
                                           </div>
                                         </div>
									</div><!--product-feed-tab end-->

									<div class="product-feed-tab" id="info-dd">
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="overview-open">Overview</a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
										</div><!--user-profile-ov end-->
										<div class="user-profile-ov st2">
											<h3><a href="#" title="" class="exp-bx-open">Experience </a><a href="#" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="#" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
											<h4>Web designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
											<h4>UI / UX Designer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
											<h4>PHP developer <a href="#" title=""><i class="fa fa-pencil"></i></a></h4>
											<p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
										</div><!--user-profile-ov end-->
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="ed-box-open">Education</a> <a href="#" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
											<h4>Master of Computer Science</h4>
											<span>2015 - 2018</span>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
										</div><!--user-profile-ov end-->
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="lct-box-open">Location</a> <a href="#" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="#" title=""><i class="fa fa-plus-square"></i></a></h3>
											<h4>India</h4>
											<p>151/4 BT Chownk, Delhi </p>
										</div><!--user-profile-ov end-->
										<div class="user-profile-ov">
											<h3><a href="#" title="" class="skills-open">Skills</a> <a href="#" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-plus-square"></i></a></h3>
											<ul>
												<li><a href="#" title="">HTML</a></li>
												<li><a href="#" title="">PHP</a></li>
												<li><a href="#" title="">CSS</a></li>
												<li><a href="#" title="">Javascript</a></li>
												<li><a href="#" title="">Wordpress</a></li>
												<li><a href="#" title="">Photoshop</a></li>
												<li><a href="#" title="">Illustrator</a></li>
												<li><a href="#" title="">Corel Draw</a></li>
											</ul>
										</div><!--user-profile-ov end-->
									</div><!--product-feed-tab end-->
									<div class="product-feed-tab" id="rewivewdata">
                                        <section ></section>



										<div class="posts-section">
											<div class="post-bar reviewtitle">
												<h2>Reviews</h2>
											</div><!--post-bar end-->
											<div class="post-bar ">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="images/resources/bg-img3.png" alt="">
														<div class="usy-name">
															<h3>Rock William</h3>
															<div class="epi-sec epi2">
													<ul class="descp review-lt">
														<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
												</div>
														</div>
													</div>
												</div>
												
												<div class="job_descp mngdetl">
													<div class="star-descp review">
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
											<a href="#" title="">5.0 of 5 Reviews</a>
										</div>
										<div class="reviewtext">
											<p>Lorem ipsum dolor sit amet, adipiscing elit. Nulla luctus mi et porttitor ultrices</p>
											<hr>
										</div>

										<div class="post_topbar post-reply">
													<div class="usy-dt">
														<img src="images/resources/bg-img4.png" alt="">
														<div class="usy-name">
															<h3>SURVODY</h3>
															<div class="epi-sec epi2">
													   <p><i class="la la-clock-o"></i>3 min ago</p>													   
													   <p class="tahnks">Thanks :)</p>
												</div>
											    </div>
												</div>
												</div>
												<div class="post_topbar rep-post rep-thanks">
													<hr>
													<div class="usy-dt">
														<img src="images/resources/bg-img4.png" alt="">														
														<input class="reply" type="text" placeholder="Reply">
														<a class="replybtn" href="#">Send</a>
											   
													</div>
												</div>
												
										</div>
											</div><!--post-bar end-->
											<div class="post-bar post-thanks">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="images/resources/bg-img1.png" alt="">
														<div class="usy-name">
															<h3>Jassica William</h3>
															<div class="epi-sec epi2">
													<ul class="descp review-lt">
														<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
												</div>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												
												<div class="job_descp mngdetl">
													<div class="star-descp review">
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
											<a href="#" title="">5.0 of 5 Reviews</a><br><br>
											<p>Awesome Work, Thanks John!</p>
											<hr>
										</div>
										<div class="post_topbar rep-post">
													<div class="usy-dt">
														<img src="images/resources/bg-img4.png" alt="">
														
															<input class="reply" type="text" placeholder="Reply">
															<a class="replybtn" href="#">Send</a>
											   
												</div>
												</div>
												</div>
											</div><!--post-bar end-->
										</div><!--posts-section end-->
									</div><!--product-feed-tab end-->
									<div class="product-feed-tab" id="my-bids">
										<div class="posts-section">
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="images/resources/us-pic.png" alt="">
														<div class="usy-name">
															<h3>SURVODY</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Simple Classified Site</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="images/resources/us-pic.png" alt="">
														<div class="usy-name">
															<h3>SURVODY</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Ios Shopping mobile app</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="images/resources/us-pic.png" alt="">
														<div class="usy-name">
															<h3>SURVODY</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Simple Classified Site</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="post-bar">
												<div class="post_topbar">
													<div class="usy-dt">
														<img src="images/resources/us-pic.png" alt="">
														<div class="usy-name">
															<h3>SURVODY</h3>
															<span><img src="images/clock.png" alt="">3 min ago</span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
														<li><img src="images/icon9.png" alt=""><span>India</span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
														<li><a href="#" title="" class="bid_now">Bid Now</a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3>Ios Shopping mobile app</h3>
													<ul class="job-dt">
														<li><span>$300 - $350</span></li>
													</ul>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
													<ul class="skill-tags">
														<li><a href="#" title="">HTML</a></li>
														<li><a href="#" title="">PHP</a></li>
														<li><a href="#" title="">CSS</a></li>
														<li><a href="#" title="">Javascript</a></li>
														<li><a href="#" title="">Wordpress</a></li> 	
														<li><a href="#" title="">Photoshop</a></li> 	
														<li><a href="#" title="">Illustrator</a></li> 	
														<li><a href="#" title="">Corel Draw</a></li> 	
													</ul>
												</div>
												<div class="job-status-bar">
													<ul class="like-com">
														<li>
															<a href="#"><i class="la la-heart"></i> Like</a>
															<img src="images/liked-img.png" alt="">
															<span>25</span>
														</li> 
														<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
													</ul>
													<a><i class="la la-eye"></i>Views 50</a>
												</div>
											</div><!--post-bar end-->
											<div class="process-comm">
												<a href="#" title=""><img src="images/process-icon.png" alt=""></a>
											</div><!--process-comm end-->
										</div><!--posts-section end-->
									</div><!--product-feed-tab end-->
									<div class="product-feed-tab" id="portfolio-dd">
										<div class="portfolio-gallery-sec">
											<h3>Portfolio</h3>
											<div class="portfolio-btn">
												<a href="#" title=""><i class="fas fa-plus-square"></i> Add Portfolio</a>
											</div>
											<div class="gallery_pf">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img1.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img2.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img3.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img4.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img5.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img6.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img7.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img8.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img9.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-6">
														<div class="gallery_pt">
															<img src="images/resources/pf-img10.jpg" alt="">
															<a href="#" title=""><img src="images/all-out.png" alt=""></a>
														</div><!--gallery_pt end-->
													</div>
												</div>
											</div><!--gallery_pf end-->
										</div><!--portfolio-gallery-sec end-->
									</div><!--product-feed-tab end-->

									<!-- here add post form -->
									<div class="product-feed-tab" id="payment-dd">
										<div class="billing-method">
											
											<form class="add-post-form" action="server/post/insert_image.php" method="post" enctype="multipart/form-data">
												<?php 

													if($user_image['image_name']) {

														echo "<img class='img-add-post' width='50px' src='server/upload/image/$image_name' alt=''>" . "<br><br>";
														echo $_SESSION['user_data']['username'];
														
													} else {
														
														echo "<img width='50px' class='profile-img-users' src='images/USED.jpg' alt=''>";
														echo "<h1>" . $fname . " " . $lname ."</h2>";
													}


												?>
												<input type="text" name="post_header" class="post-header" placeholder="Post Header Here ...">
												<textarea name="post_body" id="" cols="67" rows="10" placeholder="Post Here..."></textarea><br>
												<input class="sub-post" type="submit" value="post">
												<input type="file" class="img-posting" name="image" id="">
												
											</form>
										</div><!--billing-method end-->
										
									</div><!--product-feed-tab end-->

								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3">
								<div class="right-sidebar">
									<div class="message-btn">
										<a href="profile-account-setting.html" title=""><i class="fas fa-cog"></i> Setting</a>
									</div>
									<div class="widget widget-portfolio">
										<div class="wd-heady">
											<h3>Portfolio</h3>
											<img src="images/photo-icon.png" alt="">
										</div>
										<div class="pf-gallery">
											<ul>
												<li><a href="#" title=""><img src="images/resources/pf-gallery1.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery2.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery3.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery4.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery5.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery6.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery7.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery8.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery9.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery10.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery11.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery12.png" alt=""></a></li>
											</ul>
										</div><!--pf-gallery end-->
									</div><!--widget-portfolio end-->

									<div class="widget widget-portfolio">
										<div class="wd-heady">
											<h3>CV</h3>
											<img src="images/photo-icon.png" alt="">
										</div>
										<div class="pf-gallery">
											<ul>
												<li><a href="#" title=""><img src="images/resources/pf-gallery1.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery2.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery3.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery4.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery5.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery6.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery7.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery8.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery9.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery10.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery11.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/resources/pf-gallery12.png" alt=""></a></li>
											</ul>
										</div><!--pf-gallery end-->
									</div><!--widget-portfolio end-->



								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="help-center.html" title="">Help Center</a></li>
						<li><a href="about.html" title="">About</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="forum.html" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon2.png" alt="">Copyright 2019</p>
					<img class="fl-rgt" src="images/logo2.png" alt="">
				</div>
			</div>
		</footer><!--footer end-->

		<div class="overview-box" id="overview-box">
			<div class="overview-edit">
				<h3>Overview</h3>
				<span>5000 character left</span>
				<form>
					<textarea></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->


		<div class="overview-box" id="experience-box">
			<div class="overview-edit">
				<h3>Experience</h3>
				<form>
					<input type="text" name="subject" placeholder="Subject">
					<textarea></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="education-box">
			<div class="overview-edit">
				<h3>Education</h3>
				<form>
					<input type="text" name="school" placeholder="School / University">
					<div class="datepicky">
						<div class="row">
							<div class="col-lg-6 no-left-pd">
								<div class="datefm">
									<input type="text" name="from" placeholder="From" class="datepicker">	
									<i class="fa fa-calendar"></i>
								</div>
							</div>
							<div class="col-lg-6 no-righ-pd">
								<div class="datefm">
									<input type="text" name="to" placeholder="To" class="datepicker">
									<i class="fa fa-calendar"></i>
								</div>
							</div>
						</div>
					</div>
					<input type="text" name="degree" placeholder="Degree">
					<textarea placeholder="Description"></textarea>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="location-box">
			<div class="overview-edit">
				<h3>Location</h3>
				<form>
					<div class="datefm">
						<select>
							<option>Country</option>
							<option value="pakistan">Pakistan</option>
							<option value="england">England</option>
							<option value="india">India</option>
							<option value="usa">United Sates</option>
						</select>
						<i class="fa fa-globe"></i>
					</div>
					<div class="datefm">
						<select>
							<option>City</option>
							<option value="london">London</option>
							<option value="new-york">New York</option>
							<option value="sydney">Sydney</option>
							<option value="chicago">Chicago</option>
						</select>
						<i class="fa fa-map-marker"></i>
					</div>
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="skills-box">
			<div class="overview-edit">
				<h3>Skills</h3>
				<ul>
					<li><a href="#" title="" class="skl-name">HTML</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="#" title="" class="skl-name">php</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
					<li><a href="#" title="" class="skl-name">css</a><a href="#" title="" class="close-skl"><i class="la la-close"></i></a></li>
				</ul>
				<form>
					<input type="text" name="skills" placeholder="Skills">
					<button type="submit" class="save">Save</button>
					<button type="submit" class="save-add">Save & Add More</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

		<div class="overview-box" id="create-portfolio">
			<div class="overview-edit">
				<h3>Create Portfolio</h3>
				<form>
					<input type="text" name="pf-name" placeholder="Portfolio Name">
					<div class="file-submit">
						<input type="file" id="file">
						<label for="file">Choose File</label>	
					</div>
					<div class="pf-img">
						<img src="images/resources/np.png" alt="">
					</div>
					<input type="text" name="website-url" placeholder="htp://www.example.com">
					<button type="submit" class="save">Save</button>
					<button type="submit" class="cancel">Cancel</button>
				</form>
				<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
			</div><!--overview-edit end-->
		</div><!--overview-box end-->

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>