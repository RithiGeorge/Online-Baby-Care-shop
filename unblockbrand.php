
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_brand set status='1' where bid='" . $id . "'");
if ($qry) {
    echo'<script>alert("Activated............")</script>';
    echo '<script>location.href="addbrand.php"</script>';
}