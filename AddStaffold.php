<?php
include 'adminbase.php';
?>
<!-- //page details -->
<!-- banner-bottom-wthree -->
<!-- <section class="banner-bottom-wthree py-5" id="about">
    <div class="container py-md-3"> -->
    <div style="margin: 40px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;">
        <br>
        <h1 style="text-align:center;">ADD STAFF</h1>
        <form method="POST">

            <table align="center">
                <tr><td>First Name</td><td><input type="text" name="fname" required class="form-control"></td></tr>
                <tr><td>Last Name</td><td><input type="text" name="lname" required class="form-control"></td></tr>
             

                <tr><td>Phone</td><td><input type="text" name="phone"  maxlength="10" id="phch" onchange="phvalid()" patteren="[789][0-9]{9}" required class="form-control"></td></tr>
                <tr><td>House No</td><td><input type="int" name="hno" maxlength="10" required class="form-control"></td></tr>
                <tr><td>Street</td><td><input type="text" name="street" required class="form-control"></td></tr>
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
                <tr><td>Pincode</td><td><input type="text" name="pin" maxlength="6" required class="form-control"></td></tr>
                <tr><td> Email</td><td><input type="email" name="email" required class="form-control"></td></tr>

                <tr><td> Password</td><td><input type="password" name="password" required class="form-control"></td></tr>
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
        if (isset($_POST['submit'])) {  
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $hno = $_POST['hno'];
            $street = $_POST['street'];
            $district = $_POST['district'];
          
            $pin = $_POST['pin'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sdate=date("Y/m/d");
            $check = mysqli_query($conn,"select count(*) as count from tbl_customer where email='$email'");
            $fetch = mysqli_fetch_array($check);
            if ($fetch['count'] > 0) {
                echo '<script> alert("Already Registered")</script>';
            } else {

                $qry = "insert into tbl_staff(fname,lname,phone,houseno,street,district,pincode,email,status,date) values('$fname','$lname','$phone','$hno','$street','$district','$pin','$email','1','$sdate')";

                $exe = mysqli_query($conn,$qry);
                if ($qry) {
                    $logqry = mysqli_query($conn,"insert into tbl_login(username,password,usertype) values('$email','$password','Staff')");

                    echo '<script>alert("successfull")</script>';
                } else {
                    echo '<script>alert("login error")</script>';
                }
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


<?php
include '../footer.php';
?>