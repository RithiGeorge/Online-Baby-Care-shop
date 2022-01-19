<?php
include '../connection.php';
session_start();

$itemid= $tp= $ta= $sp= $qty= $cmid= $ccid="";
function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $itemid=test_input($_POST["item"]);
    $qty=test_input($_POST["qty"]);
    $sp=test_input($_POST["sp"]);
    $tp=test_input($_POST["tp"]);
    $ta=test_input($_POST["ta"]);
    $ccid=test_input($_POST["ccid"]);
    $cmid=test_input($_POST["cmid"]);
    


  $ta=$ta-$tp;

  $tp=$qty*$sp;

  $ta=$ta+$tp;
  $y="select SUM(totalprice) from tbl_cchild where cmasterid='$cmid'";
$rr=mysqli_query($conn,$y);
$rt=mysqli_fetch_array($rr);
$rtt=$rt[0];

// $qqq="update tbl_cmaster set totalprice='$rtt' where orderid='$orderid'";
// $qee=mysql_query($qqq);  
//   if($_SESSION['user_type']=='customer')
// {

  $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$itemid'";
  $sql_item_details=mysqli_query($conn,$sql_fetch_item);
  $sql_item=mysqli_fetch_assoc($sql_item_details);

  if($sql_item['stock']>=$qty)
  {

  $sql_update_cc="UPDATE tbl_cchild SET totalprice='$tp', qty='$qty' WHERE cchildid='$ccid' AND itemid='$itemid'";
  echo $sql_update_cc;
  $sql_cchild=mysqli_query($conn,$sql_update_cc);
  }
  
  if($sql_cchild)
  {
    $y="select SUM(totalprice) from tbl_cchild where cmasterid='$cmid' AND cstatus='Order Pending'";
    echo $y;
    $rr=mysqli_query($conn,$y);
    $rt=mysqli_fetch_array($rr);
    $rtt=$rt[0];
  $sql_update_cm="UPDATE tbl_cmaster SET totalprice='$rtt' WHERE orderid='$cmid' AND status='Order Pending'";
  // echo $sql_update_cm;
  $sql_cm=mysqli_query($conn,$sql_update_cm);
  }
// }
 
  if($sql_cm)
  {
    header('Location: Cart.php');
    $_SESSION['status']="Add";
  }

  else
  {
    header('Location: Cart.php');
    $_SESSION['status']="Noadd";
  }

}

else
{
  header("refresh:0; url=Cart.php");
    $_SESSION['status']="Nocart";
}
  // }
  mysqli_close($conn);
  ?>