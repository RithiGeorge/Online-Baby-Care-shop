
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_subcat set status='0' where scid='" . $id . "'");
if ($qry) {
    echo'<script>alert("Inactivated............")</script>';
    echo '<script>location.href="AddSubCat.php"</script>';
}