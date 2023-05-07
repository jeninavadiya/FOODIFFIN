<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require('config.php');
$stc=$_SESSION['tcost'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Tiffin Service System | Tiffin Page</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- Custom Theme files -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--Animation-->
<script src="js/wow.min.js"></script>
<!-- <link href="css/animate.css" rel='stylesheet' type='text/css' /> -->
<script>
	new WOW().init();
</script>
<script src="js/simpleCart.min.js"> </script>	
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
</head>
<body>
    <!-- header-section-starts -->
	<div class="header">
		<?php include_once('includes/header.php');?>
		
	<!-- header-section-ends -->
	<!-- content-section-starts -->
	<div class="content">
		<div class="ordering-section" id="Order">
		<div class="popular-restaurents" id="Popular-Restaurants">
			<div class="container">
			<div class="special-offers-section-head text-center dotted-line">
					<div>
						<h3>Options</h3>
					</div>
					<br>
					<br>
					<div class="top-cuisine-grids">

<form action="submitpayment.php" method="POST">
    <script 
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $publishablekey ?>"
    data-amount="<?php echo $stc*100 ?>"
    data-name="Foodiffin"
    data-description="Online Tiffin Service System"
    data-image="/images/plogo.jpg"
    data-currency="inr"
    data-email="foodiffin@mail.com"
    >
    </script>
</form>
<br>
<p>---OR---</p>
<br>

  <a href="or.php"><input name="Submit2" type="submit" class="btn btn-primary" style="color: white;font-size: 18px" value="Pay With QR" style="cursor: pointer;"  /></a>

<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	
	
	</div>
	<!-- content-section-ends -->
	<!-- footer-section-starts -->
<?php include_once('includes/footer.php');?>
	<!-- footer-section-ends -->
	  <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

</body>
</html>