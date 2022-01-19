<?php
include 'adminbase.php';
?>

<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
        <br>
        <h2 style="text-align:center;">ADD PRODUCT</h2>
<form method="post" enctype="multipart/form-data">
    <!--<h1  align="center" style="margin-left: 350px;">Login</h1>-->
    <!--<hr style="color: black;">-->
    <table align="center" style="margin-left: 60px;">

        <tr>
            <td>Brand Name</td>
            <td><select class="form-control"  name="pname" >
                <option>-------Select---------</option>
                    <?php
                    include '../connection.php';
                    $qry1 = "select * from tbl_brand where status='1'";
                    $res1 = mysqli_query($conn,$qry1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        echo "<option value='" . $row1['brand'] . "'>" . $row1['brand'] . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td> Select Category </td>
            <td><select class="form-control"  name="cat" id="cat">
                <option>-------Select---------</option>
                    <?php
                    include '../connection.php';
                    $qry1 = "select * from tbl_category where status='1'";
                    $res1 = mysqli_query($conn,$qry1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        echo "<option value='" . $row1['id'] . "'>" . $row1['cname'] . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td> Select Sub Category </td>
            <td><select class="form-control"  name="scat" id="scat">
                    <option>Select Item</option>
                </select></td>
        </tr>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
                
            $("#cat").change(function () {
                var sid = $("#cat").val();
                // document.write(sid);
                // document.write("******");
                debugger;
                $.ajax({
                    url: "ajaxGetSubCat.php?id=" + sid,
                    type: 'POST',
                    success: function (data)
                    {
                        var dt = $.trim(data);
                        $("#scat").html(dt);
                    }, error: function (xhr, error)
                    {
                        alert(error);
                    }
                });
            });

        </script>


        <tr>
            <td>Description</td>
            <td><textarea  name="description" class="form-control" required></textarea></td>
        </tr>
        <tr><td>Image</td><td><input type="file" name="img" required class="form-control"></td></tr>
        <tr>
            <td>Star value</td>
            <td><select  name="star" class="form-control" required>
                <option>----Select----</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
        </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" align="center"  style="width:100px" name="submit" class="btn btn-primary" value="ADD" ></td>

        </tr>
    </table>
</form>
<br>
        </div></div><br><br>
<?php
session_start();
//$staffid = $_SESSION['sid'];
include '../connection.php';
if (isset($_REQUEST['submit'])) {
    
    $pname = $_REQUEST['pname'];
    $cat = $_REQUEST['cat'];
    $scat = $_REQUEST['scat'];
    $star = $_REQUEST['star'];

    $description = $_REQUEST['description'];

    $rate = $_REQUEST['ratee'];
    $stock = $_REQUEST['stock'];
    $upfold = "../images/";
    $mimage = $upfold . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'], $mimage);

    // $check = mysqli_query("select count(*) as count from tbl_product where pname='$pname'");

    // $fetch = mysqli_fetch_array($check);

    // if ($fetch['count'] > 0) {
    //     echo '<script> alert("Already Added ")</script>';
    // } else {
        $qry = "insert into tbl_product (pname,cat,description,itemimage,rate,stock,status,scat,starvalue) values('$pname','$cat','$description','$mimage','0','0','1','$scat','$star')";
        
        $exe = mysqli_query($conn,$qry);
        if ($exe) {
            echo '<script>alert(" product Added")</script>';
        }
    }
// }
?>

<?php
 include '../connection.php';
    $qry = mysqli_query($conn,"select * FROM tbl_product WHERE STATUS='1' ");
    
    
    if (mysqli_fetch_array($qry) > 0) {
    ?>
<!-- 
<table id="customers">
    <th> ID    </th>

    <th> PLANT NAME </th>
    <th> CATEGORY </th>
    <th> DESCRIPTION  </th>


    <th> RATE </th>

    <th> ITEM  </th>
    
    <?php
      $qry = mysqli_query($conn,"select * FROM tbl_product WHERE status='1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['pname'] . "</<td><td>" . $row['cat'] . "</td><td>" . $row['description'] . "</td><td>" . $row['rate'] . "</td><td><img src='" . $row['itemimage'] . "' alt='aa' style='width:200px;height:100px;'></td></tr>";
    }
    } 
    else {
        ?>

        <img src="../images/no_data_found.png" width="30%" height="30%" >
        
        <?php
    }
    ?>

</table> -->


<?php
include '../footer.php';
?>