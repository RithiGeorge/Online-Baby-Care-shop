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
    <div style="width: 600px;background-color: rgb(66, 143, 117);border-radius: 30px;color: black;">
        <br>
<h2 style="text-align:center">UPDATE BRAND</h2>
<form method="post">

<?php
    include '../connection.php';
    session_start();
    $bid=$_GET['id'];
 
    $sql="select * from tbl_brand where bid='$bid'";
    $run=mysqli_query($conn,$sql);
   
    $row=mysqli_fetch_array($run);



    ?>
<table style="margin-left:40px;border:10px double gray;border-radius:20px;width:500px;">

      
   <tr><td> ID       :</td><td><input type="text" name="a" value="<?php echo $row['bid']; ?>" readonly></td></tr>
    <tr><td>BRAND NAME     :</td><td><input type="text" name="b" value="<?php echo $row['brand'];?>"></td></tr>
   
    
    
    <tr><td colspan="2" align="center"><input type="submit" name="upload3" value="Update"></td></tr>
 </table>
    </div></div>

<?php
 include '../connection.php';

 $bid=$_GET['id'];

if(isset($_POST['upload3']))
{
	$a=$_POST['a'];
	$b=$_POST['b'];
	

    // $l=$_FILES['pho']['name'];
    //  move_uploaded_file($_FILES['pho']['tmp_name'],"images/".$_FILES['pho']['name']);
	$sql="update tbl_brand set bid='$a',brand='$b' where bid='$bid' ";
	$a=mysqli_query($conn,$sql);
    if($a){
    echo '<script>alert("Updated")</script>';
	header('location:addbrand.php');
}
}
?>
</form>
</body>
</html>