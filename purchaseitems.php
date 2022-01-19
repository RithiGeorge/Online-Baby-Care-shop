<?php
include '../connection.php';
include 'adminbase.php';
session_start(0);
$staffid=$_SESSION['sid'];


    $q="select max(pmasterid) from tbl_purchasemaster";
    $s=mysqli_query($conn,$q);
    $r=  mysqli_fetch_array($s);
    $pid=$r[0];
   
    $q="select * from tbl_purchasemaster where pmasterid='$pid'";
    $s=mysqli_query($conn,$q);
    $r=  mysqli_fetch_array($s);
    $rr=$r[2];
?>
<style>
    #data th{
        background-color: black;
        padding: 5px 5px 5px 5px;
        color: white;
    }
    #data td{
         padding: 5px 5px 5px 5px;
    }
    td,th{
        padding: 10px;
    }
</style>
<center>

<div style="margin-left: 80px;margin-top:60px;">
    <div style="width: 500px;border-radius: 30px;">
<h1 style="text-align:center;">Purchase items</h1>
   
        <br>
        
						<form action="#" method="post" >
                                <table>
                                                    

            <tr><td>Date:</td><td>
                <input  type="text"  name="da" readonly="" class="form-control" value="<?php echo date('Y/m/d'); ?>"  >
                </td></tr>
<tr><td>Brand:</td><td>
								<select class="form-control" name='brand' id="brand">
                                                            <option>Select Brand</option>
                                                            <?php
                                                            $q="select * from tbl_brand";
                                                            $s=  mysqli_query($conn,$q);
                                                            while($r=  mysqli_fetch_array($s))
                                                            {
                                                                echo '<option value="'.$r[1].'">'.$r[1].'</option>';
                                                            }
                                                            ?>
                                                        </select>
    </td></tr>

    <tr>
            <td> Select Category </td>
            <td><select class="form-control"    name="cat" id="cat">
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
        <tr>
            <td> Select Product</td>
            <td><select class="form-control"  name="pdt" id="pdt">
                    <option>Select Product</option>
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
                    url: "ajaxGetSubCat.php?id=" + sid ,
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

<script>
                
                $("#scat").change(function () {
                    var sid = $("#scat").val();
                    var brand = $("#brand").val();
                    // document.write(sid);
                    // document.write("******");
                    debugger;
                    $.ajax({
                        url: "ajaxGetproduct.php?id=" + sid + "&brand=" + brand,
                        type: 'POST',
                        success: function (data)
                        {
                            var dt = $.trim(data);
                            // alert(dt);
                            $("#pdt").html(dt);
                        }, error: function (xhr, error)
                        {
                            alert(error);
                        }
                    });
                });
    
            </script>

    <tr><td>Cost Price:</td><td>
        <input  type="number" name="cp" class="form-control" placeholder="price"  ></td></tr>

        <tr><td>Selling Price:</td><td>
        <input  type="number" name="sp" class="form-control" placeholder="price"  ></td></tr>
<tr><td>Quantity:</td><td>

        <input  type="number" name="qty" class="form-control" placeholder="Quantity"  ></td></tr>

        <tr>
    <td> Supplier </td> 
      <td><select name="supid"  class="form-control">
              <option value="0">--Select Supplier--</option>
                  <?php
                      include '../connection.php';
                                $exee= mysqli_query($conn,"select * from tbl_supplier");
                               
                                while($row=mysqli_fetch_array($exee))
                                {
                                    echo '<option value="'.$row['sup_id'].'">'.$row['supname'].' '.$row['supphone'].'</option>';
                                }
                                ?>
                                    
                                </select></td>
                        </tr>
                        


							<tr><td>
                        <input type="submit" id='btnNext' class="btn btn-warning" name="btnNext" value="Next"></td>
                    <td><input type="submit" id='btnFinish' class="btn btn-warning" name="btnFinish" value="Submit"></td></tr>
            </table>
        </form>
                                                        </div></div>

                <table id="data" border="1" >
                 <th>Supplier Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Cost price</th>
                    <th>Selling price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Date</th>
                <?php
                // $q="select tbl_category.cname,tbl_subcat.category,tbl_product.pname,tbl_product.stock,tbl_purchasechild.costprice,tbl_purchasechild.sellingprice,tbl_purchasechild.totalprice,tbl_purchasechild.quantity,tbl_purchasechild.date,tbl_supplier.supname from tbl_product,tbl_purchasechild,tbl_purchasemaster,tbl_category,tbl_subcat,tbl_supplier where tbl_purchasechild.pmasterid=tbl_purchasemaster.pmasterid and tbl_product.id=tbl_purchasechild.itemid and  tbl_purchasemaster.pmasterid='$pid' and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_category.id=tbl_subcat.catid and tbl_purchasemaster.supid=tbl_supplier.sup_id";
                $q="select tbl_category.cname,tbl_subcat.category,tbl_product.pname,tbl_product.stock,tbl_purchasechild.costprice,tbl_purchasechild.sellingprice,tbl_purchasechild.totalprice,tbl_purchasechild.quantity,tbl_purchasechild.date,tbl_supplier.supname from tbl_product,tbl_purchasechild,tbl_purchasemaster,tbl_category,tbl_subcat,tbl_supplier where tbl_purchasechild.pmasterid=tbl_purchasemaster.pmasterid and tbl_product.id=tbl_purchasechild.itemid and  tbl_purchasemaster.pmasterid='$pid' and tbl_category.id=tbl_product.cat and tbl_subcat.scid=tbl_product.scat and tbl_category.id=tbl_subcat.catid and tbl_purchasechild.supid=tbl_supplier.sup_id and tbl_purchasemaster.pstatus='purchasing'";
                $s=  mysqli_query($conn,$q);
                while($r=  mysqli_fetch_array($s))
                {
                    echo '<tr><td>'.$r['supname'].'</td>'
                    . '<td>'.$r['pname'].'</td>'
                    . '<td>'.$r['cname'].'</td>'
                    . '<td>'.$r['category'].'</td>'
                            . '<td>'.$r['costprice'].'</td>'
                            . '<td>'.$r['sellingprice'].'</td>'
                            . '<td>'.$r['quantity'].'</td>'
                            . '<td>'.$r['totalprice'].'</td>'
                            . '<td>'.$r['date'].'</td>'
                            . '</tr>';
                            
                }
                ?>
                    </table>
						
    </div>
