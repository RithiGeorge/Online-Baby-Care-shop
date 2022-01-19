<?php
include 'adminbase.php';
?>

<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
        <br>

<h2 style="text-align:center;">ADD SUBCATEGORY</h2>

<form method="post" enctype="multipart/form-data">
    <!--<h1  align="center" style="margin-left: 350px;">Login</h1>-->
    <!--<hr style="color: black;">-->
    <table align="center" style="margin-left: 90px;">

    <tr>
            <!-- <td> Select Category </td> -->
            <td><select class="form-control"  name="cat">
                <option>SELECT CATEGORY</option>
                    <?php
                    include '../connection.php';
                    $qry1 = "select * from tbl_category where status='1'";
                    $res1 = mysqli_query($conn,$qry1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        echo "<option value='" . $row1['id'] . "'>" . $row1['cname'] . "</option>";
                    }
                    ?>
                </select></td>
                <td><input type="text"  name="scat" class="form-control" required placeholder="SUB CATEGORY"></td>
                <td><input type="submit"   style="width:100px" name="submit" class="btn btn-primary" value="ADD" ></td>
        </tr>

        <!-- <tr>
            <td>Sub Category</td>
            <td><input type="text"  name="scat" class="form-control" required></td>
        </tr> -->
      <br>

        <!-- <tr>
            <td colspan="2" align="center"><input type="submit"   style="width:100px" name="submit" class="btn btn-primary" value="ADD" ></td>

        </tr> -->
    </table>
</form>
<br>
                </div>
                </div>

<?php
session_start();

include '../connection.php';
if (isset($_REQUEST['submit'])) {

    $scat = $_REQUEST['scat'];
  
    $cat = $_REQUEST['cat'];

    $qr = "select count(*) as count from tbl_subcat where category='$scat'";
  
    $qr1 = mysqli_query($conn,$qr);
    $qry = mysqli_fetch_array($qr1);
    if ($qry[0] > 0) {

        echo '<script>alert(" Already added ....");</script>';
    } else {

        $qry1 = "INSERT INTO `tbl_subcat`(`catid`,`category`,`status`)values('$cat','$scat','1')";

        $res1 = mysqli_query($conn,$qry1);

        if ($res1) {
            echo '<script>alert("Sub category added ....");</script>';
        }
    }
}
?>
<br><br>
<h2 style="margin-left:500px;">Active SubCategory</h2>
<table border='4' align="center" cellspacing="5" id="customers">
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY NAME     </th>

 <th style="background-color:#900C3F;color:white;padding:10px;text-align:center" colspan="2">ACTION</th>
    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select tbl_subcat.*,tbl_category.cname from tbl_subcat,tbl_category where tbl_subcat.status='1' and tbl_subcat.catid=tbl_category.id");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['cname'] . '</td><td>' . $row['category'] . '</td><td><a href="editsubcategory.php?id=' . $row['scid'] . '" class="btn btn-success">EDIT</a></td><td><a href="deleteSubCat.php?id=' . $row['scid'] . '" class="btn btn-success">InActive</a></td></tr>';
    }
    ?>      
</table>
<br><br><br><br><br>
<h2 style="margin-left:500px;">InActive SubCategory</h2>
<table border='4' align="center" cellspacing="5" id="customers">
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY NAME     </th>

 <th style="background-color:#900C3F;color:white;padding:10px;text-align:center" colspan="2">ACTION</th>
    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select tbl_subcat.*,tbl_category.cname from tbl_subcat,tbl_category where tbl_subcat.status='0' and tbl_subcat.catid=tbl_category.id");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['cname'] . '</td><td>' . $row['category'] . '</td><td><a href="editsubcategory.php?id=' . $row['scid'] . '" class="btn btn-success">EDIT</a></td><td><a href="unblocksubcat.php?id=' . $row['scid'] . '" class="btn btn-success">Active</a></td></tr>';
    }
    ?>      
</table>
<br><br><br><br><br>

<?php
include '../footer.php';
?>
         


