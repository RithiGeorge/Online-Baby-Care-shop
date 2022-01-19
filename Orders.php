<?php
include '../connection.php';
include 'customerbase.php';
session_start();

$custid=$_SESSION['id'];

$sql_fetch_cm="SELECT * FROM tbl_cmaster WHERE custid='$custid' AND status='Order Placed' OR status='Order Cancelled' ORDER BY orderid DESC";
$sql_exe_cm=mysqli_query($conn,$sql_fetch_cm);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plant Nursery | Order List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" >
  <link href="Home.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>


<body>
  <!-- Navbar -->
 

  <div  style="min-height: calc(100vh - 160px);">



          <h4 class=" font-weight-bold mt-1 mb-4" style="text-align: center; ">Order Details</h4>

          <div class="card d-flex flex-row" style="margin-left: 100px; margin-right: 100px;border:5px solid maroon;border-radius:20px;">

            <div style="margin-left: 30px;">

              <div class=" table-responsive">

                <table class="table ">

                  <tbody>

                    <?php

              while($cm=mysqli_fetch_array($sql_exe_cm))
              {
                $cmid=$cm['orderid'];

              $sql_fetch_cc="SELECT * FROM tbl_cchild WHERE cmasterid='$cmid' and custid='$custid'";
              $sql_exe_cc=mysqli_query($conn,$sql_fetch_cc);

              $sql_fetch_order="SELECT * FROM tbl_order WHERE cmasterid='$cmid'";
              $sql_exe_order=mysqli_query($conn,$sql_fetch_order);
              $order=mysqli_fetch_array($sql_exe_order);

              $oid=$order['oid'];
// echo $oid;
              $sql_fetch_pay="SELECT * FROM tbl_payment WHERE orderid='$oid'";
              $sql_exe_pay=mysqli_query($conn,$sql_fetch_pay);
              $pay=mysqli_fetch_array($sql_exe_pay);

              $cardid=$pay['cardid'];

              $sql_fetch_card="SELECT * FROM tbl_card WHERE cardid='$cardid'";
              $sql_exe_card=mysqli_query($conn,$sql_fetch_card);
              $card=mysqli_fetch_array($sql_exe_card);

              while($cc=mysqli_fetch_array($sql_exe_cc))
              {
              

              $iid=$cc['itemid'];
              
              $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$iid'";
              $sql_exe_item=mysqli_query($conn,$sql_fetch_item);
              $item=mysqli_fetch_array($sql_exe_item);
                               
          ?>
   <!-- <div class="aside"><img style="margin-left: 80px ;" width="100" height="100" class=" img-fluid rounded" src=" <?php echo  $item['itemimage'] ;?>" class="img-sm"></div> -->
                    <tr>
                      <td>
                        <a href="ItemDetails.php?user_id=<?php echo $item['id'];?>" style="text-decoration: none;">
                          <figure  style="margin-right: 20px;">
                            <div class="aside"><img style="margin-left: 10px;" width="200px" height="200px"
                                class=" img-fluid rounded"
                                src=" <?php echo  $item['itemimage'] ;?>"
                               ></div>
                            <figcaption class="info" style="margin-left: 20px;">
                              <h5 class="text-muted mt-3">
                                <?php print_r($item['pname']);?>
                                <p class="text-muted mt-3" >
                                  Price : Rs.
                                  <?php print_r($item['rate']);?><br>
                                  Quantity :
                                  <?php print_r($cc['qty']);?><br>
                                </p>
                              </h5>
                              
                            </figcaption>
                          </figure>
                        </a>
                      </td>

                      <td>
                        <p class="mt-3" style="font-size: 16px;">
                          Total Price : Rs. <?php print_r($cc['totalprice']);?>
                        </p>
                        <p class="mt-3" style="font-size: 16px; margin-right: 50px;">
                          Card No. : <?php print_r($card['cardno']);?><br>
                        </p>
                      </td>

                      <td>
                        <p class="mt-3" style="font-size: 14px;">
                        Order ID : <?php print_r($order['oid']);?><br>
                        </p>
                        <p style="font-size: 16px;  margin-right: 30px;">
                          Order Date : <?php print_r($order['odate']);?><br>
                        </p>
                      </td>

                      <td>

                        <?php
                          if($cc['cstatus']=='Order Placed')
                          {
                        ?>
                        <p class="text-success mt-3" style="font-size: 14px;  margin-right: 30px;">
                          <?php print_r($cc['cstatus']);?><br>
                        </p>

                        <a href="ordercancel.php?cid=<?php echo $cc['cchildid'];?>" class="btn btn-outline-danger ">Cancel</a>

                        <?php
                          }
                          else if($cc['cstatus']=='Cancelled, Refunded')
                          {
                        ?>

                        <p  style="font-size: 14px; margin-top: 30px;">
                          Order Cancelled,<br>Payment Refunded.
                        </p>

                        <?php
                          }
                        ?>

                      </td>

                    </tr>

                    <?php                  
      }
    }
      ?>

                  </tbody>
                </table>

              </div>



            </div>
          </div>
        </aside>
      </div>

    </div>

  </div>
  </div>
  </div>
  </div>


  <!-- Footer -->
  <footer class="page-footer font-small pt-4 " style="height: 160px; background-color: black; color: white;">

    <!-- Footer Text -->
    <div class="container-fluid d-flex justify-content-between">

      <!-- Grid column -->
     

      <!-- Grid column -->
     
    </div>

    <!-- Copyright -->
    <div class="footer-copyright text-center py-1" id="copyright">© 2020 Copyright BabyCare
    </div>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
  <script>
    $(".alert").delay(2000).slideUp(200, function () {
      $(this).alert('close');
    });
  </script>
</body>

</html>