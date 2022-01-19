<?php
include '../connection.php';
$sid=$_GET["id"];
$brand=$_GET["brand"];
// echo $sid;
// echo "*******************";
$sql = "select * from `tbl_product` where `status`='1' and `scat` ='$sid' and pname='$brand'"; 
// echo $sql;
$result = mysqli_query($conn,$sql);
echo "<option value=''>Select Product</option>";
while($row = mysqli_fetch_array($result))
{
    echo "<option value='".$row[0]."'>".$row['description']."</option>";
  
}
?>
