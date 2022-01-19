
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_category set status='0' where id='" . $id . "'");
if ($qry) {
    echo'<script>alert("Deleted............")</script>';
    echo '<script>location.href="cat.php"</script>';
}