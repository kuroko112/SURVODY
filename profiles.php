	
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Find Pepoles</title>
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
		



		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>All Pepole</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
						<?php 
						
							$query  = "SELECT 
											* 
									   FROM 
									   	   users 
									   LEFT JOIN 
									   	   image_users 
									   ON 
									   	  image_users.id_user_img = users.user_id
									    WHERE 
											user_id!=$user_id";
							$result = mysqli_query($conn, $query);

							
							
						
						?>
						<?php 
						
						while($row = mysqli_fetch_assoc($result)) { 
							
							$username   = $row['username']; 	
							$user_image = $row['image_name']; 	
						
							
						?>



							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="company_profile_info">
									<div class="company-up-info">
										<img src="server/upload/image/<?php echo $user_image?>" alt="">
										<h3><?php echo $username?></h3>
										<hr>
										<ul>
											<li><a href="server/friends/requst_friend.php?id_to=<?php echo $row['user_id']?>" title="" class="follow">Add</a></li>
											<li><a href="chats/chat.php?user_id=<?php echo $row['user_id']?>" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										</ul>
									</div>
									<a href="user-profile.html" title="" class="view-more-pro">View Profile</a>
								</div><!--company_profile_info end-->
							</div>



						<?php } ?>
						
						
					</div>
				</div><!--companies-list end-->
				<div class="process-comm">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div><!--process-comm end-->
			</div>
		</section><!--companies-info end-->
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
		</footer>

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>