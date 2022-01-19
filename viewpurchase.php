<?php
include 'adminbase.php';
?>
<style>
th{
    background-color:#900C3F;
    color:white;
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
$qry = mysqli_query($conn,"select tbl_staff.fname,tbl_staff.lname, tbl_category.cname,tbl_subcat.category,tbl_product.pname,tbl_product.stock,tbl_purchasechild.costprice,tbl_purchasechild.totalprice,tbl_purchasechild.quantity,tbl_purchasechild.date,tbl_supplier.supname from tbl_product,tbl_purchasechild,tbl_purchasemaster,tbl_category,tbl_subcat,tbl_supplier,tbl_staff where tbl_purchasechild.pmasterid=tbl_purchasemaster.pmasterid and tbl_product.id=tbl_purchasechild.itemid and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_category.id=tbl_subcat.catid and tbl_purchasemaster.supid=tbl_supplier.sup_id and tbl_staff.sid=tbl_purchasemaster.staffid");
 

if (mysqli_fetch_array($qry) > 0) {
    ?>
    <div style="overflow:auto;margin:120px;">
    <h1>Purchase Details</h1>
    <table id="data" border="1" >
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Purchase ID</th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Staff Name</th>
                 <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Supplier Name</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Brand</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Category</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Subcategory</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Cost price</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Selling price</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Quantity</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Total Price</th>
                    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center">Date</th>
                    
                    

                <?php
                $q="select tbl_purchasemaster.pmasterid,tbl_staff.sid,tbl_supplier.sup_id,tbl_staff.fname,tbl_staff.lname, tbl_category.cname,tbl_subcat.category,tbl_product.pname,tbl_product.stock,tbl_purchasechild.costprice,tbl_purchasechild.totalprice,tbl_purchasechild.quantity,tbl_purchasechild.date,tbl_supplier.supname,tbl_purchasechild.sellingprice 
                from tbl_product,tbl_purchasechild,tbl_purchasemaster,tbl_category,tbl_subcat,tbl_supplier,tbl_staff 
                where tbl_purchasechild.pmasterid=tbl_purchasemaster.pmasterid and tbl_product.id=tbl_purchasechild.itemid  and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_category.id=tbl_subcat.catid and tbl_purchasechild.supid=tbl_supplier.sup_id and tbl_staff.sid=tbl_purchasemaster.staffid";
                $s=  mysqli_query($conn,$q);
                while($r=  mysqli_fetch_array($s))
                {
                    echo '<tr><td>'.$r['pmasterid'].'</td>'
                    .'<td><a style="color:black;" href="purchaseviewstaffsup.php?a=staff&staffid='.$r['sid'].'">'.$r['fname'].' '.$r['lname'].'</a></td>'
                    . '<td><a style="color:black;" href="purchaseviewstaffsup.php?a=sup&supid='.$r['sup_id'].'">'.$r['supname'].'</a></td>'
                    . '<td>'.$r['pname'].'</td>'
                    . '<td>'.$r['cname'].'</td>'
                    . '<td>'.$r['category'].'</td>'
                            . '<td>'.$r['costprice'].'</td>'
                            . '<td>'.$r['sellingprice'].'</td>'
                            . '<td>'.$r['quantity'].'</td>'
                            . '<td>'.$r['totalprice'].'</td>'
                            . '<td>'.$r['date'].'</td>'
                            . '</tr>';
                            
                }
            }
                ?>
                    </table>

</div>
<?php
include '../footer.php';
?>