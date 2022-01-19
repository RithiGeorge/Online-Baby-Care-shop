<?php
include 'adminbase.php';
session_start();
?>
<!-- //page details -->
<!-- banner-bottom-wthree -->
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
        <br>
        <h2 style="text-align:center;">ADD SUPPLIERS</h2>
        <form method="POST">

            <table align="center">
                <tr><td>First Name</td><td><input type="text" name="name" required class="form-control"></td></tr>
               
             

                <tr><td>Phone</td><td><input type="text" name="phone" maxlength="10" id="phch" onchange="phvalid()" pattern="[7,8,9][0-9]{9}" required class="form-control"></td></tr>
                <tr><td> Email</td><td><input type="email" name="email" required class="form-control"></td></tr>

               
               
                <tr><td>City</td><td><input type="text" name="city" required class="form-control"></td></tr>
                <tr><td>District</td><td><select name="district" class="form-control" required style="color: black;font-size: bold;font-weight: 400;">
               <option>-----SELECT------</option>
                        <option value="kasargod">Kasargod</option>
                <option value="kannur">Kannur</option>
                <option value="kozhikode">Kozhikode</option>
                <option value="wayanad">Wayanad</option>
                <option value="malapuram">Malapuram</option>
                <option value="palakkad">Palakkad</option>
                <option value="thrissur">Thrissur</option>
                <option value="ernakulam">Ernakulam</option>
                <option value="idukki">Idukki</option>
                <option value="kottayam">Kottayam</option>
                <option value="alappuzha">Alappuzha</option>
                <option value="pathanamthitta">Pathanamthitta</option>
                <option value="kollam">Kollam</option>
                <option value="thiruvananthapuram">Thiruvananthapuram</option>
                </select></td></tr>
                <tr><td>Pincode</td><td><input type="text" name="pin" maxlength="6" pattern="[0-9]{6}" required class="form-control"></td></tr>
            
                <tr><td> State</td><td><input type="text" name="state" required class="form-control"></td></tr>
                <tr><td colspan="2" align="center"><input type="submit" name="submit" value="REGISTER" class="btn btn-success" align="center"></td></tr>

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
          
            $sdate=date("Y/m/d");
            $check = mysqli_query($conn,"select count(*) as count from tbl_supplier where supemail='$email'");
            $fetch = mysqli_fetch_array($check);
            if ($fetch['count'] > 0) {
                echo '<script> alert("Already Registered")</script>';
            } else {

                $qry = "insert into tbl_supplier(staffid,supname,supphone,supemail,supcity,supdistrict,suppincode,supstate,supstatus,date) values('$staffid','$name','$phone','$email','$city','$district','$pin','$state','1','$sdate')";

                $exe = mysqli_query($conn,$qry);
               
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
    $qry = mysqli_query($conn,"select * from tbl_supplier where supstatus='1'");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
<table border='5' align="center" cellspacing="5" id="customers">
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> NAME    </th>
   
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> PHONE </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> EMAIL </th>
  
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CITY </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> DISTRICT </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> PINCODE </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> STATE </th>
<th colspan="2" style="background-color:#900C3F;color:white;padding:10px;text-align:center">ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_supplier where supstatus='1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['sup_id'] . '</td><td>' . $row['supname'] . ' </td><td>' . $row['supphone'] . '</td><td>' . $row['supemail'] . '</td><td>' . $row['supcity'] . '</td><td>' . $row['supdistrict'] . '</td><td>' . $row['suppincode'] . '</td><td>' . $row['supstate'] . '</td><td><a href="updatesupplier.php?id=' . $row['sup_id'] . '" class="btn btn-success">UPDATE</a></td><td><a href="deletesupplier.php?id=' . $row['sup_id'] . '" class="btn btn-success">INACTIVE</a></td></tr>';
    }
    } else {
        ?>

        <!-- <img src="../images/no_data_found.png" width="30%" height="30%" > -->
        
        <?php
    }
    ?>



</table>

<br>

<h1 style="text-align:center">INACTIVE SUPPLIERS</h1>
<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_supplier where supstatus='-1'");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
<table border='5' align="center" cellspacing="5" id="customers">
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> ID    </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> NAME    </th>
   
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> PHONE </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> EMAIL </th>
  
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> CITY </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> DISTRICT </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> PINCODE </th>
    <th style="background-color:#900C3F;color:white;padding:10px;text-align:center"> STATE </th>
<th style="background-color:#900C3F;color:white;padding:10px;text-align:center" colspan="2">ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_supplier where supstatus='-1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['sup_id'] . '</td><td>' . $row['supname'] . ' </td><td>' . $row['supphone'] . '</td><td>' . $row['supemail'] . '</td><td>' . $row['supcity'] . '</td><td>' . $row['supdistrict'] . '</td><td>' . $row['suppincode'] . '</td><td>' . $row['supstate'] . '</td><td><a href="updatesupplier.php?id=' . $row['sup_id'] . '" class="btn btn-success">UPDATE</a></td><td><a href="activatesupplier.php?id=' . $row['sup_id'] . '" class="btn btn-success">Activate</a></td></tr>';
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