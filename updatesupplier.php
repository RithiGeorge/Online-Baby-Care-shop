<?php
include 'adminbase.php';
include '../connection.php';
session_start();
$sid=$_GET['id'];
$s="select * from tbl_supplier where sup_id=$sid";
$ee = mysqli_query($conn,$s);
$row = mysqli_fetch_array($ee);
?>
<!-- //page details -->
<!-- banner-bottom-wthree -->
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:20px;">
        <br>
        <h2 style="text-align:center;">ADD SUPPLIERS</h2>
        <form method="POST">

            <table align="center">
                <tr><td>First Name</td><td><input type="text" name="name" value="<?php echo $row['supname'];?>" required class="form-control"></td></tr>
               
             

                <tr><td>Phone</td><td><input type="text" name="phone" value="<?php echo $row['supphone'];?>" maxlength="10" id="phch" onchange="phvalid()" pattern="[7,8,9][0-9]{9}" required class="form-control"></td></tr>
                <tr><td> Email</td><td><input type="email" value="<?php echo $row['supemail'];?>" readonly name="email" required class="form-control"></td></tr>

               
               
                <tr><td>City</td><td><input type="text" name="city" value="<?php echo $row['supcity'];?>" required class="form-control"></td></tr>
                <tr><td>District</td><td><input type="text" name="district" class="form-control" value="<?php echo $row['supdistrict'];?>" required style="color: black;font-size: bold;font-weight: 400;">
             </td></tr>
                <tr><td>Pincode</td><td><input type="text" name="pin" value="<?php echo $row['suppincode'];?>" maxlength="6" pattern="[0-9]{6}" required class="form-control"></td></tr>
            
                <tr><td> State</td><td><input type="text" name="state" value="<?php echo $row['supstate'];?>" required class="form-control"></td></tr>
                <tr><td colspan="2" align="center"><input type="submit" name="submit" value="Update" class="btn btn-danger" align="center"></td></tr>

            </table></form>
            <script>
    function phvalid()
{

    var mobile = document.getElementById('phch');
    if(mobile.value.length!=10){
       
       alert("required 10 digits, match requested format!");
    }
    }
    </script>
</div></div>
        <?php
        include '../connection.php';
        $staffid=$_SESSION['sid'];
        if (isset($_POST['submit'])) {  
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $city = $_POST['city'];
           
            $district = $_POST['district'];
          
            $pin = $_POST['pin'];
            $state = $_POST['state'];
          

          

                $qry = "update tbl_supplier set supname='$name',supphone='$phone',supemail='$email',supcity='$city',supdistrict='$district',suppincode='$pin',supstate='$state' where sup_id='$sid'" ;
            //    echo $qry;
                $exe = mysqli_query($conn,$qry);
                if($exe){
                    echo'<script>alert("Updated............")</script>';
                    echo '<script>location.href="addsupplier.php"</script>';
                }
               
            
        }
        ?>
    </div>

</div>
</section>
<!-- //banner-bottom-wthree -->


<!-- testimonials -->

<!-- //testimonials -->
<!-- /hand-crafted -->  <section class="hand-crafted py-5">

</section>
<!-- //hand-crafted -->

<!-- footer -->

<h1 style="text-align:center">SUPPLIERS</h1>
<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_supplier");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
<table border='5' align="center" cellspacing="5" id="customers">
    <th> ID    </th>
    <th> NAME    </th>
   
    <th> PHONE </th>
    <th> EMAIL </th>
  
    <th> CITY </th>
    <th> DISTRICT </th>
    <th> PINCODE </th>
    <th> STATE </th>
<th colspan="2">ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_supplier");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['sup_id'] . '</td><td>' . $row['supname'] . ' </td><td>' . $row['supphone'] . '</td><td>' . $row['supemail'] . '</td><td>' . $row['supcity'] . '</td><td>' . $row['supdistrict'] . '</td><td>' . $row['suppincode'] . '</td><td>' . $row['supstate'] . '</td><td><a href="updatesupplier.php?id=' . $row['sup_id'] . '" class="btn btn-success">UPDATE</a></td><td><a href="deletesupplier.php?id=' . $row['sup_id'] . '" class="btn btn-success">DELETE</a></td></tr>';
    }
    } else {
        ?>

        <!-- <img src="../images/no_data_found.png" width="30%" height="30%" > -->
        
        <?php
    }
    ?>

</table>




<?php
include '../footer.php';
?>