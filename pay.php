<?php
include '../connection.php';
include 'customerbase.php';
?>
<html>

    <body>
        <?php
          session_start();
        include '../connection.php';
      
        $orderid = $_GET['orderid'];
        // echo $orderid;
  
// $y="select SUM(totalprice) from tbl_cchild where cmasterid='$orderid'";
// $rr=mysql_query($y);
// $rt=mysql_fetch_array($rr);
// $rtt=$rt[0];
//         }
// $qqq="update tbl_cmaster set totalprice='$rtt' where orderid='$orderid'";
// $qee=mysql_query($qqq);  

$sql="select totalprice from tbl_cmaster where orderid='$orderid'";
$ee=mysqli_query($conn,$sql);
$dat=mysqli_fetch_array($ee);
$data=$dat[0];
// echo $data;

        // $qry = "select * from tbl_order where id ='$orderid'";
        // $res = mysql_query($qry);
        // $r = mysql_fetch_array($res);
      
        ?>
        <h1 style="margin-left:600px;margin-top:50px;">Payment Details</h1>
        <div style="margin-left:390px;margin-bottom:400px;border:5px solid maroon;border-radius:20px;width:600px;margin-top:10px;">
  

            <!--Payment-->
            <section class="payment_w3ls py-5" style="margin-right:0px;margin-left:120px;">
                <div class="container">
                    <div class="privacy about">
                       
                        
                            <div class="pay_info">
                                
                                    <div class="col-md-6">
                                        <form action="#" method="POST" class="creditly-card-form shopf-sear-headinfo_form">
                                            <section class="creditly-wrapper payf_wrapper">
                                                <div class="credit-card-wrapper">
                                                    <div class="first-row form-group">
                                                        <!-- <div class="controls">
                                                            <label class="control-label">Card Holder </label>
                                                            <input class="billing-address-name form-control" type="text" name="cname" placeholder="Username">
                                                        </div> -->
                                                        <div class="paymntf_card_number_grids">
                                                            <div class="fpay_card_number_grid_left">
                                                                <div class="controls">
                                                                    <label class="control-label">Card Number</label>

                                                                   
            <td><select class="form-control"  name="cid" style="width:250px;">
                <option>-------Select---------</option>
                    <?php
                    include '../connection.php';
                    $custid = $_SESSION['id'];
                    $qry1 = "select * from tbl_card where custid='$custid'";
                    $res1 = mysqli_query($conn,$qry1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        echo "<option value='" . $row1['cardid'] . "'>" . $row1['cardno'] . "</option>";
                    }
                    ?>
                </select></td>

                                                                    <!-- <input class="number credit-card-number form-control" type="text" name="cnumber" inputmode="numeric" autocomplete="cc-number"
                                                                           autocompletetype="cc-number" x-autocompletetype="cc-number" required   title="enter Correct card number"
                                                                           placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;"> -->
                                                                </div>
                                                            </div>
                                                            <div class="fpay_card_number_grid_right">
                                                                <div class="controls">
                                                                    <label class="control-label">CVV</label>
                                                                    <input style="width:250px;" class="security-code form-control" pattern="^[0-9]{3}" required title="enter proper cvv" type="password" name="cvv">
                                                                </div>
                                                            </div>
                                                            <div class="fpay_card_number_grid_right">
                                                            <div class="controls">
                                                                <label class="control-label">Amount Payable </label>
                                                                <input style="width:250px;" class="billing-address-name form-control" type="text" name="amount" value="<?php echo $dat[0]; ?>" readonly="" >
                                                            </div>
                                                            </div>
                                                            <div class="clear"> </div>
                                                        </div>

                                                        <!-- <label class="control-label">Valid Thru</label>
                                                        <input class="expiration-month-and-year form-control" required type="text" name="expiration-month-and-year" placeholder="MM / YY">
                                                        -->

                                                        <!-- <label>Expiration Month</label>
                                                        <select class="number credit-card-number form-control" name="expm" style="background-color:#BED0E9">
                                                            <option value="01">January</option>
                                                            <option value="02">February </option>
                                                            <option value="03">March</option>
                                                            <option value="04">April</option>
                                                            <option value="05">May</option>
                                                            <option value="06">June</option>
                                                            <option value="07">July</option>
                                                            <option value="08">August</option>
                                                            <option value="09">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                        <label>Expiration Year</label>
                                                        <select class="number credit-card-number form-control" name="expy" style="background-color:#BED0E9">                                                                   

                                                            <option value="21"> 2021</option>
                                                            <option value="21"> 2022</option>
                                                            <option value="21"> 2023</option>
                                                            <option value="21"> 2024</option>
                                                            <option value="21"> 2025</option>
                                                        </select>
                                                    </div> -->
                                                </div>
                                                <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
                                                <input name="date" type="hidden" value="<?php echo date('Y-m-d');?>">
                                                <input class="btn btn-primary " type="submit" name="submit" value="Proceed Payment">
                                                </div>
                                            </section>
                                        </form>
                                        <!--                                            
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                        <!--//tabs-->
                                    </div>
                </div>
                                </div>
                                </section>
                                <script src="web/js/jquery-2.2.3.min.js"></script>
                                <!-- //js -->
                                <!-- smooth dropdown -->
                                <script>
                                    $(document).ready(function () {
                                        $('ul li.dropdown').hover(function () {
                                            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
                                        }, function () {
                                            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
                                        });
                                    });
                                </script>
                                <!-- //smooth dropdown -->
                                <!-- script for password match -->
                                <script>
                                    window.onload = function () {
                                        document.getElementById("password1").onchange = validatePassword;
                                        document.getElementById("password2").onchange = validatePassword;
                                    }

                                    function validatePassword() {
                                        var pass2 = document.getElementById("password2").value;
                                        var pass1 = document.getElementById("password1").value;
                                        if (pass1 != pass2)
                                            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                                        else
                                            document.getElementById("password2").setCustomValidity('');
                                        //empty string means no validation error
                                    }
                                </script>
                                <!-- script for password match -->

                                <!-- cart-js -->
                                <script src="web/js/minicart.js"></script>
                                <script>
                                    hub.render();

                                    hub.cart.on('new_checkout', function (evt) {
                                        var items, len, i;

                                        if (this.subtotal() > 0) {
                                            items = this.items();

                                            for (i = 0, len = items.length; i < len; i++) {
                                            }
                                        }
                                    });
                                </script>
                                <!-- //cart-js -->
                                <!-- easy-responsive-tabs -->
                                <script src="web/js/easy-responsive-tabs.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        $('#horizontalTab').easyResponsiveTabs({
                                            type: 'default', //Types: default, vertical, accordion           
                                            width: 'auto', //auto or any width like 600px
                                            fit: true, // 100% fit in a container
                                            closed: 'accordion', // Start closed if in accordion view
                                            activate: function (event) { // Callback function if tab is switched
                                                var $tab = $(this);
                                                var $info = $('#tabInfo');
                                                var $name = $('span', $info);
                                                $name.text($tab.text());
                                                $info.show();
                                            }
                                        });
                                    });
                                </script>
                                <!-- //easy-responsive-tabs -->

                                <!-- credit-card -->
                                <script src="web/js/creditly.js"></script>
                                <link rel="stylesheet" href="../web/css/creditly.css" type="text/css" media="all" />

                                <script>
                                    $(function () {
                                        var creditly = Creditly.initialize(
                                                '.creditly-wrapper .expiration-month-and-year',
                                                '.creditly-wrapper .credit-card-number',
                                                '.creditly-wrapper .security-code',
                                                '.creditly-wrapper .card-type');

                                        $(".creditly-card-form .submit").click(function (e) {
                                            e.preventDefault();
                                            var output = creditly.validate();
                                            if (output) {
                                                // Your validated credit card output
                                                console.log(output);
                                            }
                                        });
                                    });
                                </script>
                                <!-- //credit-card -->
                                <!-- start-smooth-scrolling -->
                                <script src="web/js/move-top.js"></script>
                                <script src="web/js/easing.js"></script>
                                <script>
                                    jQuery(document).ready(function ($) {
                                        $(".scroll").click(function (event) {
                                            event.preventDefault();

                                            $('html,body').animate({
                                                scrollTop: $(this.hash).offset().top
                                            }, 1000);
                                        });
                                    });
                                </script>
                                <!-- //end-smooth-scrolling -->
                                <!-- smooth-scrolling-of-move-up -->
                                <script>
                                    $(document).ready(function () {
                                        /*
                                         var defaults = {
                                         containerID: 'toTop', // fading element id
                                         containerHoverID: 'toTopHover', // fading element hover id
                                         scrollSpeed: 1200,
                                         easingType: 'linear' 
                                         };
                                         */

                                        $().UItoTop({
                                            easingType: 'easeOutQuart'
                                        });

                                    });
                                </script>
                                <script src="web/js/SmoothScroll.min.js"></script>
                                <!-- //smooth-scrolling-of-move-up -->
                                <!-- Bootstrap core JavaScript
                                ================================================== -->
                                <!-- Placed at the end of the document so the pages load faster -->
                                <script src="web//web/js/bootstrap.js"></script>
                                <!-- //payment -->
                                </body>
                                </html>
                                <?php
                              

                                include '../connection.php';

                                if (isset($_POST['submit'])) {
                                    $custid = $_SESSION['id'];
                                    $orderid = $_POST['orderid'];
                                    // $cname = $_POST['cname'];
                                    $cid = $_POST['cid'];
                                    $cvv = $_POST['cvv'];
                                    $amount = $_POST['amount'];
                                    // $expm = $_POST['expm'];
                                    // $expy = $_POST['expy'];
                                    $pdate = date('y/m/d');



                              
                              
                              
                              $sql_insert_order="INSERT INTO tbl_order (cmasterid, odate,ostatus) VALUES ('$orderid','$pdate','ordered')";
                              
                              if(mysqli_query($conn,$sql_insert_order))
                              {
                                  $sql_fetch_order="SELECT * FROM tbl_order WHERE cmasterid='$orderid'";
                                  $sql_cart_order=mysqli_query($conn,$sql_fetch_order);
                                  $order=mysqli_fetch_assoc($sql_cart_order);
                              
                                  $oid=$order['oid'];
                              
                                  if($order)
                                  {
                                    $qry = "select count(*) from tbl_payment where custid='$custid' and orderid='$orderid'";
                                    $res = mysqli_query($conn,$qry);
                                    $row = mysqli_fetch_array($res);

                                    if ($row[0] > 0) {
                                        echo '<script>alert(" Already Payed ....");</script>';
                                    } else {

                                        $qry1 = "insert into tbl_payment(custid,orderid,cardid,cvv,amount,status,pdate)values('$custid','$oid','$cid','$cvv','$amount','paid','$pdate')";
                                        // echo $qry1;
                                     
                                        $res1 = mysqli_query($conn,$qry1);

                                        $dd="update tbl_order set ostatus='paid'";
                                        $ff= mysqli_query($conn,$dd);

                                        $dd1="update tbl_cmaster set status='Order Placed' where orderid='$orderid'";
                                        $ff1= mysqli_query($conn,$dd1);
                                        $sql_update_cc="UPDATE tbl_cchild SET cstatus='Order Placed' WHERE cmasterid='$orderid'";
                                        if(mysqli_query($conn,$sql_update_cc))
                                        {
                                        $sql_fetch_cc="SELECT * FROM tbl_cchild WHERE cmasterid='$orderid'";
                                        $sql_cart_cc=mysqli_query($conn,$sql_fetch_cc);
                                        
                                        while($cc=mysqli_fetch_assoc($sql_cart_cc))
                                        {
                                            $iid=$cc['itemid'];
                                            $qty=$cc['qty'];
                        
                                            $sql_update_item="UPDATE tbl_product SET stock=stock-'$qty' WHERE id='$iid'";
                                            $item=mysqli_query($conn,$sql_update_item);
                                        }
                                        if ($res1) {
                                            echo '<script>alert(" Paid ....");</script>';
                                            echo '<script>location.href="customerhome.php"</script>';
                                        }
                                    }
                                    }
                                }
                            }
                        }

                       
                                ?>

<!--  -->




