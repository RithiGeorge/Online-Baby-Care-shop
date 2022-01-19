
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_supplier set supstatus='1' where sup_id='" . $id . "'");
if ($qry) {
    echo'<script>alert("Activated............")</script>';
    echo '<script>location.href="addsupplier.php"</script>';
}