</center>
<?php

if(isset($_REQUEST['btnNext']))
{
    $da=$_REQUEST['da'];
    $brand=$_REQUEST['brand'];
    $cat=$_REQUEST['cat'];
    $scat=$_REQUEST['scat'];
    $cp=$_REQUEST['cp'];
    $sp=$_REQUEST['sp'];
    $qty=$_REQUEST['qty'];
    $pdt=$_REQUEST['pdt'];
    $supid=$_REQUEST['supid'];
   $sq="select id from tbl_product where pname='$pdt' and cat='$cat' and scat='$scat'";
   $sv=mysqli_query($conn,$sq);
   $ru=mysqli_fetch_array($sv);
   $item=$ru[0];
    $price=$qty*$cp;



    $sql3="SELECT count(*) FROM tbl_purchasemaster WHERE staffid='$staffid' AND pstatus='Purchasing'";
    $cnt=mysqli_query($conn,$sql3);
    $count1=mysqli_fetch_array($cnt);
    $count=$count1[0];
    if($count>0)
    {
    $sql_fetch="SELECT * FROM tbl_purchasemaster WHERE staffid='$staffid' AND pstatus='Purchasing'";
      $sql_fetch_details=mysqli_query($conn,$sql_fetch);
      $sql_cmast=mysqli_fetch_assoc($sql_fetch_details);
      $pid=$sql_cmast['pmasterid'];
    
    }
    else{
        $qry = "insert into tbl_purchasemaster (staffid,pstatus) values('$staffid','purchasing')";
        //  echo $qry;
            $exe = mysqli_query($conn,$qry);
            $sql_fetch="SELECT * FROM tbl_purchasemaster WHERE staffid='$staffid' AND pstatus='Purchasing'";
      $sql_fetch_details=mysqli_query($conn,$sql_fetch);
      $sql_cmast=mysqli_fetch_assoc($sql_fetch_details);
      $pid=$sql_cmast['pmasterid'];
    }
    
    
    $q="insert into tbl_purchasechild (pmasterid,itemid,costprice,sellingprice,quantity,totalprice,supid,date) values('$pid','$pdt','$cp','$sp','$qty','$price','$supid','$da')";
    echo $q;
    $s=mysqli_query($conn,$q);
    if($s)
    {
        echo '<script>location.href="purchaseitems.php"</script>';
//    echo $q;
    }
    else {
        
        echo '<script>alert("Sorry some error occured")</script>';
        // echo '<script>location.href="purchaseitems.php"</script>';
    }
    
}
if(isset($_REQUEST['btnFinish']))
{
    $q="select max(pmasterid) from tbl_purchasemaster";
    $s=mysqli_query($conn,$q);
    $r=  mysqli_fetch_array($s);
    $pid=$r[0];
  
    $q="select * from tbl_purchasemaster where pmasterid='$pid'";
    $s=mysqli_query($conn,$q);
    $r=mysqli_fetch_array($s);
    $rr=$r[2];

    $q="select * from tbl_purchasechild where pmasterid='$pid'";
    
    $se=mysqli_query($conn,$q);
   
    while($row=mysqli_fetch_array($se))
    {
     $da=$row['date'];
    $item=$row['itemid'];
    $cp=$row['costprice'];
    $sp=$row['sellingprice'];
    $qty=$row['quantity'];
   
  
    $price=$qty*$cp;
    
        $q="select stock from tbl_product where id='$item'";
        $s=mysqli_query($conn,$q);
        $m=  mysqli_fetch_array($s);
        $stock=$m[0];
        $stock=$stock+$qty;
        $q="update tbl_product set rate='$sp',stock='$stock' where id='$item'";
        $s=mysqli_query($conn,$q);
    }

    $q="select sum(totalprice) from tbl_purchasechild where pmasterid='$pid'";
    $sa=mysqli_query($conn,$q);
    $r=  mysqli_fetch_array($sa);
    $total=$r[0];
    // echo $total;
    $q="update tbl_purchasemaster set pstatus='Purchased',totalamt='$total' where pmasterid='$pid'";
    $sx=mysqli_query($conn,$q);
    if($sx)
    {
            echo '<script>alert("Purchase completed")</script>';
            // echo '<script>location.href="staffpurchase.php"</script>';
            echo '<script>location.href="purchaseitems.php"</script>';
    }
}
?>

<?php
include '../footer.php';
?>