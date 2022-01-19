<?php
include 'adminbase.php';
include '../connection.php';
session_start();
$a=$_GET['a'];
if($a=='sup')
{
    $supid=$_GET['supid'];
$s="select * from tbl_supplier where sup_id=$supid";
$ee = mysqli_query($conn,$s);
$row = mysqli_fetch_array($ee);
?>
<!-- //page details -->
<!-- banner-bottom-wthree -->
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;background-color: rgb(66, 143, 117);border-radius: 30px;color: white;">
        <br>
        <h2 style="text-align:center;"> SUPPLIER</h2>
        <form method="POST">

            <table align="center">
                <tr><td>First Name</td><td><input type="text" name="name" value="<?php echo $row['supname'];?>" readonly required class="form-control"></td></tr>
               
             

                <tr><td>Phone</td><td><input type="text" name="phone" value="<?php echo $row['supphone'];?>" readonly maxlength="10" id="phch" onchange="phvalid()" pattern="[7,8,9][0-9]{9}" required class="form-control"></td></tr>
                <tr><td> Email</td><td><input type="email" value="<?php echo $row['supemail'];?>" readonly name="email" required class="form-control"></td></tr>

               
               
                <tr><td>City</td><td><input type="text" name="city" value="<?php echo $row['supcity'];?>" readonly required class="form-control"></td></tr>
                <tr><td>District</td><td><input type="text" name="district" class="form-control" readonly value="<?php echo $row['supdistrict'];?>" required style="color: black;font-size: bold;font-weight: 400;">
             </td></tr>
                <tr><td>Pincode</td><td><input type="text" name="pin" value="<?php echo $row['suppincode'];?>" readonly maxlength="6" pattern="[0-9]{6}" required class="form-control"></td></tr>
            
                <tr><td> State</td><td><input type="text" name="state" value="<?php echo $row['supstate'];?>" readonly required class="form-control"></td></tr>
              

            </table></form>

            <?php
            }
        else{
            $staffid=$_GET['staffid'];
            $s="select * from tbl_staff where sid=$staffid";
$ee = mysqli_query($conn,$s);
$row = mysqli_fetch_array($ee);
?>
<!-- //page details -->
<!-- banner-bottom-wthree -->
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;background-color: rgb(66, 143, 117);border-radius: 30px;color: white;">
        <br>
        <h2 style="text-align:center;"> STAFF</h2>
        <form method="POST">

            <table align="center">
                <tr><td>First Name</td><td><input type="text" name="name" value="<?php echo $row['fname'];?>" readonly required class="form-control"></td></tr>
                
                <tr><td>Last Name</td><td><input type="text" name="name" readonly value="<?php echo $row['lname'];?>" required class="form-control"></td></tr>

                <tr><td>Phone</td><td><input type="text" name="phone" readonly value="<?php echo $row['phone'];?>" maxlength="10" id="phch" onchange="phvalid()" pattern="[7,8,9][0-9]{9}" required class="form-control"></td></tr>
                <tr><td> Email</td><td><input type="email" value="<?php echo $row['email'];?>" readonly name="email" required class="form-control"></td></tr>

               
               
                <tr><td>City</td><td><input type="text" name="city" readonly value="<?php echo $row['street'];?>" required class="form-control"></td></tr>
                <tr><td>District</td><td><input type="text" name="district" readonly class="form-control" value="<?php echo $row['district'];?>" required style="color: black;font-size: bold;font-weight: 400;">
             </td></tr>
                <tr><td>Pincode</td><td><input type="text" name="pin" readonly value="<?php echo $row['pincode'];?>" maxlength="6" pattern="[0-9]{6}" required class="form-control"></td></tr>
            
                
               

            </table></form>
<?php
        }
            ?>
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
include '../footer.php';
?>