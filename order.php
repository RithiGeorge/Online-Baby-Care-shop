<?php
include '../connection.php';
include 'customerbase.php';
?>

<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;background-color: rgb(66, 143, 117);border-radius: 30px;color: white;">
        <br>
<form method="POST">

    <table align="center">
        <tr><td>quantity</td><td><input type="text" name="qty" required class="form-control"></td></tr>

      
        <tr><td colspan="2" align="center"><input type="submit" name="submit" value="ORDER" class="btn btn-success" align="center"></td></tr>

    </table></form>
    <br>
</div></div>
<?php
session_start();
include '../connection.php';
if (isset($_POST['submit'])) {
    $custid = $_SESSION['id'];
    $productid = $_GET['id'];
    $orderid = $_GET['orderid'];
    $date = $_GET['date'];
    $ratee = $_GET['rate'];
    $qty = $_POST['qty'];
    $op="select stock from tbl_product where id='$productid'";
    $op1 = mysqli_query($conn,$op);
    $op2=mysqli_fetch_array($op1);
   $op3=$op2[0];
    $totalprice = $ratee * $qty;
  
    $odate = date('y/m/d');
    if($op3>=$qty)
    {
        $qry = "insert into tbl_order(productid,custid,qty,totalprice,odate,status) values('$productid','$custid','$qty','$totalprice','$date','ordered')";
        $exe = mysqli_query($conn,$qry);
        $qry1 = "insert into tbl_cchild(cmasterid,itemid,qty,totalprice,date,custid) values('$orderid','$productid','$qty','$totalprice','$date','$custid')";
    
        $exe1 = mysqli_query($conn,$qry1);

        // $quy=mysqli_query("select * from tbl_product where id='$productid'");
        // $data1=mysqli_fetch_array($quy);
        // $data=$data1['stock'];
        // $rem=$data-$qty;
        // $qqq="update tbl_product set stock='$rem' where id='$productid'";
        // $exe = mysqli_query($qqq);

        $y="select SUM(totalprice) from tbl_cchild where cmasterid='$orderid'";
$rr=mysqli_query($conn,$y);
$rt=mysqli_fetch_array($rr);
$rtt=$rt[0];

$qqq="update tbl_cmaster set totalprice='$rtt' where orderid='$orderid'";
$qee=mysqli_query($conn,$qqq);  

        if ($exe) {
            echo '<script> alert("Order Successfull")</script>';
            echo '<script>location.href="itemgrid.php?bmid='.$orderid.'&date='.$date.'"</script>';
        }
    }
else{
    echo '<script> alert("No sufficient Stock")</script>';
}
}
?>

<?php
include '../footer.php';
?>
