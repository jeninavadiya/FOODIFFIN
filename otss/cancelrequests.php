<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['otssuid']==0))
  {
  header('location:logout.php');
  } 
  else{

    $uid=$_SESSION['otssuid'];


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <title>Online Tiffine Service System - All Tiffin Order</title>
 
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="admin/dist/css/style.min.css" rel="stylesheet">
    <!-- <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="js/jquery.min.js"></script> -->
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->

   
</head>

<body>
  
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include_once('includes/header.php');?>
       

  
        <div class="container">

            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Request</h4>
                             
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Order Number</th>
                                                <th>Cancellation Date</th>
                                                <th>Reason</th>
                                                <!-- <th>Order Date</th> -->
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $arid=$_SESSION['sarid'];
$sql="SELECT * from tblcancel where uid=$uid ORDER BY cid DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php  echo htmlentities($row->OrderNumber);?></td>
                                                <td><?php  echo htmlentities($row->CancellationDate);?></td>
                                                <td><?php  echo htmlentities($row->Reason);?></td>
                                                <?php if($row->Status==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-primary"><?php  echo htmlentities($row->Status);?></span>
                                        </td>
<?php } ?> 
                                                </tr>
                                    <?php $cnt=$cnt+1;}} ?> 
                                        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
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