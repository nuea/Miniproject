<?php
  include 'db.select.php';    
  $name=$_POST["name"];
  $idcard=$_POST["idcard"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $date_from=$_POST["date_from"];
  $date_to=$_POST["date_to"];
  $r_type=$_POST["r_type"];
  $idroom=$_POST["idroom"];
  echo $name." ".$idcard." ".$email." ".$phone." ".$date_from." ".$date_to." ".$r_type." ".$idroom;

  if(!empty($idcard)){
    include 'db.conn.inc.php';
    $sql="SELECT Cus_ID FROM customer WHERE Cus_IDCard = '".$idcard."'";    
    $result = mysqli_query($conn, $sql) or die (mysqli_error());
    $rsCheck = mysqli_num_rows($result);
    $rs = mysqli_fetch_array($result);
    $Cus_ID = $rs['$Cus_ID'];
    echo "<bt>insert to reservation db<br>";
    echo "Cus_id: ".$Cus_ID."<br>";
    echo "Room_id(room_key): ".$idroom."<br>";
    echo "check_id: ".$date_from."<br>";
    echo "check_out: ".$date_to."<br>";
    echo "price: ".$price."<br>";
    echo $rsCheck."<br>";
   
    $tt = SelectRoomType($r_type);
    echo $tt;
    echo "<br>";
     $someJSON = $tt;
    $someArray = json_decode($tt, true);
    echo "Here! ".$someArray[0]["R_price"]; 
/*
Convert JSON String to PHP Array or Object
$data = json_decode($your_json_string, TRUE);
  $someJSON = '[{"R_typeR":"Double Room","R_Des":"Standard rooms are appointed with Twin Beds. The elegant room is perfectly decorate in rich Thai traditional fabrics and local wood, included all the amenities of guest room.","R_key":"3","R_img":"Double_Room.jpg","R_details":"1 Bedroom ( 2 beds ) \/ 1 bathroom","R_price":"5800","R_size":"38 Sq."}]';

  // Convert JSON string to Array
  $someArray = json_decode($someJSON, true);
 // print_r($someArray);        // Dump all data of the Array
  echo $someArray[0]["R_price"]; */
/*
    if($rsCheck == 0){
      $sqlin = "INSERT INTO customer (Cus_IDCard, FullName, Email, Phone)".
      $sqlin .= "VALUES ('".$idcard."', '".$name."', '".$email."', '".$phone."')";
      $result = mysqli_query($conn, $sqlin);
    }*/

  }

exit();

 /* if(isset($_POST['submit']))
  {
    include 'db.conn.inc.php';  
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
  }*/
?>