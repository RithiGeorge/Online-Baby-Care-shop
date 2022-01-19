<?php
include '../connection.php';
include 'customerbase.php';
session_start();
$custid=$_SESSION['id'];
if(!empty($_SESSION['id']))
{
$custid=$_SESSION['id'];
// echo $custid;
$c=0;

$sql_fetch_cm="SELECT * FROM tbl_cmaster WHERE custid='$custid' AND status='Order Pending'";
$sql_exe_cm=mysqli_query($conn,$sql_fetch_cm);
$cm=mysqli_fetch_array($sql_exe_cm);

$cmid=$cm['orderid'];

$sql_fetch_cc="SELECT * FROM tbl_cchild WHERE cmasterid='$cmid'";
$sql_exe_cc=mysqli_query($conn,$sql_fetch_cc);

}

?>


              <h4 class=" font-weight-bold mt-1 " style="text-align: center;font-size:20px ">Cart List</h4>
          <div class="card" style="margin: 15px;">
            
          
          <div class="table-responsive">
          
          <table class="table table-stripped table-bordered"  >
           
          <thead >
          <tr style="height:70px; vertical-align: middle;background-color:#900C3F;color:white;font-size:20px;">
            <th style="width: 500px; text-align:center" scope="col">Products</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>

            <?php
                while($cc=mysqli_fetch_array($sql_exe_cc))
                {

                $iid=$cc['itemid'];
                
                $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$iid'";
                $sql_exe_item=mysqli_query($conn,$sql_fetch_item);
                $item=mysqli_fetch_array($sql_exe_item);
                                 
            ?>

          <tr >
            <td>
              <a href="ItemDetails.php?user_id=<?php echo $item['id'];?>" style="text-decoration: none;">
              <figure class=" d-flex ">
                <div class="aside"><img style="margin-left: 80px ;" width="100" height="100" class=" img-fluid rounded" src=" <?php echo  $item['itemimage'] ;?>" class="img-sm"></div>
                <figcaption class="info" style="width: 250px; margin-left: 20px;">
                  <h5  class="title " ><?php print_r($item['pname']);?></h5>
                </figcaption>
              </figure>
            </a>
            </td>
            <td>
              <div class="price-wrap">
                <var class="price">Rs. <?php print_r($item['rate']);?></var>
              </div>
            </td>
            <td>
              <form style="width: 150px;" class="row needs-validation" method="post" action="cart_update.php">
                <div class="input-group has-validation">
                  <input name="qty" type="number" min="1" max="<?php echo $item['stock']; ?>" style="border-radius: 0.2rem;width:60px;text-align:center;margin-left:20px;"  value="<?php print_r($cc['qty']);?>"  placeholder="Qty"  required>
                  <!-- <div class="valid-feedback">
                    Looks good!
                  </div> -->
                  <input name="item" type="hidden" value="<?php print_r($cc['itemid']);?>">
                  <input name="ccid" type="hidden" value="<?php print_r($cc['cchildid']);?>">
                  <input name="sp" type="hidden" value="<?php print_r($item['rate']);?>">
                  <input name="tp" type="hidden" value="<?php print_r($cc['totalprice']);?>">
                  <input name="cmid" type="hidden" value="<?php print_r($cc['cmasterid']);?>">
                  <input name="ta" type="hidden" value="<?php print_r($cm['totalprice']);?>">
                  <button type="submit"  class="btn "><i class="bi bi-arrow-right">-></i></button>
                  
              </div>
              </form>

              <?php
                if($cc['qty']>$item['stock'])
                { $c++;
              ?>
                  <p class="text-danger" >Not Enough Items In Stock!</p>
              <?php
                }
              ?>

            </td>
            <td>
              <div class="price-wrap">
                <var class="price">Rs. <?php print_r($cc['totalprice']);?></var>
              </div>
            </td>
            <td >
            <a href="cartremove.php?cid=<?php echo $cc['cchildid'];?>" class="btn btn-outline-danger">Remove</a>
            </td>
          </tr>

          <?php                  
        }
        ?>

        <tr >
          <th ></th>
          <th ></th>
          <th scope="col">Total Amount : </th>
          <th scope="col">Rs. <?php print_r($cm['totalprice']);?></th>

          <?php
                if($c>0)
                { 
              ?>
              <th ><a href="PlaceOrder.php?cid=<?php echo $cm['orderid'];?>" class="btn btn-primary disabled"><i class="bi bi-journal-check" style="margin-right: 10px;" ></i>Place Order</a></th>
              <?php
                }
                else
                {
              ?>

          <th ><a href="pay.php?orderid=<?php echo $cm['orderid'];?>" class="btn btn-primary"><i class="bi bi-journal-check" style="margin-right: 10px;"></i>Place Order</a></th>
          <?php
                }
              ?>
        </tr>
         
          </tbody>
          </table>
          
          </div> 
          </div> 
            </aside> 


            <!-- <aside class="col-lg-3">
          
          <div class="card mb-3">
          <div class="card-body">
          <form>
            <div class="form-group">
              <label>Have coupon?</label>
              <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="Coupon code">
                <span class="input-group-append">
                  <button class="btn btn-primary">Apply</button>
                </span>
              </div>
            </div>
          </form>
          </div> 
          </div> 
          
          <div class="card">
          <div class="card-body">
              <dl class="dlist-align">
                <dt>Total price:</dt>
                <dd class="text-right">$69.97</dd>
              </dl>
              <dl class="dlist-align">
                <dt>Discount:</dt>
                <dd class="text-right text-danger">- $10.00</dd>
              </dl>
              <dl class="dlist-align">
                <dt>Total:</dt>
                <dd class="text-right text-dark b"><strong>$59.97</strong></dd>
              </dl>
              <hr>
              <p class="text-center mb-3">
                <img src="bootstrap-ecommerce-html/images/misc/payments.png" height="26">
              </p>
              <a href="#" class="btn btn-primary btn-block"> Make Purchase </a>
              <a href="#" class="btn btn-light btn-block">Continue Shopping</a>
          </div> 
          </div> 
          
            </aside>  -->
          </div> 

          
          </div>
          </div>
        
        </div>

        <!-- Footer -->
        <footer class="page-footer font-small pt-4" style="height: 160px; background-color: black; color: white;margin-top:200px; ">

            <!-- Footer Text -->
            <div class="container-fluid d-flex justify-content-between" >
    
                <!-- Grid column -->
                <div class=" mt-md-0 mt-3">
                <h5 class="font-weight-bold">Baby Care </h5>
               
                </div>
                
                <!-- Grid column -->
                
    
            <!-- Copyright -->
            <div class="footer-copyright text-center py-1" id="copyright">
            </div>
            
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="jquery.js"></script>
        <script>
          $(".alert").delay(2000).slideUp(200, function() {
           $(this).alert('close');
            });
        </script> 
    </body>

</html>