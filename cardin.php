<?php
include '../connection.php';
session_start();

$cardnum= $name= $cardtype= $expdate="";
function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $cardnum=test_input($_POST["b"]);
    $name=test_input($_POST["c"]);
    $cardtype=test_input($_POST["d"]);
    $expdate=test_input($_POST["e"]);
  }

  $username=$_SESSION['user'];

  $custid=$_SESSION['id'];

  $sql_insert_card="INSERT INTO tbl_card (custid, cardno, cardname, cardtype,expiry) VALUES ('$custid','$cardnum','$name','$cardtype','$expdate')";
  
        if(mysqli_query($conn,$sql_insert_card))
        {
          echo '<script>alert(" Success ....");</script>';
            header("Location: card.php");
            $_SESSION['status']="Add";
            exit;
        }

        else
        {
          header("Location: card.php");
          $_SESSION['status']="Noadd";
          exit;
        }

    mysqli_close($conn);
?>