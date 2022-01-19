<?php
include 'customerbase.php';
include '../connection.php';
?>

<br><br><br>

 <?php
    session_start();
    $custid = $_SESSION['id'];
    include '../connection.php';
    $qry = mysqli_query($conn,"SELECT tbl_order.id,tbl_product.`id` AS productid,tbl_category.cname,tbl_subcat.category,tbl_product.`pname`,tbl_order.`qty`,tbl_order.`totalprice`,tbl_order.`reqdate`,tbl_order.odate,tbl_order.status FROM tbl_order,tbl_product,tbl_customer,tbl_category,tbl_subcat WHERE tbl_product.`id`=tbl_order.`productid` AND tbl_customer.`id`=tbl_order.`custid` AND tbl_customer.id='$custid' and tbl_category.id=tbl_subcat.catid and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_order.status='ordered'");
if (mysqli_fetch_array($qry) > 0) {
    ?>
<table id="customers">
    <th> ORDER ID    </th>
   
    <th>PRODUCT CATEGORY </th>
    <th>SUB CATEGORY </th>
    <th> PRODUCT NAME </th>
    <th> QUANTITY </th>

    <th> TOTAL PRICE </th>
    <th> REQUIRED DATE </th>
    <th> ORDER DATE </th>
<th></th>
       <?php 
          $qry = mysqli_query($conn,"SELECT tbl_order.id,tbl_product.`id` AS productid,tbl_category.cname,tbl_subcat.category,tbl_product.`pname`,tbl_order.`qty`,tbl_order.`totalprice`,tbl_order.`reqdate`,tbl_order.odate,tbl_order.status FROM tbl_order,tbl_product,tbl_customer,tbl_category,tbl_subcat WHERE tbl_product.`id`=tbl_order.`productid` AND tbl_customer.`id`=tbl_order.`custid` AND tbl_customer.id='$custid' and tbl_category.id=tbl_subcat.catid and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_order.status='ordered'");
 
       while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['cname'] . '</td><td>' . $row['category'] . '</td><td>' . $row['pname'] . '</td><td>' . $row['qty'] . '</td><td>' . $row['totalprice'] . '</td><td>' . $row['reqdate'] . '</td><td>' . $row['odate'] . '</td><td><a href="pay.php?id=' . $row['id'] . '" class="btn btn-success">PAY NOW</a></td></tr>';
    }
    } else {
        ?>

        <img src="../images/no_data_found.png" width="30%" height="30%" >
        
        <?php
    }
    ?>

</table>
</form>


<?php
include '../footer.php';
?>