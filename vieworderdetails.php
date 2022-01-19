<?php
include 'customerbase.php';
include '../connection.php';
?>

<br><br>

<style>
th{
    background-color:rgb(66, 143, 117);
}
th,td{
    padding:10px;
    text-align:center;
}
    </style><br>

<?php
    session_start();
    $custid = $_SESSION['id'];
    // echo $custid;
    $orderid=$_GET['orderid'];
    include '../connection.php';
    // $qry = mysqli_query("SELECT DISTINCT tbl_product.pname,tbl_cmaster.orderid,tbl_cmaster.totalprice,tbl_cmaster.status,tbl_cchild.date,tbl_category.cname,tbl_subcat.category from tbl_cmaster,tbl_cchild,tbl_subcat,tbl_category,tbl_product where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_cmaster.custid='$custid' and tbl_cmaster.status='added' and tbl_subcat.catid=tbl_category.id and tbl_cchild.itemid=tbl_product.id and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid");
    $qry = mysqli_query($conn,"SELECT tbl_cmaster.orderid,tbl_cchild.totalprice,tbl_cchild.date,tbl_product.id,tbl_product.pname,tbl_product.description,tbl_category.cname,tbl_subcat.category from tbl_cmaster,tbl_cchild,tbl_product,tbl_subcat,tbl_category where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_product.id=tbl_cchild.itemid and tbl_cmaster.custid='$custid' and tbl_cchild.cmasterid='$orderid' and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid");
if (mysqli_fetch_array($qry) > 0) {
    ?>
<table border="1" style="margin-left:190px;">
    <th> BRAND NAME  </th>
    <th> CATEGORY </th>
   
    <th> SUBCATEGORY   </th>
    <th> DESCRIPTION</th>
 
    <th>AMOUNT </th>
    <th>ACTION </th>
    <?php
    $orderid=$_GET['orderid'];
    include '../connection.php';
    // $qry = mysqli_query("SELECT DISTINCT tbl_product.pname,tbl_cmaster.orderid,tbl_cmaster.totalprice,tbl_cmaster.status,tbl_cchild.date,tbl_category.cname,tbl_subcat.category from tbl_cmaster,tbl_cchild,tbl_subcat,tbl_category,tbl_product where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_cmaster.custid='$custid' and tbl_cmaster.status='added' and tbl_subcat.catid=tbl_category.id and tbl_cchild.itemid=tbl_product.id and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid");
    $qry = mysqli_query($conn,"SELECT tbl_cmaster.orderid,tbl_cchild.totalprice,tbl_cchild.date,tbl_product.id,tbl_product.pname,tbl_product.description,tbl_category.cname,tbl_subcat.category from tbl_cmaster,tbl_cchild,tbl_product,tbl_subcat,tbl_category where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_product.id=tbl_cchild.itemid and tbl_cmaster.custid='$custid' and tbl_cchild.cmasterid='$orderid' and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid");
if (mysqli_fetch_array($qry) > 0) {
    //      $qry1 = mysqli_query("SELECT count(tbl_cmaster.orderid) from tbl_cmaster,tbl_cchild,tbl_product,tbl_subcat,tbl_category where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_product.id=tbl_cchild.itemid and tbl_cmaster.custid='$custid' and tbl_cchild.cmasterid='$orderid' and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid");
    //   $ws=mysqli_fetch_array($qr1);
    //   $cnt=$ws[0];
    //   if($cnt>0)
    //   {
     $qry = mysqli_query($conn,"SELECT tbl_cmaster.orderid,tbl_cchild.cchildid,tbl_cchild.qty,tbl_cchild.totalprice,tbl_cchild.date,tbl_product.id,tbl_product.pname,tbl_product.description,tbl_category.cname,tbl_subcat.category from tbl_cmaster,tbl_cchild,tbl_product,tbl_subcat,tbl_category where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_product.id=tbl_cchild.itemid and tbl_cmaster.custid='$custid' and tbl_cchild.cmasterid='$orderid' and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid");
     $i=0;
        while ($row = mysqli_fetch_array($qry)) {
            $i++;
        echo '<tr><td>' . $row['pname'] . '</td><td>' . $row['cname'] . '</td><td>' . $row['category'] . '</td><td>' . $row['description'] . '</td><td>' . $row['totalprice'] . '</td><td><a href="deletecart.php?childid=' . $row['cchildid'] . '&orderid='.$orderid.'&qty='. $row['qty'] .'&pdtid='. $row['id'] .'" class="btn btn-success">DELETE</a></td></tr>';
    }

   
    
    ?>

</table>
<?php
 echo '<h2 style="margin-left:700px;"><a class="btn btn-success" href="pay.php?orderid='.$orderid.'" >PAYMENT</a></h2>';
}
}
 ?>
</form>
<!-- <form method="POST" action="pay.php">
<input type="hidden" name="cout" value="<?php echo $orderid?>">
            <button  class="btn btn-success" name="submit5" style="margin-left:1100px;">payment</button>
        </form> -->

<?php
include '../footer.php';
?>