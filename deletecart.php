<?php

include '../connection.php';
$id = $_GET['childid'];
$orderid=$_GET['orderid'];
$qty=$_GET['qty'];

$pdtid=$_GET['pdtid'];
$qry = mysqli_query($conn,"delete from tbl_cchild where cchildid='" . $id . "'");

// $qry1 = mysqli_query("select stock from tbl_product where id='" . $pdtid . "'");
// $EE=mysqli_fetch_array($qry1);
// $qty1=$EE[0];

// $stock=$qty+$qty1;

// $qry2 = mysqli_query("update tbl_product set stock='$stock'  where id='" . $pdtid . "'");
if ($qry) {
    echo'<script>alert("Deleted............")</script>';
    echo '<script>location.href="vieworderdetails.php?orderid='.$orderid.'"</script>';
}

?>