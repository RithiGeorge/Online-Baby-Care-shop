<?php
include 'customerbase.php';
?>


</style>
<br>

<table id="customers" style="width:1360px;">
    <tr>  <th>ID</th>
        <th>Product Name</th>


        <th>Category</th>

        <th>Rate</th>
        <th>Description</th>
       
        <th>Image</th>
        <th>Quantity</th>
        <th>ACTION</th>
    </tr>
   
    <?php
    $pid=$_GET['pid'];
    // $masterid=$_GET['bmid'];
    // $date=$_GET['date'];
    include '../connection.php';
 
    // $qry = mysql_query("select tbl_product.*,tbl_category.cname from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat and tbl_product.scat='$id'");
  $er="select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat and tbl_product.id='$pid' and tbl_product.stock>'0'";
    $qry = mysqli_query($conn,$er);
   if($qry>'0'){
    while ($row = mysqli_fetch_array($qry)) {
     
echo '<form method="POST" action="cartin.php">';
        // echo "<tr><td>" . $row['id'] . "</td><td>" . $row['pname'] . "</td><td>" . $row['category'] . "</td><td>" . $row['rate'] . "</td><td>" . $row['description'] . "</td><td><img src='" . $row['itemimage'] . "' alt='aa' style='width:100px;height:100px;'></td><td><a style='color:blue';><td><a href='order.php?id=" . $row['id'] . "&rate=" . $row['rate'] . "&orderid=".$masterid."&date=".$date." >NEXT</a></td></tr>";
         echo '<tr><td><input type="text" style="width:100px;border: none;" name="a" value="' . $row['id'] . '"</td><td><input type="text" style="width:100px;border: none;" name="b" value="' . $row['pname'] . '"</td><td><input type="text" style="width:150px;border: none;" name="c" value="' . $row['category'] . '"</td><td><input type="text" style="width:100px;border: none;" name="d" value="' . $row['rate'] . '"</td><td><input type="text" style="width:200px;border: none;" name="e" width="600px" value="' . $row['description'] . '"</td><td><img src="' . $row['itemimage'] . '" alt="aa" style="width:100px;height:100px;"> </td><td>   <input name="qty" type="number" min="1" max="'.$row['stock'].'" style="border-radius: 0.2rem;width:80px;" class="form-control"   placeholder="Qty"  required></td><td><input type="submit" value="Add to cart" class="btn btn-success"></tr>';
  echo ' <input name="val" type="hidden" value="0" id="val">';
  echo ' <input name="subcatid" type="hidden" value="'.$pid.'" id="val">';
         echo '</form>';
        }
}
else{
    echo '<script> alert("Stock over")</script>';
}
    ?>
</table>

<?php
include '../footer.php';
?>
