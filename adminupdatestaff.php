<?php
include 'adminbase.php';
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
<div style="margin: 30px;margin-left:390px;">
    <div style="width: 600px;border: 5px solid maroon;color: black;border-radius:30px;">
        <br>
<h2 style="text-align:center">UPDATE PROFILE</h2>
<form method="post">

<?php
    include '../connection.php';
    session_start();
    $userid=$_GET['id'];
 
    $sql="select * from tbl_staff where sid='$userid'";
    $run=mysqli_query($conn,$sql);
   
    $row=mysqli_fetch_array($run);



    ?>
<table style="margin-left:80px;border-radius:20px;width:500px;">

      
   <tr><td> ID       :</td><td><input type="text" class="form-control" name="a" value="<?php echo $row['sid']; ?>" readonly></td></tr>
    <tr><td>FIRST NAME     :</td><td><input type="text" class="form-control" name="b" value="<?php echo $row['fname'];?>"></td></tr>
    <tr><td>LAST NAME     :</td><td><input type="text" class="form-control" name="c" value="<?php echo $row['lname'];?>"></td></tr>
   
    <tr><td>PHONE		 :</td><td><input type="text" class="form-control" name="d" value="<?php echo $row['phone'];?>"></td></tr>
    <tr><td>HOUSE NUMBER     :</td><td><input type="text" class="form-control" name="e" value="<?php echo $row['houseno'];?>"></td></tr>
    <tr><td>CITY     :</td><td><input type="text" class="form-control" name="f" value="<?php echo $row['street'];?>"></td></tr>
    <tr><td>DISTRICT     :</td><td><input type="text" class="form-control" name="g" value="<?php echo $row['district'];?>"></td></tr>
    <tr><td> PINCODE    :</td><td><input type="text" class="form-control" name="h" value="<?php echo $row['pincode']; ?>" ></td></tr>
    <!-- <tr><td> STATE    :</td><td><input type="text" name="i" value="<?php echo $row['state']; ?>" ></td></tr> -->
    <tr><td> EMAIL    :</td><td><input type="text" class="form-control" name="j" value="<?php echo $row['email']; ?>" readonly></td></tr>
   

    
    
    <tr><td colspan="2" align="center"><input type="submit" name="upload3" class="btn btn-success" value="Update"></td></tr>
 </table>
    </div></div>

<?php
 include '../connection.php';

 $userid=$_GET['id'];

if(isset($_POST['upload3']))
{
	$a=$_POST['a'];
	$b=$_POST['b'];
	
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
    $f=$_POST['f'];
    $g=$_POST['g'];
    $h=$_POST['h'];
   
    $j=$_POST['j'];

	
	
    // $l=$_FILES['pho']['name'];
    //  move_uploaded_file($_FILES['pho']['tmp_name'],"images/".$_FILES['pho']['name']);
	$sql="update tbl_staff set sid='$a',fname='$b',lname='$c',phone='$d',houseno='$e',street='$f',district='$g',pincode='$h',email='$j' where sid='$userid' ";
	$a=mysqli_query($conn,$sql);
    if($a){
    echo '<script>alert("Updated")</script>';
	header('location:adminviewstaff.php');
}
}
?>
</form>
</body>
</html>