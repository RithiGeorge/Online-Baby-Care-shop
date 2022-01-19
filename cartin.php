<?php
include '../connection.php';
session_start();
$custid=$_SESSION['id'];
// echo $custid;
$itemid= $tp= $ta= $qty= $price= $val= $subcatid="";
function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $itemid=test_input($_POST["a"]);
    $qty=test_input($_POST["qty"]);
//  echo $qty;
    $price=test_input($_POST["d"]);
    $val=test_input($_POST["val"]);
    $subcatid=test_input($_POST["subcatid"]);
  
  $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$itemid'";
  $sql_item_details=mysqli_query($conn,$sql_fetch_item);
  $sql_item=mysqli_fetch_assoc($sql_item_details);
    $cart=0;
    $sql_cchild=0;
    // $subcatid=$sql_item['scat'];
  $tp=$price*$qty;

 
// if(!empty($_SESSION['user_type']))
// {
//   if($_SESSION['user_type']=='customer')
// {


  $sql_fetch="SELECT * FROM tbl_cmaster WHERE custid='$custid' AND status='Order Pending'";
  $sql_fetch_details=mysqli_query($conn,$sql_fetch);
  $sql_cmast=mysqli_fetch_assoc($sql_fetch_details);
  $cmastid=$cart['orderid'];
  $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$itemid'";
  $sql_item_details=mysqli_query($conn,$sql_fetch_item);
  $sql_item=mysqli_fetch_assoc($sql_item_details);
    $cart=0;
    $sql_cchild=0;
 if(empty($sql_cmast))
{

  $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$itemid'";
  $sql_item_details=mysqli_query($conn,$sql_fetch_item);
  $sql_item=mysqli_fetch_assoc($sql_item_details);
    $cart=0;
    $sql_cchild=0;
    // $y="select SUM(totalprice) from tbl_cchild where cmasterid='$orderid' AND cstatus='Order Pending'";
    // $rr=mysqli_query($conn,$y);
    // $rt=mysqli_fetch_array($rr);
    // $rtt=$rt[0];
    // $p=$sql_item['rate'];
    // $qty=1;
    $date=date("Y/m/d") ;
  if($sql_item['stock']>=$qty)
    {
    $custid=$_SESSION['id'];
    $sql_insert_cmast="INSERT INTO tbl_cmaster (custid,totalprice,status) VALUES ('$custid','$tp','Order Pending')";
    mysqli_query($conn,$sql_insert_cmast);
 
    $sql_fetch_cart="SELECT * FROM tbl_cmaster WHERE custid='$custid' AND status='Order Pending'";
    $sql_cart_details=mysqli_query($conn,$sql_fetch_cart);
   
    $cart=mysqli_fetch_assoc($sql_cart_details);
    
    $cmastid=$cart['orderid'];
    $y="select SUM(totalprice) from tbl_cchild where cmasterid='$cmastid' AND cstatus='Order Pending'";
    $rr=mysqli_query($conn,$y);
    $rt=mysqli_fetch_array($rr);
    $rtt=$rt[0];

    // if($cart!=0)
    // {
        // $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$itemid'";
        // $sql_item_details=mysqli_query($conn,$sql_fetch_item);
        // $sql_item=mysqli_fetch_assoc($sql_item_details);
        //   $cart=0;
        //   $sql_cchild=0;
        // //   $subcatid=$sql_item['scat'];
        //   $p=$sql_item['rate'];
        //   $qty=1;
          $odate=date('y/m/d');
        $sql_insert_cchild="INSERT INTO tbl_cchild (cmasterid, itemid, qty, totalprice, odate,custid,cstatus) VALUES ('$cmastid','$itemid','$qty', '$tp','$odate', '$custid','Order Pending')";
    //    echo  $sql_insert_cchild;
        $sql_cchild=mysqli_query($conn,$sql_insert_cchild);
        echo '<script>alert(" Added to cart ....");</script>';
    }
    else{
        echo '<script>alert(" No stock ....");</script>';
    }
}
else{
    if($sql_item['stock']>=$qty)
    {
    $sql_fetch="SELECT * FROM tbl_cmaster WHERE custid='$custid' AND status='Order Pending'";
    $sql_fetch_details=mysqli_query($conn,$sql_fetch);
    $sql_cmast=mysqli_fetch_assoc($sql_fetch_details);
    $cmastid=$sql_cmast['orderid'];
    $odate=date('y/m/d');
   $we="select * from tbl_cchild where itemid='$itemid' and cmasterid='$cmastid' AND cstatus='Order Pending' ";
   $ry=mysqli_query($conn,$we);
   $zx=mysqli_fetch_array($ry);
   if($zx[0]==0)
   {

    $sql_insert_cchild="INSERT INTO tbl_cchild (cmasterid, itemid, qty, totalprice, odate,custid,cstatus) VALUES ('$cmastid','$itemid','$qty', '$tp','$odate', '$custid','Order Pending')";
//    echo  $sql_insert_cchild;
    $sql_cchild=mysqli_query($conn,$sql_insert_cchild);
    $y="select SUM(totalprice) from tbl_cchild where cmasterid='$cmastid' AND cstatus='Order Pending'";
    $rr=mysqli_query($conn,$y);
    $rt=mysqli_fetch_array($rr);
    $rtt=$rt[0];
    $sql_update_cm="UPDATE tbl_cmaster SET totalprice='$rtt' WHERE orderid='$cmastid' AND status='Order Pending'";
    $sql_cm=mysqli_query($conn,$sql_update_cm);
    echo '<script>alert(" Added to cart ....");</script>';
   }
   else{
    //    $df="update tbl_cchild set qty='$qty' and totalprice='$tp' where itemid='$itemid' and cmasterid='$cmastid' AND cstatus='Order Pending'";
    //    echo $df;
    //    $ro=mysqli_query($conn,$df);
    $sql_update_cc="UPDATE tbl_cchild SET totalprice='$tp', qty='$qty' WHERE cmasterid='$cmastid' AND itemid='$itemid'";
    $sql_cchild=mysqli_query($conn,$sql_update_cc);
       $y="select SUM(totalprice) from tbl_cchild where cmasterid='$cmastid' AND cstatus='Order Pending'";
    $rr=mysqli_query($conn,$y);
    $rt=mysqli_fetch_array($rr);
    $rtt=$rt[0];
    $sql_update_cm="UPDATE tbl_cmaster SET totalprice='$rtt' WHERE orderid='$cmastid' AND status='Order Pending'";
    $sql_cm=mysqli_query($conn,$sql_update_cm);
    echo '<script>alert(" Added to cart ....");</script>';
   }
    }
else{
    echo '<script>alert(" No stock ....");</script>';
}
}
// }

    if($val==0)
    {
        
        
            if($sql_cchild!=0)
            {
                header("refresh:0; url=Cart.php?pid=".$subcatid);
                $_SESSION['status']="Add";
                exit;
            }

            else
            {
                header("refresh:0; url=Cart.php?pid=".$subcatid);
            $_SESSION['status']="Noadd";
            exit;
            }
    }

    else if($val==1)
    {
        if($sql_cchild!=0)
        {
            header("refresh:0; url=ItemDetails.php?user_id=".$itemid);
            $_SESSION['status']="Add";
            exit;
        }

        else
        {
            header("refresh:0; url=ItemDetails.php?user_id=".$itemid);
        $_SESSION['status']="Noadd";
        exit;
        }
    }

    else if($val==2)
    {
        if($sql_cchild!=0)
        {
            header("refresh:0; url=Order.php?user_id=".$cmastid);
            $_SESSION['status']="Add";
            exit;
        }

        else
        {
            header("refresh:0; url=Order.php?user_id=".$cmastid);
        $_SESSION['status']="Noadd";
        exit;
        }
    }
    
  



  else if($sql_cmast['status']=='Order Pending')
  {

   
    
    $ta=$sql_cmast['totalprice']+$tp;
    
    $cmastid=$sql_cmast['orderid'];

    $sql_cc="SELECT * FROM tbl_cchild WHERE cmasterid='$cmastid' AND itemid='$itemid'";
    $sql_cc_details=mysqli_query($conn,$sql_cc);
    $sql_cc=mysqli_fetch_assoc($sql_cc_details);

    if($sql_cc)
    {
    $tp=$sql_cc['totalprice']+$tp;
    $qty=$sql_cc['qty']+$qty;
    }

    $sql_fetch_item="SELECT * FROM tbl_product WHERE id='$itemid'";
    $sql_item_details=mysqli_query($conn,$sql_fetch_item);
    $sql_item=mysqli_fetch_assoc($sql_item_details);
    $cmast=0;
    $sql_cchild=0;
    if($sql_item['stock']>=$qty)
    {

        $sql_update_cmast="UPDATE tbl_cmaster SET totalprice='$ta' WHERE orderid='$cmastid' AND status='Order Pending'";
    $cmast=mysqli_query($conn,$sql_update_cmast);
    }

    if($cmast!=0)
    {

        if($sql_cc)
        {

            $sql_update_cc="UPDATE tbl_cchild SET totalprice='$tp', qty='$qty' WHERE cmasterid='$cmastid' AND itemid='$itemid'";
            $sql_cchild=mysqli_query($conn,$sql_update_cc);
            
        }

        else
        {
            
            $odate=date('y/m/d');
            $sql_insert_cchild="INSERT INTO tbl_cchild (cmasterid, itemid, qty, totalprice,odate,custid,cstatus) VALUES ('$cmastid','$itemid','$qty', '$tp','$odate','$custid', 'Order Pending')";
            $sql_cchild=mysqli_query($conn,$sql_insert_cchild);
        }
    }
  }
}
    // if($val==0)
    // {
        

    //         if($sql_cchild!=0)
    //         {
    //             header("refresh:0; url=viewitems.php?subid=".$subcatid);
    //             $_SESSION['status']="Add";
    //             exit;
    //         }

    //         else
    //         {
    //             header("refresh:0; url=viewitems.php?subid=".$subcatid);
    //         $_SESSION['status']="Noadd";
    //         exit;
    //         }
    // }

    // else if($val==1)
    // {
    //     if($sql_cchild!=0)
    //     {
    //         header("refresh:0; url=ItemDetails.php?user_id=".$itemid);
    //         $_SESSION['status']="Add";
    //         exit;
    //     }

    //     else
    //     {
    //         header("refresh:0; url=ItemDetails.php?user_id=".$itemid);
    //     $_SESSION['status']="Noadd";
    //     exit;
    //     }
    // }

    // else if($val==2)
    // {
    //     if($sql_cchild!=0)
    //     {
    //         header("refresh:0; url=Order.php?user_id=".$cmastid);
    //         $_SESSION['status']="Add";
    //         exit;
    //     }

    //     else
    //     {
    //         header("refresh:0; url=Order.php?user_id=".$cmastid);
    //     $_SESSION['status']="Noadd";
    //     exit;
    //     }
    // }

//   }
// }
// else
// {
//     header("refresh:0; url=vieworderdetails.php");
//     $_SESSION['status']="Nocart";
// }
// }
// }
// }
//   }
// else
// {
//     header("refresh:0; url=vieworderdetails.php");
//     $_SESSION['status']="Nocart";
// }
    mysqli_close($conn);
?>