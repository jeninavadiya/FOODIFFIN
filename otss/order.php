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
		$tid=$_GET['oid'];
		
		$uid=$_SESSION['otssuid'];
		$stc=$_SESSION['tcost'];
		$fullname=$_POST['fullname'];
		$rid=$_POST['rid'];
		$tp=$_POST['tp'];
		$email=$_POST['email'];
		$oextra=$_POST['extra'];
		$mobnum=$_POST['mobnum'];
		$quantity=$_POST['quantity'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$time=$_POST['timeslot'];
		$address=$_POST['address'];
		$ordernumber = mt_rand(100000000, 999999999);
		
		$sql="insert into tblorder(TiffinID,UserID,Rid,OrderNumber,FullName,Email,MobileNumber,Quantity,Extra,FromDate,ToDate,Time,Address)values(:tid,:uid,:rid,:ordernumber,:fullname,:email,:mobnum,:quantity,:oextra,:fromdate,:todate,:time,:address)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':tid',$tid,PDO::PARAM_STR);
		$query->bindParam(':uid',$uid,PDO::PARAM_STR);
		$query->bindParam(':rid',$rid,PDO::PARAM_STR);
		$query->bindParam(':oextra',$oextra,PDO::PARAM_STR);
		$query->bindParam(':ordernumber',$ordernumber,PDO::PARAM_STR);
		$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
		$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
		$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
		$query->bindParam(':todate',$todate,PDO::PARAM_STR);
		$query->bindParam(':time',$time,PDO::PARAM_STR);
		$query->bindParam(':address',$address,PDO::PARAM_STR);
		$query->execute();

		$LastInsertId=$dbh->lastInsertId();
	if ($LastInsertId>0) 
		{
			// echo '<script>alert("Your tiffin has been order successfully . Your Order number is "+"'.$ordernumber.'")</script>';
			// echo '<script>alert("Your tiffin has been order successfully . Your Order number is "+"'.($oextra*10)+$tp*$quantity.'")</script>';
			echo "<script>window.location.href ='final-order.php?invid=$ordernumber'</script>";
		}
	else
		{
			echo '<script>alert("Something Went Wrong. Please try again")</script>';
		}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Online Tiffin Service System | Order Page</title>
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
				<h3>Tiffin Order</h3>
				<p>Home/Tiffin Order</p>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-8 contact_left wow fadeInRight" data-wow-delay="0.4s">
			 				<h4>Tiffin Order Form</h4>
			 				<p>Ordering Food Was Never So Simple !!!!!!.</p>
							  <form method="post">
								 <div class="form_details">
<?php
$uid=$_SESSION['otssuid'];
$sql ="SELECT Email,FullName,MobileNumber FROM tbluser WHERE ID=:uid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
foreach ($results as $result) {
?>

<p><strong>Name</strong><br />         
<input type="text" class="text" placeholder="Name" readonly="true" name="fullname" value="<?php echo htmlentities($result->FullName)?>"></p>
<input type="text" class="text" placeholder="Email Address"  readonly="true" name="email" value="<?php echo htmlentities($result->Email)?>">
<input type="text" class="text" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+" readonly="true" name="mobnum" value="<?php echo htmlentities($result->MobileNumber)?>">
								<?php } ?>
									 <input type="text" class="qty" id="qty" placeholder="Tiffin Quantity(eg:1,2 etc)"  required="true" name="quantity">
									 <input type="text" class="qty" id="ext" placeholder="Extra Roti"  required="true" name="extra">
									  <div class="clearfix"> </div>
									 <p>From Date: </p>
									 <input type="date" class="qty" id="fdt" required="true" name="fromdate"  style="margin-top: -1%">
									 <div class="clearfix" style="padding-top: 20px"> </div>
									 <p>To Date: </p>
									 <input type="date" class="qty" id="tdt" required="true" name="todate" style="margin-top: -1%">
									 <div class="clearfix" style="padding-top: 20px"> </div>
									 <p>Time Slot:</p>
											<select type="text" id="" name="timeslot" value="" class="form-control wd-450" required="true">
											<option value="11 To 2" selected="true">11 To 2</option>
											<option value="8 to 11">8 to 11</option>
											<option value="both">Both Time</option>
											</select>
										
									 <div class="clearfix" style="padding-top: 20px"> </div>
									 <textarea name="address" rows="2" placeholder="Address" required="true"></textarea>
						
<div class="clearfix" style="padding-top: 20px"> </div>
									 <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
									 		

									 	<input name="submit" type="submit" value="Order Now" >
									 </div>
						          </div>
						       
					        </div>
					        <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
					        	<?php
					        	$oid=$_GET['oid'];
								
								
								
                   $sql="SELECT * from tbltiffin where ID=$oid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
					        	<div>
			<img src="admin/images/<?php echo $row->Image;?>" width="400" height="400" />
		</div>
      
	  <div class="company-right">
	  							
		  					<div class="company_ad">
										<div class="follow-us">
											<h4>Restaurant:
											<?php  echo htmlentities($row->Rname);?></h4>
											<br>
										</div>
							     		<h4>Tiffin Title:
							     		<span><?php  echo htmlentities($row->Title);?></span></h4>
										<br>
										<h4>Cost :  <?php  echo htmlentities($row->Cost);?>
										<input type="hidden" class="text" readonly="true" name="tp" value="<?php echo htmlentities($row->Cost)?>"></p>
											
										</h4>
									   	<br>
							   		</div>
									</div>	
									<div class="follow-us">
										<h4>Description:</h4>
										<h4><?php  echo htmlentities($row->Description);?></h4>
										<br>
										<br>
										<br>
									</div>
									<div class="follow-us">
										<h4><strong>Extra Roti Prise: ₹10</strong></h4>
									</div>
									<div class="follow-us">
										<input type="hidden" class="text" readonly="true" name="rid" value="<?php echo htmlentities($row->rid)?>"></p>
									</div>
							 </div>
							 <?php $cnt=$cnt+1;}} ?>
						</div>
					</div>
					</form>
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
</html><?php }  ?>