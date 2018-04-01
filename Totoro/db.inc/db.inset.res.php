<?php
  
  include 'db.inc/dbc.conn.inc.php';
  $name=$_POST["name"];
  $idcard=$_POST["idcard"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $roomtype=$_POST["roomtype"];
  $checkin=$_POST["checkin"];
  $checkout=$_POST["checkout"];

  if(!empty($name)){
    $sql = "INSERT INTO customer (Cus_IDCard, FullName, Email, Phone)".
    $sql .= "VALUES ('".$idcard."', '".$name."', '".$email."', '".$phone."')";
    $result = mysqli_query($conn, $sql);
  }

  $sql = "INSERT INTO reservation (Cus_ID, Room_ID, CheckIn, CheckOut)".
  $sql .= "VALUES ('John', 'Doe', '')";
  $result = mysqli_query($conn, $sql);
?>