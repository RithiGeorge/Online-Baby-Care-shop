
<?php

include 'customerbase.php';
?>
<style>
    th{

        background-color:lightcoral;
        padding:10px;
        width:1  30px;

    }



</style>
</style>
<br><br>
<form method="POST">
    <table align="center">


        <tr><td> Fedback</td><td><textarea name="feedback" required class="form-control"></textarea></td></tr>

        <tr><td><input type="submit" name="submit" value="ADD" class="btn btn-success" align="center"></td></tr>

    </table></form>
<?php

session_start();
$custid = $_SESSION['id'];
include '../connection.php';
if (isset($_POST['submit'])) {
    $feedback = $_POST['feedback'];

    $check = mysqli_query($conn,"select count(*) as count from tbl_feedback where custid='$custid'");
    $fetch = mysqli_fetch_array($check);
    if ($fetch['count'] > 0) {
        echo '<script> alert("Already Added")</script>';
    } else {

        $qry = "insert into tbl_feedback(custid,feedback) values('$custid','$feedback')";

        $exe = mysqli_query($conn,$qry);
        if ($qry) {

            echo '<script>alert("successfull")</script>';
        } else {
            echo '<script>alert("Un Successfull")</script>';
        }
    }
}
?>


<?php
include '../footer.php';
?>