<?php
include 'adminbase.php';
?>

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div style="width:1000px;margin-left:100px">
<table border="1" class="table table-striped table-dark">
<?php
session_start();
// $userid=$_SESSION['id'];
// echo "jjjjjjjjjjjj";
include '../connection.php';

$optn=$_GET['optn'];
// echo $optn;
$sdate=$_GET['sdate'];
$edate=$_GET['edate'];
if($optn=='customer'){

  ?>
  <h1 style="text-align:center">BABY CARE </h1>
  <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
  
  <h1 style="text-align:center">Customer List</h1>
<tr>

  <th>Customer</th>
    <th>Phone</th>
    <th>Email</th>
    <th>House No</th>
    <th>City</th>
    <th>District</th>
    <th>Pincode</th>
  
</tr>
  <?php
  $ui="select * from tbl_customer where status='1' and date between '$sdate' and '$edate'";
  $qr=mysqli_query($conn,$ui);
  while($row=mysqli_fetch_array($qr))
  {
          echo '<tr><td>'.$row['fname'].' ' .$row['lname'].'</td><td>'.$row['phone'].'</td><td>'.$row['email'].'</td><td>'.$row['housename'].'</td><td>'.$row['city'].'</td><td>'.$row['district'].'</td><td>'.$row['pincode'].'</td></tr>'; 
          
        }

    }
  else if($optn=='staff'){

      ?>
      <h1 style="text-align:center">BABY CARE </h1>
      <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
       <h1 style="text-align:center">Staff List</h1>
    <tr>
      <th>Staff</th>
        <th>Phone</th>
        <th>Email</th>
        <th>House No.</th>
        <th>City</th>
        <th>District</th>
        <th>Pincode</th>
       
    </tr>
      <?php
      $ui="select * from tbl_staff where status='1' and date between '$sdate' and '$edate'";
      $qr=mysqli_query($conn,$ui);
      while($row=mysqli_fetch_array($qr))
      {
    
   
              echo '<tr><td>'.$row['fname'].' ' .$row['lname'].'</td><td>'.$row['phone'].'</td><td>'.$row['email'].'</td><td>'.$row['houseno'].'</td><td>'.$row['street'].'</td><td>'.$row['district'].'</td><td>'.$row['pincode'].'</td></tr>'; 
              
            }
    
        }

      else  if($optn=='supplier'){

          ?>
          <h1 style="text-align:center">BABY CARE </h1>
          <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
           <h1 style="text-align:center">Supplier List</h1>
        <tr>
          <th>Supplier</th>
            <th>Phone</th>
            <th>Email</th>
        
            <th>City</th>
            <th>District</th>
            <th>Pincode</th>
            <th>State</th>
        </tr>
          <?php
          $ui="select * from tbl_supplier where supstatus='1' and date between '$sdate' and '$edate'";
          $qr=mysqli_query($conn,$ui);
          while($row=mysqli_fetch_array($qr))
          {
        
       
                  echo '<tr><td>'.$row['supname'].'</td><td>'.$row['supphone'].'</td><td>'.$row['supemail'].'</td><td>'.$row['supcity'].'</td><td>'.$row['supdistrict'].'</td><td>'.$row['suppincode'].'</td><td>'.$row['supstate'].'</td></tr>'; 
                  
                }
        
            }
        else if($optn=='order'){

              ?>
              <h1 style="text-align:center">BABY CARE </h1>
              <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
               <h1 style="text-align:center">Order Details</h1>
            <tr>
              <th>Order ID</th>
                <th>User ID</th>
                <th>Customer</th>
                <th>City</th>
                <th>Phone</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
              <?php
            $ty="SELECT tbl_cmaster.orderid,tbl_customer.id as userid,tbl_customer.fname,tbl_customer.lname,tbl_customer.city,tbl_customer.phone,tbl_product.`id` AS bid,tbl_product.pname,tbl_product.stock,tbl_cchild.`qty`,tbl_cchild.`totalprice`,tbl_cchild.odate FROM tbl_cmaster,tbl_cchild,tbl_product,tbl_customer WHERE tbl_product.`id`=tbl_cchild.`itemid` AND tbl_customer.`id`=tbl_cmaster.`custid` and tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cchild.cstatus='Order Placed' and (tbl_cchild.odate between '$sdate' and '$edate')";
     
              $qr=mysqli_query($conn,$ty);
              while($row=mysqli_fetch_array($qr))
              {
                        echo '<tr><td>'.$row['orderid'].'</td><td>'.$row['userid'].'</td><td>'.$row['fname'].' '. $row['lname'].'</td><td>'.$row['city'].'</td><td>'.$row['phone'].'</td><td>'.$row['bid'].'</td><td>'.$row['pname'].'</td><td>'.$row['qty'].'</td><td>'.$row['totalprice'].'</td><td>'.$row['odate'].'</td></tr>'; 
                    }
            
                }
                else if($optn=='cancelorder'){

                  ?>
                  <h1 style="text-align:center">BABY CARE </h1>
                  <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
                   <h1 style="text-align:center">Cancelled Orders</h1>
                <tr>
                  <th>Order ID</th>
                    <th>User ID</th>
                    <th>Customer</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                  
                </tr>
                  <?php
                $ty="SELECT tbl_cmaster.orderid,tbl_customer.id as userid,tbl_customer.fname,tbl_customer.lname,tbl_customer.city,tbl_customer.phone,tbl_product.`id` AS bid,tbl_product.pname,tbl_product.stock,tbl_cchild.`qty`,tbl_cchild.`totalprice`,tbl_cchild.odate FROM tbl_cmaster,tbl_cchild,tbl_product,tbl_customer WHERE tbl_product.`id`=tbl_cchild.`itemid` AND tbl_customer.`id`=tbl_cmaster.`custid` and tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_cchild.cstatus='Cancelled, Refunded' and (tbl_cchild.odate between '$sdate' and '$edate')";
            // echo $ty;
                  $qr=mysqli_query($conn,$ty);
                  while($row=mysqli_fetch_array($qr))
                  {
                            echo '<tr><td>'.$row['orderid'].'</td><td>'.$row['userid'].'</td><td>'.$row['fname'].' '. $row['lname'].'</td><td>'.$row['city'].'</td><td>'.$row['phone'].'</td><td>'.$row['bid'].'</td><td>'.$row['pname'].'</td><td>'.$row['qty'].'</td><td>'.$row['totalprice'].'</td><td>'.$row['odate'].'</td></tr>'; 
                        }
                
                    }

                else if($optn=='purchase'){

                  ?>
                  <h1 style="text-align:center">BABY CARE </h1>
                      <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
                  
                   <h1 style="text-align:center">Purchase Details</h1>
                <tr>
                <th>Purchase ID</th>
                 <th>Staff Name</th>
                 <th>Supplier Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Cost price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Date</th>
                </tr>
                  <?php
                $ty="select tbl_purchasemaster.pmasterid,tbl_staff.fname,tbl_staff.lname, tbl_category.cname,tbl_subcat.category,tbl_product.pname,tbl_product.stock,tbl_purchasechild.costprice,tbl_purchasechild.totalprice,tbl_purchasechild.quantity,tbl_purchasechild.date,tbl_supplier.supname from tbl_product,tbl_purchasechild,tbl_purchasemaster,tbl_category,tbl_subcat,tbl_supplier,tbl_staff where tbl_purchasechild.pmasterid=tbl_purchasemaster.pmasterid and tbl_product.id=tbl_purchasechild.itemid and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_category.id=tbl_subcat.catid and tbl_purchasechild.supid=tbl_supplier.sup_id and tbl_staff.sid=tbl_purchasemaster.staffid and (tbl_purchasechild.date between '$sdate' and '$edate')";
                  $qr=mysqli_query($conn,$ty);
                  while($r=mysqli_fetch_array($qr))
                  {
                    echo '<tr><td>'.$r['pmasterid'].'</td>'
                    .'<td><a style="color:black;" href="adminviewstaff.php">'.$r['fname'].' '.$r['lname'].'</a></td>'
                    . '<td><a style="color:black;" href=addsupplier.php>'.$r['supname'].'</a></td>'
                    . '<td>'.$r['pname'].'</td>'
                    . '<td>'.$r['cname'].'</td>'
                    . '<td>'.$r['category'].'</td>'
                            . '<td>'.$r['costprice'].'</td>'
                            . '<td>'.$r['quantity'].'</td>'
                            . '<td>'.$r['totalprice'].'</td>'
                            . '<td>'.$r['date'].'</td>'
                            . '</tr>';
                        }
                
                    }

                    else if($optn=='payment'){

                      ?>
                      <h1 style="text-align:center">BABY CARE </h1>
                      <h2 style="text-align:center">Learn.Share.Laugh.Grow.</h2>
  <address style="text-align:center"> Baby Care building, Panampilly Nagar, Kochi-682019</address>
                       <h1 style="text-align:center">Payment Details</h1>
                    <tr>
                    <th> CUSTOMER NAME    </th>
        <th> PHONE    </th>
    
      
        <th> PRODUCT </th>
    
        <th> CATEGORY    </th>
        <th> SUBCATEGORY    </th>
        <th> QUANTITY    </th>
        <th> AMOUNT    </th>
        <th> ORDER DATE    </th>
       
                    </tr>
                      <?php
                      // $u="select  distinct tbl_cmaster.orderid,tbl_customer.fname,tbl_customer.lname,tbl_customer.phone,tbl_product.`id` AS productid,tbl_category.cname,tbl_subcat.category,tbl_product.`pname`,tbl_cchild.`qty`,tbl_cchild.`totalprice`,tbl_payment.pdate FROM tbl_cmaster,tbl_cchild,tbl_product,tbl_customer,tbl_category,tbl_subcat,tbl_payment WHERE 
                      // tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_product.id=tbl_cchild.itemid and tbl_category.id=tbl_product.cat and tbl_subcat.scid =tbl_product.scat and tbl_category.id=tbl_subcat.catid  and tbl_payment.custid=tbl_customer.id and tbl_cmaster.status='Order Placed' 
                      //  and tbl_cchild.custid=tbl_customer.id and tbl_cmaster.custid=tbl_cchild.custid and tbl_payment.orderid=tbl_order.oid";
                 $u="select  distinct tbl_cmaster.orderid,tbl_customer.fname,tbl_customer.lname,tbl_customer.phone,tbl_product.`id` AS productid,tbl_category.cname,tbl_subcat.category,tbl_product.`pname`,tbl_cchild.`qty`,tbl_cchild.`totalprice`,tbl_payment.pdate FROM tbl_cmaster,tbl_cchild,tbl_product,tbl_customer,tbl_category,tbl_subcat,tbl_payment WHERE 
                 tbl_cmaster.orderid=tbl_cchild.cmasterid and tbl_product.id=tbl_cchild.itemid and tbl_category.id=tbl_product.cat and tbl_subcat.scid =tbl_product.scat and tbl_category.id=tbl_subcat.catid  and tbl_payment.custid=tbl_customer.id and tbl_cmaster.status='Order Placed' 
                 and tbl_cchild.custid=tbl_customer.id and tbl_cmaster.custid=tbl_cchild.custid and tbl_cchild.cstatus='Order Placed'";
                      
                //  echo $u;
                 $qry = mysqli_query($conn,$u);
                    
                    while ($row = mysqli_fetch_array($qry)) {
                        echo '<tr><td>' . $row['fname'] . ' '.  $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['pname'] . '</td><td>'. $row['cname'] .'</td><td>' . $row['category'] .'</td><td>'. $row['qty'] .'</td><td>'. $row['totalprice'] . '</td><td>' . $row['pdate'] . '</td></tr>';
                    }
                        }
              
        ?>
        </table>
                    </div>

        <button class="btn btn-primary" style="margin-left:900px;" onclick="myFunction()">PRINT</button>
<script>
function myFunction() {
window.print();
}
</script>