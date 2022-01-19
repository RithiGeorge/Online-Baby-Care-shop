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
<h2 style="text-align:center">UPDATE PROFILE</h2>
<div style="">
<div style="margin-left:390px;border:5px solid maroon;border-radius:20px;width:500px;">
        <br>

<form method="post">

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
    <tr><td >FIRST NAME     :</td><td><input type="text" name="b" class="form-control" value="<?php echo $row['fname'];?>"></td></tr>
    <tr><td>LAST NAME     :</td><td><input type="text" name="c" class="form-control" value="<?php echo $row['lname'];?>"></td></tr>
   
    <tr><td>PHONE		 :</td><td><input type="text" name="d" class="form-control" value="<?php echo $row['phone'];?>"></td></tr>
    <tr><td>HOUSE NAME     :</td><td><input type="text" name="e" class="form-control"value="<?php echo $row['housename'];?>"></td></tr>
    <tr><td>CITY     :</td><td><input type="text" name="f" class="form-control" value="<?php echo $row['city'];?>"></td></tr>
    <tr><td>DISTRICT     :</td><td><input type="text" name="g" class="form-control" value="<?php echo $row['district'];?>"></td></tr>
    <tr><td> PINCODE    :</td><td><input type="text" name="h" class="form-control" value="<?php echo $row['pincode']; ?>" ></td></tr>
 
    <tr><td> EMAIL    :</td><td><input type="text" name="j" class="form-control" value="<?php echo $row['email']; ?>" readonly></td></tr>
   

    
    
    <tr><td colspan="2" align="center"><input type="submit" name="upload3" class="btn btn-success" value="Update"></td></tr>
 </table>
    </div></div>

<?php
 include '../connection.php';

 $userid=$_SESSION['id'];

if(isset($_POST['upload3']))
{
	// $a=$_POST['a'];
	$b=$_POST['b'];
	
	$c=$_POST['c'];
	$d=$_POST['d'];
	$e=$_POST['e'];
    $f=$_POST['f'];
    $g=$_POST['g'];
    $h=$_POST['h'];
    // $i=$_POST['i'];
    $j=$_POST['j'];

	
	
    // $l=$_FILES['pho']['name'];
    //  move_uploaded_file($_FILES['pho']['tmp_name'],"images/".$_FILES['pho']['name']);
	$sql="update tbl_customer set fname='$b',lname='$c',phone='$d',housename='$e',city='$f',district='$g',pincode='$h',email='$j' where id='$userid' ";
	$a=mysqli_query($conn,$sql);
    if($a){
    echo '<script>alert("Updated")</script>';
	header('location:profile.php');
}
}
?>
</form>
</body>
</html>