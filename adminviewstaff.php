<?php
include 'adminbase.php';
?>
<style>
th{
    background-color:#900C3F;
    color:white;
}
th,td{
    padding:10px;
    text-align:center;
}
    </style>


<BR><BR><BR>

<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_staff where status='1'");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
     <h1 style="text-align:center"> STAFF</h1>
<table border='5' align="center" cellspacing="5" id="customers">
    <th> ID    </th>
    <th> NAME    </th>
   
    <th> PHONE </th>
    <th> HOUSENO </th>
    <th> STREET </th>
    <th> DISTRICT </th>
    <th> PINCODE </th>
    <th> EMAIL </th>
<th colspan="2">ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_staff where status='1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['sid'] . '</td><td>' . $row['fname'] . ' ' . $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['houseno'] . '</td><td>' . $row['street'] . '</td><td>' . $row['district'] . '</td><td>' . $row['pincode'] . '</td><td>' . $row['email'] . '</td><td><a href="adminupdatestaff.php?id=' . $row['sid'] . '" class="btn btn-success">UPDATE</a></td><td><a href="deletestaff.php?id=' . $row['sid'] . '" class="btn btn-success">BLOCK</a></td></tr>';
    }
    } else {
        ?>

        <!-- <img src="../images/no_data_found.png" width="30%" height="30%" > -->
        
        <?php
    }
    ?>

</table>
<br>

<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_staff where status='-1'");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
<h1 style="text-align:center">Blocked Staff</h1>
<table border='5' align="center" cellspacing="5" id="customers">
    <th> ID    </th>
    <th> NAME    </th>
   
    <th> PHONE </th>
    <th> HOUSENO </th>
    <th> STREET </th>
    <th> DISTRICT </th>
    <th> PINCODE </th>
    <th> EMAIL </th>
<th colspan="2">ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_staff where status='-1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['sid'] . '</td><td>' . $row['fname'] . ' ' . $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['houseno'] . '</td><td>' . $row['street'] . '</td><td>' . $row['district'] . '</td><td>' . $row['pincode'] . '</td><td>' . $row['email'] . '</td><td><a href="adminupdatestaff.php?id=' . $row['sid'] . '" class="btn btn-success">UPDATE</a></td><td><a href="unblockstaff.php?id=' . $row['sid'] . '" class="btn btn-success">UNBLOCK</a></td></tr>';
    }
}
    ?>

</table>

<?php
include '../footer.php';
?>