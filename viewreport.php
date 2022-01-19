
<?php
include 'adminbase.php';

?>
<style>
    /* th{
        
        background-color:lightcoral;
        padding:10px;
        width:1  30px;
        
    } */
    
    
    
    </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<br><br>
<div style="width:1350px; ">
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
<h1 style="text-align:center;margin-top:40px;">REPORT</h1>
<form method="POST" style="float:center;">
<table align="center" style="margin-bottom:140px;width:400px">

       
   
    <tr><td> Select </td><td><select  id="test" name="form_select" onchange="showDiv(this)" required class="form-control">
    <option value=''>----Select-----</option>
    <option value='customer'>Customer</option>
    <option value='staff'>Staff</option> 
    <option value='supplier'>Supplier</option>
    <option value='order'>Order</option>
    <option value='cancelorder'>Canceled Order</option>
    <option value='purchase'>Purchase</option> 
    <option value='payment'>Payment</option>
    </select>
    </td></tr>


<tr><td> Starting Date</td><td><input  type="date" name="sdate"   class="form-control"></td></tr>
<tr><td> Ending Date</td><td><input  type="date" name="edate"   class="form-control"></td></tr>


<tr>
<!-- <td colspan="2" align="center"><input type="submit" name="search" value="search" class="btn btn-success"> -->
  <td colspan="2" align="center">
<input type="submit" name="pr" value="Print"   class="btn btn-primary"></td></tr>

</table></form>
  </div></div>
<table border="1" >
<?php
include '../connection.php';
if(isset($_POST['pr']))
{
  $optn=$_POST['form_select'];
  // echo $optn;
  $sdate=$_POST['sdate'];
  $edate=$_POST['edate'];
  echo "<script>window.location='print.php?optn=".$optn."&sdate=".$sdate."&edate=".$edate."'</script>";
}
?>


<?php
session_start();

include '../connection.php';
if(isset($_POST['search']))
{

  $optn=$_POST['form_select'];

$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
if($optn=='customer'){
    $uii="select count(*) from tbl_customer where status='1' and date between '$sdate' and '$edate'";
$qrr=mysqli_query($conn,$uii);
$row1=mysqli_fetch_array($qrr);
if($row1[0]>0)
{

  ?>
<tr>
  <th>Customer</th>
    <th>Phone</th>
    <th>Email</th>
    <th>House Name</th>
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
    else{
       echo '<h1>No data found</h1>';
    }
}
  else if($optn=='staff'){
    $uii="select count(*) from tbl_staff where status='1' and date between '$sdate' and '$edate'";
    
      $qrr=mysqli_query($conn,$uii);
     $row1=mysqli_fetch_array($qrr);
if($row1[0]>0)
{
      ?>
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
    //   echo $ui;
      $qr=mysqli_query($conn,$ui);
      while($row=mysqli_fetch_array($qr))
      {
    
   
              echo '<tr><td>'.$row['fname'].' ' .$row['lname'].'</td><td>'.$row['phone'].'</td><td>'.$row['email'].'</td><td>'.$row['houseno'].'</td><td>'.$row['street'].'</td><td>'.$row['district'].'</td><td>'.$row['pincode'].'</td></tr>'; 
              
            }
        }
    
    else{
       echo '<h1>No data found</h1>';
    }
    
        }

      else  if($optn=='supplier'){
        $uii="select count(*) from tbl_supplier where supstatus='1' and date between '$sdate' and '$edate'";
        $qrr=mysqli_query($conn,$uii);
        $row=mysqli_fetch_array($qrr);
        if($row[0]>0)
        {

          ?>
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
            else{
                echo '<h1>No data found</h1>';
             }
             
                 }

        else if($optn=='order'){

              ?>
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
    //  echo $ty;
              $qr=mysqli_query($conn,$ty);
              while($row=mysqli_fetch_array($qr))
              {
                        echo '<tr><td>'.$row['orderid'].'</td><td>'.$row['userid'].'</td><td>'.$row['fname'].' '. $row['lname'].'</td><td>'.$row['city'].'</td><td>'.$row['phone'].'</td><td>'.$row['bid'].'</td><td>'.$row['pname'].'</td><td>'.$row['qty'].'</td><td>'.$row['totalprice'].'</td><td>'.$row['odate'].'</td></tr>'; 
                    }
            
                }
                else if($optn=='cancelorder'){

                  ?>
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
            
                  $qr=mysqli_query($conn,$ty);
                  while($row=mysqli_fetch_array($qr))
                  {
                            echo '<tr><td>'.$row['orderid'].'</td><td>'.$row['userid'].'</td><td>'.$row['fname'].' '. $row['lname'].'</td><td>'.$row['city'].'</td><td>'.$row['phone'].'</td><td>'.$row['bid'].'</td><td>'.$row['pname'].'</td><td>'.$row['qty'].'</td><td>'.$row['totalprice'].'</td><td>'.$row['odate'].'</td></tr>'; 
                        }
                
                    }

                else if($optn=='purchase'){

                  ?>
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
                echo $ty;
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
              }
        ?>
        </table>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">

function showDiv(select){
    // alert(select.value);
    var gt=select.value;
   if(gt=='order'){
    document.getElementById('hidden_div1').style.display = "block";
    document.getElementById('hidden_div2').style.display = "block";
    document.getElementById('hidden_div3').style.display = "block";
    document.getElementById('hidden_div4').style.display = "block";
   } 
   else if(gt=='cancelorder'){
  
  document.getElementById('hidden_div1').style.display = "block";
  document.getElementById('hidden_div2').style.display = "block";
  document.getElementById('hidden_div3').style.display = "block";
  document.getElementById('hidden_div4').style.display = "block";
 
 }
   
   else if(gt=='purchase'){
  
    document.getElementById('hidden_div1').style.display = "block";
    document.getElementById('hidden_div2').style.display = "block";
    document.getElementById('hidden_div3').style.display = "block";
    document.getElementById('hidden_div4').style.display = "block";
   
   }
   else if(gt=='payment'){
  
  document.getElementById('hidden_div1').style.display = "block";
  document.getElementById('hidden_div2').style.display = "block";
  document.getElementById('hidden_div3').style.display = "block";
  document.getElementById('hidden_div4').style.display = "block";
 
 }
   else{
    document.getElementById('hidden_div1').style.display = "none";
    document.getElementById('hidden_div2').style.display = "none";
    document.getElementById('hidden_div3').style.display = "none";
    document.getElementById('hidden_div4').style.display = "none";
   }
} 
</script>




          

  <br>     <br>    <br>    <br>   

  <br>    <br>    <br>    <br>    <br>   
</div>  
        
  <?php
include '../footer.php';
?>
  