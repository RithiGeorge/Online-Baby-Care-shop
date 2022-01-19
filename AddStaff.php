<?php

include 'adminbase.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>BABY CARE</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Home Loan Application Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="../register/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="../register/css/jquery-ui.css" />
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=GFS+Neohellenic:400,400i,700,700i&amp;subset=greek" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
	<div class="center-container">
		<!--header-->
		<div class="header-w3l">
			<h1>ADD STAFF </h1>
		</div>
		<!--//header-->
		<!--main-->
	<div class="agileits-register">
		<form action="#" method="post">
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>First Name :</span>
					<input type="text" name="fname" placeholder="First Name" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Last Name :</span>
					<input type="text" name="lname" placeholder="Last Name" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid">
					<span>Email :</span>
					<input type="email" name="email" placeholder="Your E-mail" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Phone Number :</span>
					<input type="text" name="phone" placeholder="Your Phone Number" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Address :</span>
					<input type="text" name="address" placeholder="Address" required=""/>
					<div class="clear"> </div>
				</div>
				<!-- <div class="w3_modal_body_grid w3_modal_body_grid1">
					
					<input type="text" name="address" placeholder="Street" required=""/>
					<div class="clear"> </div>
				</div> -->
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					
					<input type="text" name="city" placeholder="City" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					
					<input type="text" name="pincode" placeholder="ZipCode" required=""/>
					<div class="clear"> </div>
				</div>
				
				<div class="w3_modal_body_grid">
					<span>District :</span>
					<select id="w3_country" style="width:220px;" name="dist" class="frm-field required">
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
               						
					</select>
					<div class="clear"> </div>
				</div>
				<!-- <div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Date Of Birth :</span>
					<input class="date" id="datepicker" style="width:220px;margin-left:60px;" name="dob" type="date" value="mm/dd/yyyy"  required="" />
					<div class="clear"> </div>
				</div> -->
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Password :</span>
					<input type="password" name="password" placeholder="Password" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid">
				
				<input type="submit" name="submit" value="Apply Now" />
				<div class="clear"></div>
				<div class="agile-right">
					<a href="login.php" style="font-size:20px;float:right">Login Here</a>
				</div>
			</form>
		</div>
		
		<!--//main-->
		
	</div>
<?php
  
  include '../connection.php';
  if (isset($_POST['submit'])) {  
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $phone = $_POST['phone'];
      $hno = $_POST['address'];
      $street = $_POST['city'];
      $district = $_POST['dist'];
    
      $pin = $_POST['pincode'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $sdate=date("Y/m/d");
      $check = mysqli_query($conn,"select count(*) as count from tbl_customer where email='$email'");
      $fetch = mysqli_fetch_array($check);
      if ($fetch['count'] > 0) {
          echo '<script> alert("Already Registered")</script>';
      } else {

          $qry = "insert into tbl_staff(fname,lname,phone,houseno,street,district,pincode,email,status,date) values('$fname','$lname','$phone','$hno','$street','$district','$pin','$email','1','$sdate')";
// echo $qry;
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
	<!--footer-->
		<div class="footer">
			
		</div>
		<!--//footer-->
<!-- js -->
<script type="text/javascript" src="register/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->		

</body>
</html>