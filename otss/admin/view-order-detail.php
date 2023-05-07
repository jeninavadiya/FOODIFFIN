<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['otssaid']==0))
  {
  header('location:logout.php');
  } 
else
{

  if(isset($_POST['submit']))
    {
        $vid=$_GET['viewid'];
        $reqid=$_GET['reqid'];
        $status=$_POST['status'];
        $remark=$_POST['remark'];
        $tcost=$_POST['cost'];
        $sql= "INSERT INTO tblhistory(RequestNumber, Remark, Status) VALUES ('$reqid','$remark','$status')";
        // $sql="insert into tblhistory(RequestNumber,Remark,Status) value(:reqid,:remark,:status)";
        // $query=$dbh->prepare($sql);
        // $query->bindParam(':reqid',$reqid,PDO::PARAM_STR); 
        // $query->bindParam(':remark',$remark,PDO::PARAM_STR); 
        // $query->bindParam(':status',$status,PDO::PARAM_STR); 
        // $query->execute();

        $sql= "UPDATE tblorder SET TotalCost='$tcost',Remark='$remark',Status='$status'  WHERE ID='$vid'";
        // $sql= "UPDATE tblorder SET Status=:status,Remark=:remark,TotalCost=:tcost WHERE ID=:viewid";
        // $query=$dbh->prepare($sqla);
        // $query->bindParam(':status',$status,PDO::PARAM_STR);
        // $query->bindParam(':remark',$remark,PDO::PARAM_STR);
        // $query->bindParam(':tcost',$tcost,PDO::PARAM_STR);
        // $query->bindParam(':vid',$vid,PDO::PARAM_STR);
        if (mysqli_query($conn, $sql)) {
          echo '<script>alert("Remark has been updated")</script>';
            echo "<script>window.location.href ='all-order.php'</script>";
        } else {
          echo "Error updating record: " . mysqli_error($conn);
        }
        // $query->execute();

        // $LastInsertId=$dbh->lastInsertId();
        // if ($LastInsertId=$vid) 
        //   {
        //     echo '<script>alert("Remark has been updated")</script>';
        //     echo "<script>window.location.href ='all-order.php'</script>";
        //   }
        // else
        //   {
        //     echo '<script>alert("Something Went Wrong. Please try again")</script>';
        //   }

    
}

  ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <title>Online Tiffine Service System - View Tiffin Order</title>
 
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>

<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include_once('includes/header.php');?>
       
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">View Tiffin Order</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">View Tiffin Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
           
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">View Tiffin Order</h4>
                             
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                      <?php
                               $vid=$_GET['viewid'];

$sql="SELECT tblorder.ID,DATEDIFF(tblorder.ToDate,tblorder.FromDate) as ddf,tblorder.FullName,tblorder.Email,tblorder.Extra,tblorder.Time,tblorder.MobileNumber,tblorder.Time,tblorder.Address,tblorder.OrderDate,tblorder.FromDate,tblorder.ToDate,tblorder.OrderNumber,tblorder.TotalCost,tblorder.Remark,tblorder.Status,tblorder.Quantity, tblorder.UpdationDate,tbltiffin.Type,tbltiffin.Title,tbltiffin.Description,tbltiffin.Cost,tbltiffin.Image from  tblorder join  tbltiffin on tbltiffin.ID=tblorder.TiffinID where tblorder.ID=:vid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
 <table border="1" class="table table-bordered">
   <tr align="center"><td colspan="4" style="font-size:20px;color:blue">Order Details</td></tr>
   <tr align="center"><td colspan="4" style="font-size:20px;color:red">Order Number:   <?php  echo $row->OrderNumber;?></td></tr>
    <tr>
      <th scope>Full Name</th>
      <td><?php  echo $row->FullName;?></td>
      <th scope>Email</th>
      <td><?php  echo $row->Email;?></td>
    </tr>
    <tr>
      <th scope>Mobile Number</th>
      <td><?php  echo $row->MobileNumber;?></td>
      <th>Address</th>
      <td><?php  echo $row->Address;?></td>
    </tr>
    <tr>
      <th>Order Date</th>
      <td><?php  echo $row->OrderDate;?></td>
      <th>Quantity</th>
      <td><?php  echo $qty= $row->Quantity;?></td>  
    </tr>
    <tr>
    <th>From Date</th>
      <td><?php  echo $row->FromDate;?></td>
      <th>To Date</th>
      <td><?php  echo $row->ToDate;?></td>
    </tr>
    <tr>
      <th>Total Days</th>
      <td><?php  echo $ddf=$row->ddf;?></td>
      <th>Tiffin Price</th>
      <td><?php  echo $tp=$row->Cost;?></td>
    <tr>
    <tr>
      <th>Extra Roti</th>
      <td><?php  echo $er=$row->Extra;?></td>
      <th>Time</th>
      <td><?php  echo $tt=$row->Time;
      ?></td>
    <tr>
     <th>Total Cost</th>
      <td><?php $tc=$ddf*$tp*$qty+(10*$er);
      if($tt=='both'){
        $tc=($tc*2);
      }
      echo $tc;
      
      ?></td>
      <th>Tiffin Service Name</th>
     <td><?php  echo $row->Title;?></td>
    </tr>
    <tr>
      <th>Tiffin Description</th>
      <td><?php  echo $row->Description;?></td>
      <th>Tiffin Type</th>
      <td><?php  echo $row->Type;?></td>
    </tr>
  <tr>
    <th>Image</th>
    <td><img src="images/<?php echo $row->Image;?>" width="200" height="150" value="<?php  echo $row->Image;?>"></td>
    <th>Order Final Status</th>
    <td style="color: blue"> <?php  $status=$row->Status;
          
      if($row->Status=="Confirmed")
      {
        echo "Your Order has been Confirmed";
      }

      if($row->Status=="Cancellled")
      {
      echo "Your Order has been cancelled";
      }


      if($row->Status=="")
      {
        echo "Not Response Yet";
      }


      ;?>
     </td>
  </tr>
<?php }}?>
</table>
<?php  if($status!=''){
$ret="select * from tblorder  where tblorder.ID=:vid";
$query = $dbh -> prepare($ret);
$query-> bindParam(':vid', $vid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;


 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="5" style="color: blue">Response History</th> 
  </tr>
  <tr style="color: red">
    <th>#</th>
<th>TotalCost</th>
<th>Remark</th>
<th>Status</th>
<th>Response Time</th>
</tr>
<?php  
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
<tr>
    <td><?php echo $cnt;?></td>
    <td><?php  echo $row->TotalCost;?></td> 
    <td><?php  echo $row->Remark;?></td>
    <td><?php  echo $status=$row->Status;?></td> 
    <td><?php  echo $row->UpdationDate;?></td> 
</tr>
<?php $cnt=$cnt+1;}} }?>
</table>
<?php 

if ($status==""){
?> 
<p align="center"><button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form method="post" name="submit"> -->
      <form action="" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <table class="table table-bordered table-hover data-tables">                          
              <tr>
                <th>Remark :</th>
                <td>
                <textarea name="remark" placeholder="Write Remark..." rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
              </tr>  
              <tr>
                <th>Total Cost :</th>
                <td>
                <input name="cost" value="<?php echo $tc?>" class="form-control wd-450" required="true" readonly></td>
              </tr>                         
              <tr>
                <th>Status :</th>
                  <td>
                    <select type="text" id="" name="status" value="" class="form-control wd-450" required="true">
                      <option value="Confirmed" selected="true">Confirmed</option>
                      <option value="Cancellled">Cancellled</option>
                    </select>
                  </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
                                
                            
      </div>
  </div>
</div>
            </div>
  
<?php include_once('includes/footer.php');?>
</div>
</div>
   
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>
<?php }  ?>