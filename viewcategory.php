<?php
include 'customerbase.php';
include '../connection.php';
?>


<style>
      H1{
        font-size:xx-large;
        color: rgb(13, 13, 14);
        text-align: center;
        margin-top: 70px;
      }
      form{
        color: black;
        text-align: center;
      }
      #demo{
        margin-top: 20px;
        margin-bottom: 350px;
        border:30px solid gray;
        background-color: aliceblue;
        width:1000px;
        height:260px;
        margin-left: 200px;
        border-radius: 20px;
      }
    </style>
  </H1>
    <!-- <body style="background-image: url('../static/images/type.jpg')"> -->
    <body>
    <br>
    <form method='POST'> 
    <div id="demo">
    <?php
    // $id=$_GET['cat'];
    $masterid=$_GET['bmid'];
    $date=$_GET['date'];
    $a="select * from tbl_category where status='1'";
    $r=mysqli_query($conn,$a);
    while($row=mysqli_fetch_array($r))
    {
 

  echo'<a href="viewsubcategory.php?cat='.$row['id']. '&bmid='.$masterid.'&date='.$date.'"  class="btn btn-success" style="width: 200px;height:60px;margin-top: 60px;font-size: 30px;text-align: center;">' .$row['cname'].'</a>';
   
    // <!-- <a href="viewitems.php" class="btn btn-success" style="width: 300px;height:60px;margin-top: 60px;font-size: 30px;text-align: center;">GARDEN</a> -->


    }
    ?>
      </div>
<?php
include '../footer.php';
?>
