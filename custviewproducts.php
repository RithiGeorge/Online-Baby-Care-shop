<?php
include 'customerbase.php';
include '../connection.php';
?>
<html>
    <head>
        <title>viewaddproduct</title>
        <style>
            td{
                padding:4px;
               color: black;font-size: 20px;font-weight: 900;
               text-align: center;
            }
            th{
                width: 150px;
                height: 25px;
                background-color: green;
                color: white;
                font-size: 20px;
            }
            
        </style>
    </head>
    <body>
        <br><br>
        <h1 style="text-align:center; font-size: 30px;color:white;"><b>PRODUCTS</b></h1>
        <!-- <table align="center" border="1">
            <tr>
                <th>Farmerid</th>
                <th>FarmerName</th>
                <th>Productid</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th colspan="2">Image</th>
                
                
                
            </tr>
            {% for i in j %}
            <tr>
                <td>{{i.0}}</td>
                <td>{{i.6}}</td>
                <td>{{i.1}}</td>
                <td>{{i.2}}</td>
                <td>{{i.3}}</td>
                <td>{{i.4}}</td>
                
                
                
                <td><img src="../static{{i.5}}" height="150px" width="150px"></td>
                <td style="color:green;"><a href="/insertintocart?farmerid={{i.0}}&productid={{i.1}}&price={{i.4}}">ORDER</a></td>

            </tr>
            {% endfor %}
        </table> -->




        <!--A Design by W3layouts
        Author: W3layout
        Author URL: http://w3layouts.com
        License: Creative Commons Attribution 3.0 Unported
        License URL: http://creativecommons.org/licenses/by/3.0/
        -->
        <!DOCTYPE html>
        <html>
        <head>
      
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Biruang Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstarp-css -->
        <link href="shopping/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstarp-css -->
        <!-- css -->
        <link rel="stylesheet" href="shopping/css/style.css" type="text/css" media="all" />
        <!--// css -->
        <script src="shopping/js/jquery.min.js"></script>
        <!--fonts-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
        <!--/fonts-->
        <!-- dropdown -->
        <script src="shopping/js/jquery.easydropdown.js"></script>
        <link href="shopping/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="shopping/js/scripts.js" type="text/javascript"></script>
        <!--js-->
        <!--/js-->
        <script src="shopping/js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion           
                                width: 'auto', //auto or any width like 600px
                                fit: true   // 100% fit in a container
                            });
                        });
                       </script>	
        <!-- start-smoth-scrolling -->
                <script type="text/javascript" src="shopping/js/move-top.js"></script>
                <script type="text/javascript" src="shopping/js/easing.js"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".scroll").click(function(event){		
                            event.preventDefault();
                            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                        });
                    });
                </script>
        </head>
        <body>


        
<!-- <form method="post" enctype="multipart/form-data"> -->
    <!--<h1  align="center" style="margin-left: 350px;">Login</h1>-->
    <!--<hr style="color: black;">-->
    <!-- <table align="center" style="margin-left: 450px;"> -->

        <!-- <tr>
            <td>Brand Name</td>
            <td><select class="form-control"  name="pname" >
                <option>-------Select---------</option>
                    <?php
                    include '../connection.php';
                    $qry1 = "select * from tbl_brand where status='1'";
                    $res1 = mysqli_query($conn,$qry1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        echo "<option value='" . $row1['brand'] . "'>" . $row1['brand'] . "</option>";
                    }
                    ?>
                </select></td>
        </tr> -->
        <!-- <tr>
            <td> Select Category </td>
            <td><select class="form-control"  name="cat" id="cat">
                <option>-------Select---------</option>
                    <?php
                    include '../connection.php';
                    $qry1 = "select * from tbl_category where status='1'";
                    $res1 = mysqli_query($conn,$qry1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        echo "<option value='" . $row1['id'] . "'>" . $row1['cname'] . "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td> Select Sub Category </td>
            <td><select class="form-control"  name="scat" id="scat">
                    <option>Select Item</option>
                </select></td>
        </tr>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
                
            $("#cat").change(function () {
                var sid = $("#cat").val();
                // document.write(sid);
                // document.write("******");
                debugger;
                $.ajax({
                    url: "ajaxGetSubCat.php?id=" + sid,
                    type: 'POST',
                    success: function (data)
                    {
                        var dt = $.trim(data);
                        $("#scat").html(dt);
                    }, error: function (xhr, error)
                    {
                        alert(error);
                    }
                });
            });

        </script>

<tr>
            <td colspan="2"><input type="submit" align="center"  style="width:100px" name="submit" class="btn btn-primary" value="Search" ></td>

        </tr>
    </table>
</form> -->
            <!-- header -->
            <div class="header">
                <!-- container -->
                <div class="container">
                    <!-- header-top -->
                    <div class="header-top">
                        <div class="header-logo">
                             <form method="POST">
            
            <div class="men">
                <!-- container -->
                <div class="container" style="background-color: black;">
                    <div class="col-md-9 fashions"  >
                        <div class="title">
                            
                        </div>
                        <div class="fashion-section" style="overflow:auto;">
                         <div class="fashion-grid1" style="margin: 10px;">
                               <?php

                            //    if(isset($_POST['submit']))
                            //    {
                                   
    // $masterid=$_GET['bmid'];
    // $date=$_GET['date'];
                                //    $id=$_POST['scat'];
                                //    echo $id;
                                 $sql=("select tbl_product.*,tbl_subcat.category from tbl_product,tbl_subcat where tbl_product.status='1' and tbl_subcat.scid=tbl_product.scat  and tbl_product.stock>'0'");
                                 $tt=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($tt))
                                 {
                               ?>
                                <div style="margin-left: 200px;">
                                <div class="col-md-6 fashion-grid" >
               
               
                                    <a href="#"><img src="<?php echo $row['itemimage'];?>" alt="hello" style="height: 200px;width: 300px;border: 5px solid green;"/>
                                        <h3>Star:<?php echo $row['starvalue'];?></h3>
                                        <div class="product">
                                            <h3 style="font-size: 20px;font-weight: 400;"><?php echo $row['pname'];?></h3>
                                           
                                            <p><span></span> <?php echo $row['rate'];?> ₹</p>								 
                                        </div>							 
                                    </a>
                                    <!-- <div class="fashion-view"><span></span>
                                               <div class="clearfix"></div>
                                               <?php
                                          echo'  <h4><a href="viewitems.php?pid='.$row['id'].'&masterid='.$masterid.'&date='.$date.'">Quick View</a></h4>';
                                            ?> -->
                                    </div>
                                </div>
                            </div>
 <?php
              }    
            // }
 ?>
                                
                                 
                                 <div class="clearfix"></div>
                            </div>
                            <div class="fashion-grid2">
                                
                                
                                
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="fashion-grid2">
                                
                                
                                
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="header-right">
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!-- //header-top -->
                   
                    <div class="clearfix"> </div>
                    <!-- script-for-menu -->
                 <script>
                        $("span.menu").click(function(){
                            $(" ul.nav").slideToggle("slow" , function(){
                            });
                        });
                 </script>
                </div>
                <!-- //container -->
    
            <!-- //header -->
            <!-- men -->
           
                    
                <!-- // container -->
            </div>
            <!-- //footer -->
            </div>
            </form>
        </body>
        </html>
        
    
        <br><br><br>
    </body>
</html>




