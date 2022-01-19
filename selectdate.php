<?php
include 'customerbase.php';
include '../connection.php';
?>


<style>
      H1{
        font-size:xx-large;
        color: rgb(13, 13, 14);
        text-align: center;
        margin-top: 7px;
      }
      form{
        color: black;
        text-align: center;
      }
      #demo{
        margin-top: 2px;
        margin-bottom: 350px;
        /* border:30px solid olive; */
        background-color: #CCEEFF;
        width:1100px;
        height:340px;
        margin-left: 150px;
        border-radius: 20px;
      }
    </style>
  </H1>
    <!-- <body style="background-image: url('../static/images/type.jpg')"> -->
    <body>
    <br>
    <form method='POST'> 
    <div id="demo">
      <div>
        <br><br>
        <h1>Select Required Date</h1>
    <form method="POST" enctype="multipart/form-data">
    <table style="margin-left:340px;margin-top:10px;">
        <tr>
            <td>Enter the Required Date</td>
            <td><input type="date" class="form-control" id="datepicker"  name="sdate" required="" min="<?php echo date('Y-m-d'); ?>"></td>
        </tr>
        <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
        <tr>
        
            <td colspan="2" align="center"><input type="submit" onclick="checkdate()" class="btn btn-success" name="btnSubmit" ></td>
        </tr>
    </table>
    </form>
    <p id="demo"></p>
    <script type="text/javascript">
        function checkdate(){
            var selecteddate=document.getElementById('datepicker').value;
            // alert(selecteddate);
            // var now=new Date();
            // var now=format(new Date(), 'yyyy-MM-dd');
            // var dd=now.setDate(now.getDate() + 2);
            var dt1=Date.parse(selecteddate);


            var today = new Date();
          
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

var now = yyyy + '-' + mm + '-' + dd;
// alert(now);
// var tomow=today.setDate(today.getDate() + 2);
// alert(tomow);
         
            var dt2=Date.parse(now);
            var dt3=dt2+2;
            // var dt3=now.setDate(now.getDate() + 2);
            // alert(dt3);
            // var dt4=dt2.setDate(dt2.getDate() + 2);
            // alert(dt4);
            if(dt2==dt1){
                alert("Please select a date after one day")
                document.getElementById('datepicker').value=""
            
            }
            // else{
            //   alert("Please select date after two days noooo")
            // }
        }
        </script>
    </div>
      </div>

      <?php
      session_start();
      $custid = $_SESSION['id'];
if(isset($_REQUEST['btnSubmit']))
{
    $sdate=$_REQUEST['sdate'];
    $q="insert into tbl_cmaster (custid,status) values('$custid','added')";
        $s= mysqli_query($conn,$q);
        if($s)  
        {
            $o="select MAX(orderid) AS bmid from tbl_cmaster";
            $oo=mysqli_query($conn,$o);  
            
            $ooo=mysqli_fetch_array($oo);
            $ou=$ooo[0];
         
         
                // echo '<script>alert("Booked successfully.")</script>';
                // echo '<script>location.href="viewcategory.php?bmid='.$ou.'&date='.$sdate.'"</script>';


                echo '<script>location.href="itemgrid.php?bmid='.$ou.'&date='.$sdate.'"</script>';
         
        // }
        // else
        // {
        //     echo '<script>alert("Sorry some error occured")</script>';
        // }
        }
}
?>
      
<?php
include '../footer.php';
?>
