<?php
  session_start();

  $tour_id = $_GET['tour_id'];
  $_SESSION['tour_id']= $tour_id;


if($_SERVER['REQUEST_METHOD']== "POST")
{
  require 'config.php';

  $enq_tour_name=$_POST['enq_tour_name'];
  $enq_tour_email=$_POST['enq_tour_email'];
  $enq_tour_phone=$_POST['enq_tour_phone'];
  $enq_tour_days=$_POST['enq_tour_days'];
  $enq_tour_child=$_POST['enq_tour_child'];
  $enq_tour_adult=$_POST['enq_tour_adult'];
  $enq_tour_message=$_POST['enq_tour_message'];
  $enq_tour_status= "Pending";

  $statement="insert into tour_enquiry(tour_id, name, email, phone, days, child, adult, message, status) values ('$_SESSION[tour_id]', '$enq_tour_name', '$enq_tour_email', '$enq_tour_phone', '$enq_tour_days', '$enq_tour_child', '$enq_tour_adult', '$enq_tour_message', '$enq_tour_status')";

  if(mysqli_query($conn,$statement))
  {
    $notifyMsg="Enquiry Sent";
  }
  else
  {
    $notifyMsg="Unable to send Enquiry";
    mysqli_error($conn);
  }

  mysqli_close($conn);
}

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Book Package</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

<?php include 'Admin/login.php'; ?>

	<div class="colorlib-loader"></div>

	<div id="page">

<?php include 'nav.php'; ?>

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-16.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Book Package</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
								<?php
							    require 'config.php';

							    $tour_name_query=mysqli_query($conn, "SELECT title from tours where tour_id= $_SESSION[tour_id]");
			                    $tour_name= mysqli_fetch_assoc($tour_name_query);
			                    $tour_title= $tour_name['title'];

									echo "<div class=\"col-md-12 col-md-offset-0 heading2 animate-box\">";
										echo "<h2>$tour_title</h2>";
									echo "</div>";
									echo "<div class=\"row\">";
								
			                    mysqli_close($conn);
								?>			
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
            									  <form role="form" name="tour-enq" method="post" action="">
									                <div class="form-group">
									                  <label>Name</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Your Name" name="enq_tour_name" value="">
									                </div>
									                <div class="form-group">
									                  <label>Email</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Your Email" name="enq_tour_email" value="">
									                </div>
									                <div class="form-group">
									                  <label>Phone</label>
									                  <input type="text" class="form-control" id="enq-input" placeholder="Your Phone Number" name="enq_tour_phone" value="">
									                </div>
									                <div class="form-group">
									                  <label>Number Of Days</label>
									                  <input type="number" class="form-control" id="enq-input" placeholder="Check-In Date" name="enq_tour_days" value="">
									                </div>									                					
									                <div class="form-group">
									                  <label>Child</label>
									                  <input type="number" class="form-control" id="enq-input" placeholder="Number Of Child" name="enq_tour_child" value="">
									                </div>
									                <div class="form-group">
									                  <label>Adult</label>
									                  <input type="number" class="form-control" id="enq-input" placeholder="Number Of Adult" name="enq_tour_adult" value="">
									                </div>
									                <div class="form-group">
									                  <label>Message</label>
                  									  <textarea class="form-control" rows="3" id="enq-textarea" placeholder="Write Your Message" name="enq_tour_message"></textarea>
                  									</div>				

                  									<div class="error">
									                 <?php

									                   if (!empty($notifyMsg)) 
									                   {
									                    echo "<p><span id=\"error\">$notifyMsg</span></p>";
									                   }

									                 ?>
										            </div>		
                  									<button type="submit" class="btn btn-primary">SUBMIT</button>
                  								   </form>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>

<?php include 'sidebar.php'; ?>

				</div>
			</div>
		</div>

	
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Sign Up for a Newsletter</h2>
						<p>Sign up for our mailing list to get latest updates and offers.</p>
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary">Subscribe</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<?php include 'footer.php'; ?>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

