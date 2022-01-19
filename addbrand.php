

<?php
include 'adminbase.php';
?>



<br><br>
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
        <br>
<h2 style="text-align:center;">ADD BRAND</h2>
<form method="post" enctype="multipart/form-data">
    <!--<h1  align="center" style="margin-left: 350px;">Login</h1>-->
    <!--<hr style="color: black;">-->
    <table align="center" style="margin-left: 90px;padding:10px;" >

        <tr>
            <td>Brand Name</td>
            <td><input type="text"  name=  "brand" class="form-control" required></td>
        <td><input type="submit" align="center"  style="width:100px" name="submit" class="btn btn-danger" value="ADD" ></td>

        </td>
        </tr>

        <!-- <tr>
            <td colspan="2" align="center"><input type="submit" align="center"  style="width:100px" name="submit" class="btn btn-danger" value="ADD" ></td>

        </tr> -->
    </table>
</form>
<br>
</div></div>


<?php
include '../connection.php';
if (isset($_POST['submit'])) {
    $cname = $_POST['brand'];
    $qr= "select count(*) as count from tbl_brand where brand='$cname'";
    $qr1= mysqli_query($conn,$qr);
    $qry = mysqli_fetch_array($qr1);
    if ($qry[0] > 0) {
        echo '<script>alert(" Already added ....");</script>';
    } else {

        $qry1 = "insert into tbl_brand(brand,status)values('$cname','1')";

        $res1 = mysqli_query($conn,$qry1);

        if ($res1) {
            echo '<script>alert(" Brand added ....");</script>';
        }
    }
}
?>
<br><br><br><br>
<div style="width:1100px;margin-left:200px">
<div style="float:left;">
<h2 style="margin-left:100px;">Active Brands</h2>
<table border='4' align="center" cellspacing="5" id="customers" >
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> BRAND ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> BRAND NAME     </th>
 <th colspan="2" style="background-color:#900C3F;color:white;padding:10px;text-align:center">  ACTION   </th>

    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_brand where status='1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['bid'] . '</td><td>' . $row['brand'] . '</td><td><a href="editbrand.php?id=' . $row['bid'] . '" class="btn btn-success">EDIT</a></td><td><a href="deletebrand.php?id=' . $row['bid'] . '" class="btn btn-success">Inactivate</a></td></tr>';
    }
    ?>

</table>
</div>
<div style="float:left;margin-left:40px;">
<h2 style="margin-left:100px;">InActive Brands</h2>
<table border='4' align="center" cellspacing="5" id="customers" style="float:right;">
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> BRAND ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> BRAND NAME     </th>
 <th colspan="2" style="background-color:#900C3F;color:white;padding:10px;text-align:center"> ACTION    </th>

    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_brand where status='0'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['bid'] . '</td><td>' . $row['brand'] . '</td><td><a href="editbrand.php?id=' . $row['bid'] . '" class="btn btn-success">EDIT</a></td><td><a href="unblockbrand.php?id=' . $row['bid'] . '" class="btn btn-success">Activate</a></td></tr>';
    }
    ?>

</table>

</div>
</div>
<br><br><br><br><br>
<?php
include '../footer.php';
?>
         

