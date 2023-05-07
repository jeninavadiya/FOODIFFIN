<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['otssuid']==0)) 
  {
  header('location:logout.php');
  } 
else
{
 if(isset($_POST['submit']))
  {
        $invid=$_GET['invid'];

		$tid=$_GET['oid'];
		$crid=$_POST['crid'];
		$uid=$_SESSION['otssuid'];
		$stc=$_SESSION['tcost'];
		$crid=$_POST['crid'];

		$onum=$_POST['ordernumber'];
		$reason=$_POST['reason'];
		$cdate=$_POST['cdate'];
		
		
		$sql="INSERT INTO tblcancel(OrderNumber, CancellationDate, Reason, uid, Rid) VALUES ('$onum','$cdate','$reason','$uid','$crid')";
		if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Cancellation Request Sent !")</script>';
			// echo '<script>alert("Your tiffin has been order successfully . Your Order number is "+"'.$crid.'")</script>';

            echo "<script>window.location.href ='cancelrequests.php'</script>";

          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Online Tiffin Service System</title>
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
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
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
<script src="js/simpleCart.min.js"> </script>	
</head>
<body>
    <!-- header-section-starts -->
	<div class="header">
		
		<?php include_once('includes/header.php');?>
	<!-- header-section-ends -->
	<div class="contact-section-page">
		<div class="contact-head">
		    <div class="container">
				<h3>One Day Cancle Request </h3>
				<p>Home/Cancle</p>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-8 contact_left wow fadeInRight" data-wow-delay="0.4s">
			 				<h4>Fill Details...</h4>
			 				<!-- <p>Ordering Food Was Never So Simple !!!!!!.</p> -->
							  <form method="post">
								 <div class="form_details">

<p><strong>Order Number</strong><br />         
<input type="text" class="text" placeholder="Order Number" readonly="true" name="ordernumber" value="<?php     $invid=$_GET['invid']; echo $invid ?>"></p>
								<?php } ?>
									 <div class="clearfix"> </div>
									 <p>Cancelation Date: </p>
									 <input type="date" class="qty" id="fdt" required="true" name="cdate"  style="margin-top: -1%">
									 <div class="clearfix" style="padding-top: 20px"> </div>
									 
									 <!-- <p>Time Slot:</p>
											<select type="text" id="" name="timeslot" value="" class="form-control wd-450" required="true">
											<option value="11 To 2" selected="true">11 To 2</option>
											<option value="8 to 11">8 to 11</option>
											<option value="both">Both Time</option>
											</select> -->
										
									 <!-- <div class="clearfix" style="padding-top: 20px"> </div> -->
									 <!-- <div class="clearfix"> </div> -->
									 <p>Reason:</p>
									 <input type="text" name="reason" placeholder="Reason" required="true" style="margin-top: -1%">
                                     <div class="clearfix" style="padding-top: 20px"> </div>
									 <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
									<?php $sql="SELECT * from tblorder WHERE OrderNumber= $invid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{        $rid=$row->Rid ;
		
?>	
	 <input type="text" name="crid" placeholder="<?php echo $rid; ?>" value="<?php echo $rid; ?>" style="margin-top: -1%">

<?php $cnt=$cnt+1;}} ?>

									 	<input name="submit" type="submit" value="Request Now" >
</form>
									 </div>
						          </div>
						       
					        </div>
					        <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
					        	
								
								
								


					        	
                            </div>
	 
	</div>

	<?php include_once('includes/footer.php');?>
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