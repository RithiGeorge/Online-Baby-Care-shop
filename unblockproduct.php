<?php

include '../connection.php';
$id = $_GET['id'];
echo $id;
$qry = mysqli_query($conn,"update tbl_product set status='1' where id='$id'");
if ($qry) {
    echo'<script>alert("Activated............")</script>';
    echo '<script>location.href="staffviewproduct.php"</script>';
}

?>