<?php
include 'customerbase.php';
include '../connection.php';
?>

<br><br><br>
<style>
th{
    background-color:rgb(66, 143, 117);
}
th,td{
    padding:10px;
    text-align:center;
}
    </style>
<?php
    session_start();
    $custid = $_SESSION['id'];
    // echo $custid;
    // $orderid=$_GET['orderid'];
    include '../connection.php';
    $qry = mysqli_query($conn,"SELECT tbl_cmaster.orderid,tbl_cmaster.totalprice,tbl_cchild.date from tbl_cmaster,tbl_cchild where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_cmaster.custid='$custid' and  tbl_cmaster.status<>'added'");
if (mysqli_fetch_array($qry) > 0) {
    ?>
<table border="1" style="margin-left:150px;">
    <th> ORDER ID    </th>
    
    <th> BRAND NAME </th>
    <th> CATEGORY </th>
    <th> SUBCATEGORY</th>
    <th> TOTAL PRICE </th>
 
    <th> DELIVERY  DATE </th>
    <th> BOOKING STATUS </th>
    <!-- <th> ACTION</th> -->
    <?php
        
      
    //  $qry = mysqli_query("SELECT DISTINCT tbl_cmaster.orderid,tbl_cmaster.totalprice,tbl_cmaster.status,tbl_cchild.date,tbl_category.cname from tbl_cmaster,tbl_cchild,tbl_category where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_cmaster.custid='$custid' and  tbl_cmaster.status<>'added'");
    $qry = mysqli_query($conn,"SELECT tbl_cmaster.status,tbl_cmaster.orderid,tbl_cchild.totalprice,tbl_cchild.date,tbl_product.id,tbl_product.pname,tbl_product.description,tbl_category.cname,tbl_subcat.category from tbl_cmaster,tbl_cchild,tbl_product,tbl_subcat,tbl_category where tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cmaster.custid=tbl_cchild.custid and tbl_product.id=tbl_cchild.itemid and tbl_cmaster.custid='$custid'  and tbl_product.cat=tbl_category.id and tbl_product.scat=tbl_subcat.scid and tbl_cmaster.custid='$custid' and  tbl_cmaster.status<>'added'");
     $i=0;
        while ($row = mysqli_fetch_array($qry)) {
            $i++;
        echo '<tr><td>' . $row['orderid'] . '</td><td>' . $row['pname'] . '</td><td>' . $row['cname'] . '</td><td>' . $row['category'] . '</td><td>' . $row['totalprice'] . '</td><td>' . $row['date'] . '</td><td>' . $row['status'] . '</td>';
    //     if($row['status']=='added')
    //     {
    //    echo' <td><a style="color:blue;" href="vieworderdetails.php?orderid='.$row['orderid'].'">make payment</a></td></tr>';
    //     }
    }
    } else {
        ?>

        <!-- <img src="../images/no_data_found.png" width="30%" height="30%" >
         -->
        <?php
    }
    ?>

</table>
</form>


<?php
include '../footer.php';
?>