<?php
include 'customerbase.php';
include '../connection.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Smart-Sale Website Template | Index :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="cart/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="wrap">

<div class="cnt-main btm">
	<div class="section group">
    <?php

//    if(isset($_POST['submit']))
//    {
       
// $masterid=$_GET['bmid'];
// $date=$_GET['date'];
    //    $id=$_POST['scat'];
    //    echo $id;
    //  $sql=("select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat and tbl_product.scat='$id' and tbl_product.stock>'0'");
      $sql=("select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat  and tbl_product.stock>'0'");
    $tt=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($tt))
     {
   ?>
				<div class="grid_1_of_3 images_1_of_3">
					 <a href="details.html"><img src="<?php echo $row['itemimage'];?>" alt=""/></a>
					 <a href="details.html"><h3><?php echo $row['pname'];?></h3></a>
					 <div class="cart-b">
             <br>
					<span class="price left"><sup>Rs.<?php echo $row['rate'];?></sup><sub></sub></span>
				    <div class="btn top-right right"><a href="viewitems.php?pid=<?php echo $row['id']; ?>">Add to Cart</a></div>
				    <div class="clear"></div>
				 </div>
  
				</div>
                <?php
     }
     ?>
			
		
			</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="footer-bg">
<div class="wrap">

</div>
</div>
</body>
</html>