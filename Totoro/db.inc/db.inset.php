<?php
  if(isset($_POST['submit']))
  {
    include 'db.inc/dbc.conn.inc.php';
    $name=$_POST["name"];
    $idcard=$_POST["idcard"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $roomtype=$_POST["roomtype"];
    $checkin=$_POST["checkin"];
    $checkout=$_POST["checkout"];

    if(!empty($name))
    {
      $sqlin = "INSERT INTO customer (Cus_IDCard, FullName, Email, Phone)".
      $sqlin .= "VALUES ('".$idcard."', '".$name."', '".$email."', '".$phone."')";
      $result = mysqli_query($conn, $sqlin);

      $query = "SELECT Cus_ID FROM customer WHERE FullName = '$name' ";
      $result2 = mysqli_query($conn,$query);
      $rs = mysqli_fetch_assoc($result);

      $sqlres = "INSERT INTO reservation (Cus_ID, Room_ID, CheckIn, CheckOut)".
      $sqlres .= "VALUES ('".$rs[Cus_ID]."', '".$roomtype."', '".$checkin."', '".$checkout."')";
      $resultres = mysqli_query($conn, $sqlres);
    }
    else{
      header("Location: ../reservation.php");
      exit();
    }
  }
?>