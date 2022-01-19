
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_staff set status='1' where sid='" . $id . "'");
if ($qry) {
    echo'<script>alert("Unblocked............")</script>';
    echo '<script>location.href="adminviewstaff.php"</script>';
}

?>