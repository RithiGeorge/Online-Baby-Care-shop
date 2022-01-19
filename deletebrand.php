
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_brand set status='0' where bid='" . $id . "'");
if ($qry) {
    echo'<script>alert("Inactivated............")</script>';
    echo '<script>location.href="addbrand.php"</script>';
}