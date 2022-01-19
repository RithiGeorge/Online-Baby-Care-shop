<?php include 'customerbase.php';
?>

<html>
    <head>
        <title>ordercancel</title>
</head>
<body>
    <h2 style="margin-left:500px;margin-top:80px;">ADD REMARKS</h2>
    <form method="POST" style="margin-left:500px;margin-top:8px;">
<table>
    <tr><td><textarea name="rema"></textarea></td></tr>

<tr><td colspan="2" align="center"><input type="submit" name="remark" class="btn btn-success"></td></tr>
</table>
</form>
</body>
    </html>





<?php

include '../connection.php';
if(isset($_POST['remark'])){
    $cchildid=$_GET['cid'];
$aa=$_POST['rema'];
$rt="insert into tbl_remark(cchildid,remarks) values('$cchildid','$aa')";
mysqli_query($conn,$rt);




session_start();
$cid=mysqli_real_escape_string($conn,$_GET['cid']);

$sql_update_cc="UPDATE tbl_cchild SET cStatus='Cancelled, Refunded' WHERE cchildid='$cid'";
if(mysqli_query($conn,$sql_update_cc))
{
    $sql_fetch_cc="SELECT * FROM tbl_cchild WHERE cchildid='$cid'";
    $sql_exe_cc=mysqli_query($conn,$sql_fetch_cc);
    $cc=mysqli_fetch_array($sql_exe_cc);

    $cmid=$cc['cmasterid'];

    $iid=$cc['itemid'];

    $qty=$cc['qty'];

    $tp=$cc['totalprice'];

    $sql_fetch_order="SELECT * FROM tbl_order WHERE cmasterid='$cmid'";
    $sql_cart_order=mysqli_query($conn,$sql_fetch_order);
    $order=mysqli_fetch_assoc($sql_cart_order);

    $oid=$order['oid'];
    $sql_update_cm="UPDATE tbl_cmaster SET totalprice=totalprice-'$tp' WHERE orderid='$cmid'";
    $update_cm=mysqli_query($conn,$sql_update_cm);
    $sql_update_pay="UPDATE tbl_payment SET amount=amount-'$tp' WHERE orderid='$oid'";
    $update_pay=mysqli_query($conn,$sql_update_pay);
    $sql_update_item="UPDATE tbl_product SET stock=stock+'$qty' WHERE id='$iid'";
    $update_item=mysqli_query($conn,$sql_update_item);

    if($update_cm && $update_item)
    {
        $sql_fetch_cm="SELECT * FROM tbl_cmaster WHERE orderid='$cmid'";
        $sql_exe_cm=mysqli_query($conn,$sql_fetch_cm);
        $cm=mysqli_fetch_array($sql_exe_cm);

        if($cm['totalprice']==0)
        {
            $sql_updatecm="UPDATE tbl_cmaster SET status='Order Cancelled' WHERE orderid='$cmid'";
            if(mysqli_query($conn,$sql_updatecm))
            {
            $sql_fetch_order="SELECT * FROM tbl_order WHERE cmasterid='$cmid'";
            $sql_cart_order=mysqli_query($conn,$sql_fetch_order);
            $order=mysqli_fetch_assoc($sql_cart_order);

            $oid=$order['oid'];
            
            $sql_update_pay="UPDATE tbl_payment SET status='Payment Refunded', Pay_Date=NOW() WHERE orderid='$oid'";
            if(mysqli_query($conn,$sql_update_pay))
            {
                header('Location: Orders.php');
                $_SESSION['status']="Cancelled";
            }

            else
            {
                header('Location: Orders.php');
                $_SESSION['status']="NoCancel";
            }
        }
        else
            {
                header('Location: Orders.php');
                $_SESSION['status']="Cancelled";
            }
        }

        else
            {
                header('Location: Orders.php');
                $_SESSION['status']="Cancelled";
            }
    }

    else
            {
                header('Location: Orders.php');
                $_SESSION['status']="NoCancel";
            }

}

else
    {
        header('Location: Orders.php');
        $_SESSION['status']="NoCancel";
    }
}
    mysqli_close($conn);
    ?>