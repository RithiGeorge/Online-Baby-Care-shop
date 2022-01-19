<?php
include 'adminbase.php';
?>
<style>
th{
    background-color:#900C3F ;
    color:white;
}
th,td{
    padding:10px;
    text-align:center;
}
    </style>


<BR><BR><BR>
<h1 style="text-align:center">CUSTOMERS</h1>
<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_customer where status='1'");
    if(mysqli_fetch_array($qry) > 0){
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
<th>ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_customer where status='1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['fname'] . ' ' . $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['housename'] . '</td><td>' . $row['city'] . '</td><td>' . $row['district'] . '</td><td>' . $row['pincode'] . '</td><td>' . $row['email'] . '</td><td><a href="deletecustomer.php?id=' . $row['id'] . '" class="btn btn-success">InActive</a></td></tr>';
    }
    } else {
        ?>

   <h1>No Active Users</h1>
        
        <?php
    }
    ?>

</table>

<br><br>


<?php
    include '../connection.php';
    $qry = mysqli_query($conn,"select * from tbl_customer where status='-1'");
    if (mysqli_fetch_array($qry) > 0) {
    ?>
    <h1 style="text-align:center">Blocked Customers</h1>
<table border='5' align="center" cellspacing="5" id="customers">
    <th> ID    </th>
    <th> NAME    </th>
   
    <th> PHONE </th>
    <th> HOUSENO </th>
    <th> STREET </th>
    <th> DISTRICT </th>
    <th> PINCODE </th>
    <th> EMAIL </th>
<th>ACTION</th>

<?php


    $qry = mysqli_query($conn,"select * from tbl_customer where status='-1'");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['fname'] . ' ' . $row['lname'] . '</td><td>' . $row['phone'] . '</td><td>' . $row['housename'] . '</td><td>' . $row['city'] . '</td><td>' . $row['district'] . '</td><td>' . $row['pincode'] . '</td><td>' . $row['email'] . '</td><td><a href="unblockcustomer.php?id=' . $row['id'] . '" class="btn btn-success">Active</a></td></tr>';
    }
    } else {
        ?>

      
        
        <?php
    }
    ?>

</table>


<?php
include '../footer.php';
?>