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
<br>
<h1> Active Products</h1>
<br>
<table border='1' style="width:1300px;">
    <tr>  <th>ID</th>
        <th>Product Name</th>


        <th>Category</th>

        <th>Rate</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Star value</th>
        <th colspan="2">ACTION</th>
    </tr>
   
    <?php
    // $id=$_GET['subid'];
    include '../connection.php';
 
    // $qry = mysqli_query("select tbl_product.*,tbl_category.cname from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat and tbl_product.scat='$id'");
    $qry = mysqli_query($conn,"select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat ");
    while ($row = mysqli_fetch_array($qry)) {

        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['pname'] . '</td><td>' . $row['category'] . '</td><td>' . $row['rate'] . '</td><td>' . $row['description'] . '</td><td>' . $row['stock'] . '</td><td><img src="' . $row['itemimage'] . '" alt="aa" style="width:100px;height:100px;"></td><td>' . $row['starvalue'] . '</td><td><a style="color:blue;" href="deleteproduct.php?id=' . $row['id'] . '&rate=' . $row['rate'] . '" >INACTIVE</a></td><td><a style="color:blue;" href="editproduct.php?id=' . $row['id'] . '&rate=' . $row['rate'] . '" >EDIT</a></td></tr>';
    }
    ?>
</table>

<br>
<h1> InActive Products</h1>
<br>
<table border='1' style="width:1300px;">
    <tr>  <th>ID</th>
        <th>Product Name</th>


        <th>Category</th>

        <th>Rate</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Image</th>
        <th>Star value</th>
        <th colspan="2">ACTION</th>
    </tr>
   
    <?php
    // $id=$_GET['subid'];
    include '../connection.php';
 
    // $qry = mysqli_query("select tbl_product.*,tbl_category.cname from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat and tbl_product.scat='$id'");
    $qry = mysqli_query($conn,"select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='-1' and tbl_subcat.scid=tbl_product.scat ");
    while ($row = mysqli_fetch_array($qry)) {

        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['pname'] . '</td><td>' . $row['category'] . '</td><td>' . $row['rate'] . '</td><td>' . $row['description'] . '</td><td>' . $row['stock'] . '</td><td><img src="' . $row['itemimage'] . '" alt="aa" style="width:100px;height:100px;"></td><td>' . $row['starvalue'] . '</td><td><a style="color:blue;" href="unblockproduct.php?id=' . $row['id'] . '&rate=' . $row['rate'] . '" >ACTIVE</a></td><td><a style="color:blue;" href="editproduct.php?id=' . $row['id'] . '&rate=' . $row['rate'] . '" >EDIT</a></td></tr>';
    }
    ?>
</table>

<?php
include '../footer.php';
?>
