<?php   
  include 'db.conn.inc.php';
  
  $name=$_POST["name"];
  $idcard=$_POST["idcard"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $date_from=$_POST["date_from"];
  $date_to=$_POST["date_to"];
  $r_type=$_POST["r_type"];
  $idroom=$_POST["idroom"];
  $Update=@date('Y-m-d H:i:s');

 function SelectCus($idcard)
  {
    include 'db.conn.inc.php';
    $sql = "SELECT Cus_ID FROM customer WHERE Cus_IDCard = '".$idcard."'";    
    $result = mysqli_query($conn, $sql) or die (mysqli_error());
    $rsCheck = mysqli_num_rows($result);
    $rs = mysqli_fetch_array($result);
    $data_cus ='';
    if($rsCheck != 0){
      $data_cus = $rs['Cus_ID'];
    }
    return $data_cus;
  }

  function SelectPrice($r_type){
    include 'db.conn.inc.php';
    $sqlR="SELECT PriceRoom FROM roomtype WHERE RT_ID ='".$r_type."'";
    $resultR = mysqli_query($conn, $sqlR) or die (mysqli_error());
    $rsCheckR = mysqli_num_rows($resultR);
    $rsR = mysqli_fetch_array($resultR);
    $roomPrice = $rsR['PriceRoom'];
    return $roomPrice;
  }

  if(!empty($idcard))
  {
    $Cus_ID = SelectCus($idcard);
    if(empty($Cus_ID)){

      $sqlin = "INSERT INTO customer (Cus_IDCard, FullName, Email, Phone)".
      $sqlin .= "VALUES ('".$idcard."', '".$name."', '".$email."', '".$phone."')";
      $result = mysqli_query($conn, $sqlin);
    }
    $price = SelectPrice($r_type);
    $query = "INSERT INTO reservation (Cus_IDCard, Room_Key, CheckIn, CheckOut, Price) ".
    $query .= "VALUES ('".$idcard."', '".$idroom."', '".$date_from."', '".$date_to."', '".$price."')";
    $resultres = mysqli_query($conn, $query);
    
    $sqlR="SELECT Res_ID FROM reservation WHERE Cus_IDCard ='".$idcard."'";
    $resultR = mysqli_query($conn, $sqlR) or die (mysqli_error());
    $rsR = mysqli_fetch_array($resultR);
    $res_ID = $rsR['Res_ID'];
    //echo $res_ID;
    //header("Location: ../reservation.html");    
    header("Location: ../details-reservation.html?room=detail-res&RT_ID=$res_ID");
    exit();
  }
  else{
    header("Location: ../reservation.html");
    exit();
  }

?>