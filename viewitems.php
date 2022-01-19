<?php
include 'customerbase.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Smart-Sale Website Template | Details :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="cart/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
<!--image slider-->
<script type="text/javascript" src="cart/js/jquery-1.7.2.min.js"></script> 
<!-- <script src="js/jquery-slider.js" type="text/javascript"></script> -->
<script src="cart/js/easyResponsiveTabs.js" type="text/javascript"></script>
<link href="cart/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="cart/css/global.css">
<script src="cart/js/slides.min.jquery.js"></script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
</head>
<body style="color:maroon">
<div class="wrap">
<?php
    $pid=$_GET['pid'];
    // $masterid=$_GET['bmid'];
    // $date=$_GET['date'];
    include '../connection.php';
 

    ?>
</table>


<!-- <div class="main"> -->
    <?php
     $er="select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat and tbl_product.id='$pid' and tbl_product.stock>'0'";
    // echo $er;
	 $qry = mysqli_query($conn,$er);
   
   $row = mysqli_fetch_array($qry);
     ?>
<form method="POST" action="cartin.php">

 <div style="width:1000px;height:350px;border:10px solid ;margin-top:50px;margin-left:240px;border-radius:20px;">
<div style="float:left;margin-left:100px;margin-top:80px;">
<a href="#" target="_blank"><img src="<?php echo $row['itemimage'];?>" alt=" "  width=400px /></a>
									
</div>
	

	<div style="float:right;margin-right:20px;color:maroon;margin-top:40px;">

				
					<h2 style="color:green"><?php echo $row['pname'];?>  <?php echo $row['category'];?> </h2>
					<p style="color:maroon"><?php echo $row['description'];?></p>
					<!-- <p><?php echo $row['category'];?></p>					 -->
					<div class="price">
						<p style="color:maroon">Price: Rs.<span style="color:maroon"><?php echo $row['rate'];?></span></p>
					</div>
					
				<p style="color:green">QTY:	<input name="qty" type="number" min="1" max="<?php echo $row['stock']; ?>" style="border-radius: 0.2rem;width:80px;" class="form-control"   placeholder="Qty"  required></p>
					</ul>
					
					<p style="color:maroon">Stock: <?php echo $row['stock']; ?></p>
			
						
	 <input name="val" type="hidden" value="0" id="val">
 <input name="subcatid" type="hidden" value="<?php echo $row['scat'];?>" id="val">
			<input type="hidden"  name="a" value="<?php echo $row['id']; ?>">
			<input type="hidden" name="pid" value="<?php echo $pid; ?>" >
		<input type="hidden"  name="d" value="<?php echo $row['rate']; ?>">

		<div class="button"><span><input type="submit" class="btn btn-success" value="Add to cart" ></span></div>	
					<!-- <div class="button"><span><a href="#">Add to Cart</a></span></div>					 -->
					<div class="clear"></div>
				</div>
			
			</div>
			<div class="clear"></div>
		  </div>
		  </div>
		  </div>
	
</form>
	</div></div>
	    <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
   </script>		
  
</div>
<div class="clear"></div>
</div>
</div>
<!-- <div class="footer-bg">
<div class="wrap">
<div class="footer">
	<div class="f_nav">
		<ul>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Announcements</a></li>
			<li><a href="#">Security Center</a></li>
			<li><a href="#">Resolution Center</a></li>
			<li><a href="#">Buyer Tools</a></li>
			<li><a href="#">Policies</a></li>
			<li><a href="#">Stores</a></li>
			<li><a href="#">Site Map</a></li>
		</ul>
	</div>
	<div class="footer1">
		<p>&copy; 2013 SmartSale. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div>
</div> -->
</div>
</body>
</html>