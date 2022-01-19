<?php
include '../connection.php';
$sid=$_GET["id"];
// echo $sid;
// echo "*******************";
$sql = "select * from `tbl_subcat` where `status`='1' and `catid` ='$sid'"; 
$result = mysqli_query($conn,$sql);
echo "<option value=''>Select subcategory</option>";
while($row = mysqli_fetch_array($result))
{
    echo "<option value='".$row[0]."'>".$row['category']."</option>";
  
}
?>
