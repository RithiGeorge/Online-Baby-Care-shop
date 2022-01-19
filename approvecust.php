<?php
include 'adminbase.php';
?>



<BR><BR><BR>
<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_customer where status='0'");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
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


    $qry = mysqli_query($conn,"select * from tbl_customer where status='0'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['fname'] . ' ' . $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['housename'] . '</td><td>' . $row['city'] . '</td><td>' . $row['district'] . '</td><td>' . $row['pincode'] . '</td><td>' . $row['email'] . '</td><td><a href="approvec.php?id=' . $row['id'] . '" class="btn btn-success">APPROVE</a></td><td><a href="deletecustomer.php?id=' . $row['id'] . '" class="btn btn-success">Delete</a></td></tr>';
    }
    } else {
        ?>
        <h1>There is no data available at this moment</h1>

        <!-- <img src="../images/no_data_found.png" width="30%" height="30%" >
         -->
        <?php
    }
    ?>

</table>


<?php
include '../footer.php';
?>