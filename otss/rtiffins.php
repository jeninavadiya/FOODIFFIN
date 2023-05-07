<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
						<h3>Food Available</h3>
					</div>
					<br>
					<br>
					<div class="top-cuisine-grids">
						<?php
						$rid=$_GET['rid'];
                   $sql="SELECT * from tbltiffin WHERE rid= $rid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="col-md-4" data-wow-delay="0.4s">
							
						    <a href="order.php?oid=<?php echo $row->ID;?>"><img  src="admin/images/<?php echo $row->Image;?>"  width="300" height="200" /> </a>
						    
							<label style="padding-top: 20px;padding-bottom: 20px"><?php  echo htmlentities($row->Title);?>: ₹<?php  echo htmlentities($row->Cost);?></label>

					    </div>
						
					<?php $cnt=$cnt+1;}} ?>
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