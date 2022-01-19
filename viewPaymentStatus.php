<?php
include 'adminbase.php';
?>
<style>
th{
    background-color:rgb(66, 143, 117);
}
th,td{
    padding:10px;
    text-align:center;
}
    </style>
<!-- 
<form method="POST">

    <table align="center">


        <tr><td>Please Enter the requested date</td><td><input type="date" name="rdate" required class="form-control"></td></tr>
        <tr><td><input type="submit" name="submit" value="Search" class="btn btn-success" align="center"></td></tr>

    </table></form>


<BR><BR><BR> -->
<?php
// if (isset($_POST['submit'])) {
// $reqdate = $_POST['rdate'];
include '../connection.php';
$qry = mysqli_query($conn,"select  distinct tbl_cmaster.orderid,tbl_customer.fname,tbl_customer.lname,tbl_customer.phone,tbl_product.`id` AS productid,tbl_category.cname,tbl_subcat.category,tbl_product.`pname`,tbl_cchild.`qty`,tbl_cchild.`totalprice`,tbl_payment.pdate FROM tbl_cmaster,tbl_cchild,tbl_product,tbl_customer,tbl_category,tbl_subcat,tbl_payment WHERE 
tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_product.id=tbl_cchild.itemid and tbl_category.id=tbl_product.cat and tbl_subcat.scid =tbl_product.scat and tbl_category.id=tbl_subcat.catid  and tbl_payment.custid=tbl_customer.id and tbl_cmaster.status='Order Placed' 
 and tbl_cchild.custid=tbl_customer.id and tbl_cmaster.custid=tbl_cchild.custid and tbl_payment.orderid=tbl_cmaster.orderid");
 

if (mysqli_fetch_array($qry) > 0) {
    ?>
    <div style="overflow:auto">
    <table id="customers" style="margin-left:100px;">
        <th> CUSTOMER NAME    </th>
        <th> PHONE    </th>
    
      
        <th> PRODUCT </th>
    
        <th> CATEGORY    </th>
        <th> SUBCATEGORY    </th>
        <th> QUANTITY    </th>
        <th> AMOUNT    </th>
        <th> ORDER DATE    </th>
       
      
       

        <?php
       $qry = mysqli_query($conn,"select  distinct tbl_cmaster.orderid,tbl_customer.fname,tbl_customer.lname,tbl_customer.phone,tbl_product.`id` AS productid,tbl_category.cname,tbl_subcat.category,tbl_product.`pname`,tbl_cchild.`qty`,tbl_cchild.`totalprice`,tbl_payment.pdate FROM tbl_cmaster,tbl_cchild,tbl_product,tbl_customer,tbl_category,tbl_subcat,tbl_payment WHERE 
       tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_product.id=tbl_cchild.itemid and tbl_category.id=tbl_product.cat and tbl_subcat.scid =tbl_product.scat and tbl_category.id=tbl_subcat.catid  and tbl_payment.custid=tbl_customer.id and tbl_cmaster.status='Order Placed' 
        and tbl_cchild.custid=tbl_customer.id and tbl_cmaster.custid=tbl_cchild.custid and tbl_payment.orderid=tbl_cmaster.orderid");
        
        while ($row = mysqli_fetch_array($qry)) {
            echo '<tr><td>' . $row['fname'] . ' '.  $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['pname'] . '</td><td>'. $row['cname'] .'</td><td>' . $row['category'] .'</td><td>'. $row['qty'] .'</td><td>'. $row['totalprice'] . '</td><td>' . $row['pdate'] . '</td></tr>';
        }
    } else {
        ?>

   <h1>No Payment Details Available</h1>

    <?php
}

?>

</table>

</div>
<?php
include '../footer.php';
?>