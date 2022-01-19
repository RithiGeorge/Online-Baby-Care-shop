<?php
include '../Connection.php';
session_start();
$cid=mysqli_real_escape_string($conn,$_GET['cid']);

$sql_fetch_cc="SELECT * FROM tbl_cchild WHERE cchildid='$cid'";
$sql_exe_cc=mysqli_query($conn,$sql_fetch_cc);
$cc=mysqli_fetch_array($sql_exe_cc);

$cmid=$cc['cmasterid'];

$tp=$cc['totalprice'];

$sql_fetch_cm="SELECT * FROM tbl_cmaster WHERE orderid='$cmid'";
$sql_exe_cm=mysqli_query($conn,$sql_fetch_cm);
$cm=mysqli_fetch_array($sql_exe_cm);

$ta=$cm['totalprice']-$tp;

$sql_update_cm="UPDATE tbl_cmaster SET totalprice='$ta' WHERE orderid='$cmid'";
$sql_cmast=mysqli_query($conn,$sql_update_cm);

if($sql_cmast)
{
$del="DELETE FROM tbl_cchild WHERE cchildid='$cid'";
$del_exe=mysqli_query($conn,$del);
header('Location: Cart.php');
$_SESSION['status']="Remove";
}
else
{
    header('Location: Cart.php');
$_SESSION['status']="NoRemove";
}
mysqli_close($conn);
?>