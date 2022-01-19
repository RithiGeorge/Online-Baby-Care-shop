<?php

include '../connection.php';              
    session_start();
    $userid=$_SESSION['id'];            
if (isset($_POST['submit'])){
    $sql = "select COUNT(*) AS count_item FROM tbl_order WHERE custid = '$userid'";
            $t=mysqli_query($conn,$sql);
            $q=mysqli_fetch_array($t);
            $qq=$q[0];
            echo $qq;
            $r="insert into tbl_master(custid,status) values('$userid','inserted')";
            $rr=mysqli_query($conn,$r);
            echo $rr;
            if($rr>0){
            $o="select MAX(orderid) AS orderid from tbl_cmaster;";
            $oo=mysqli_query($conn,$o);
            $ooo=mysqli_fetch_array($oo);
            $ou=$ooo[0];
            echo $ou;
            $ct=$_POST['cout'];
            echo "<br>";
            echo $ct;
            while($ct>0){
            $qa="insert into tbl_cchild(itemid,qty,totalprice,date,custid) select distinct productid,qty,totalprice,odate,userid from tbl_order where userid='$userid'";
            $qa1=mysqli_query($conn,$qa);
            $ct-=2;
            }
             $y="update tbl_cchild set cmasterid='$ou' where custid='$userid'";
             $yy=mysqli_query($conn,$y);
   if($yy){
     
       echo '<script>location.href="pay.php?orderid='.$ou.'"</script>';
   }  






//    else
//    {
//     echo '<script>location.href="myorders.php"</script>';
//    }
}
}
?>



