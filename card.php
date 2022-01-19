<?php
include 'customerbase.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>update3</title>
    <style>
    
        td,th{
            padding:15px;
        }
        </style>
</head>
<body>
    <br>
<h2 style="margin-left:535px;">ADD CARD DETAILS</h2>
<div style="margin-left:390px;border:5px solid maroon;border-radius:20px;width:500px;">
    <div>
        <br>

<form method="post" action='cardin.php' >

<?php
    include '../connection.php';
    session_start();
    $userid=$_SESSION['id'];
 
    $sql="select * from tbl_customer where id='$userid'";
    $run=mysqli_query($conn,$sql);
   
    $row=mysqli_fetch_array($run);



    ?>
    
<table style="margin-left:60px;">

      
   <!-- <tr><td> ID       :</td><td><input type="text" name="a" value="<?php echo $row['id']; ?>" readonly></td></tr> -->
    <tr><td>Card No     :</td><td><input type="text" name="b" class="form-control" maxlength="16"  ></td></tr>
    <tr><td>Card Name     :</td><td><input type="text" name="c" class="form-control" ></td></tr>
   
    <tr><td>Card Type		 :</td><td><input type="text" name="d" class="form-control" ></td></tr>
    <tr><td> Expiry Date     :</td><td><input type="date" name="e" class="form-control" ></td></tr>
   

    
    
    <tr><td colspan="2" align="center"><input type="submit" class="btn btn-danger" value="ADD"></td></tr>
 </table>
    </div></div>

</form>
</body>
</html>