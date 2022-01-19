<?php
include 'adminbase.php';
?>


<br><br>

<table border='3' align="center" id="customers">
    <th> FEEDBACK ID</th>
    <th> CUSTOMER </th>
    <th> FEEDBACK </th>
    <?php
    include '../connection.php';
    $qry = mysqli_query($conn,"SELECT tbl_feedback.id,tbl_customer.fname,tbl_customer.lname,tbl_feedback.feedback from tbl_customer,tbl_feedback where tbl_feedback.custid=tbl_customer.id");
    while ($row = mysqli_fetch_array($qry)) {
        echo '<tr><td>' . $row['id'] . '</td><td>' . $row['fname'] .' '. $row['lname'] . '</td><td>' . $row['feedback'] . '</td></tr>';
    }
    ?>

</table>

<?php
include '../footer.php';
?>