

<?php
include 'adminbase.php';
?>



<br><br>
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
        <br>
<h2 style="text-align:center;">ADD CATEGORY</h2>
<form method="post" enctype="multipart/form-data">
    <!--<h1  align="center" style="margin-left: 350px;">Login</h1>-->
    <!--<hr style="color: black;">-->
    <table align="center" style="margin-left: 90px;" >

        <tr>
            <td>Category Name</td>
            <td><input type="text"  name="cname" class="form-control" required></td>
            <td><input type="submit" align="center"  style="width:100px" name="submit" class="btn btn-danger" value="ADD" ></td>
        </tr>

        <!-- <tr>
            <td colspan="2" align="center"><input type="submit" align="center"  style="width:100px" name="submit" class="btn btn-primary" value="ADD" ></td>

        </tr> -->
    </table>
</form>
<br>
</div>
</div>
<br><br>

<?php
include '../connection.php';
if (isset($_POST['submit'])) {
    $cname = $_POST['cname'];
    $qr = "select count(*) as count from tbl_category where cname='$cname'";
    $qr1 = mysqli_query($conn,$qr);
    $qry = mysqli_fetch_array($qr1);
    if ($qry[0] > 0) {
        echo '<script>alert(" Already added ....");</script>';
    } else {

        $qry1 = "insert into tbl_category(cname,status)values('$cname','1')";

        $res1 = mysqli_query($conn,$qry1);

        if ($res1) {
            echo '<script>alert(" category added ....");</script>';
        }
    }
}
?>
<br><br><br><br>
<div style="width:1100px;margin-left:50px;">
<div style="float:left;margin-left:110px;">
<h2 style="margin-left:px;">Active Category</h2>
<table border='4' align="center" cellspacing="5"  >
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY NAME     </th>
 <th style="background-color:#900C3F;color:white;padding:10px;text-align:center" colspan="2"> ACTION    </th>

    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_category where status='1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['cname'] . '</td><td><a href="editcategory.php?id=' . $row['id'] . '" class="btn btn-success">EDIT</a></td><td><a href="deletec.php?id=' . $row['id'] . '" class="btn btn-success">Inactive</a></td></tr>';
    }
    ?>

</table>
</div>
<br><br><br>
<div style="float:right;margin-right:100px;">
<h2 style="">InActive Category</h2>
<table border='4' align="center" cellspacing="5"  >
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CATEGORY NAME     </th>
 <th style="background-color:#900C3F;color:white;padding:10px;text-align:center" colspan="2"> ACTION    </th>

    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_category where status='0'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['cname'] . '</td><td><a href="editcategory.php?id=' . $row['id'] . '" class="btn btn-success">EDIT</a></td><td><a href="unblockcat.php?id=' . $row['id'] . '" class="btn btn-success">Active</a></td></tr>';
    }
    ?>

</table>

</div>
</div>
<?php
include '../footer.php';
?>
         

