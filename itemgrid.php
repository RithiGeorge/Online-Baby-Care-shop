<?php

include 'customerbase.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Baby Care a Society & People Flat Bootstrap responsive Website Template | Parents :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Baby Care Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- <link href="cart/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
<link href="cart/css/style.css" rel='stylesheet' type='text/css' />
<!-- <link href="cart/css/owl.carousel.css" rel="stylesheet"> -->
<script src="cart/js/jquery.min.js"></script>
</head>
<body>


	<!--navigation-end-->
	<!--script-for-menu-->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>

	<!--banner-end-->
	<!--parents-->
	<div class="parents">
<div class="services-section">
			<div class="container">
				<h2>PRODUCTS</h2>
				<div class="services-grids" style="margin-left:80px;">
                <?php
include '../connection.php';

      $sql=("select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat  and tbl_product.stock>'0'");
    // echo $sql;
      $tt=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($tt))
     {
   ?>
					<div class="col-md-3 services-grids" style="border:10px solid gray;margin:10px;border-radius:20px;height:350px;"><a href="viewitems.php?pid=<?php echo $row['id'];?>" >
						<img src="<?php echo $row['itemimage'];?>" width="200px" height="180px"  alt="">
						<div class="services-info" style="height:130px;" >
						<!-- <div  style="width:240px; background:#182b45;margin-right:100px;float:left;padding-left:20px;"> -->
						<h4><?php echo $row['pname'];?></h4>
						<p><?php echo $row['category'];?></p>
						<p>Rs.<?php echo $row['rate'];?></p>
						</div></a>
						</div>
						<?php

     }
     ?>
					<div class="clearfix"></div>
					</div>
					
				</div>
			</div>
</div>
	<!--parents-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
			<div class="col-md-6 footer-right">
					<form action="#" method="post">
						<input type="text" value="Your Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
					<p>© 2016 Baby Care. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="col-md-3 footer-left">
					<div class="a-1">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						<p>The company name, Glasglow Dr 40 Fe 72.</p>
					</div>
					<div class="a-2">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						<p><a href="mailto:example@email.com">contact@example.com</a></p>
					</div>
				</div>
				<div class="col-md-3 footer-left">
					<div class="a-1">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
						<p>+122 265 8822</p>
					</div>
					<div class="a-2">
						<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
						<p>+134 326 3695</p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->
</body>
</html>