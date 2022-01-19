
<?php

include '../connection.php';
$id = $_GET['id'];
$qry = mysqli_query($conn,"update tbl_customer set status='-1' where id='" . $id . "'");
if ($qry) {
    echo'<script>alert("Blocked............")</script>';
    echo '<script>location.href="adminviewcustomer.php"</script>';
}

?>