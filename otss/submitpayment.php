<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
require('config.php');
echo '<script>alert("Payment Successfull")</script>';
echo "<script>window.location.href ='my-order.php'</script>";
?>