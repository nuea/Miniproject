<?php
  /** get value **/
  $room = $_GET["room"];

  /*********** function Select Room Type ***********/ 
  function SelectRoomType($RT_ID){
    include 'db.conn.inc.php';  
    $room = array();
    $query = "SELECT  rt.* FROM roomtype rt WHERE 1 ";
    if(!empty($RT_ID)){
      $query .= "and rt.RT_ID = '".$RT_ID."'";
    }
    $query .= "Order by rt.RT_ID";
    $result = mysqli_query($conn, $query) or die (mysqli_error());
    while($rs = mysqli_fetch_array($result))
    {
      $room[] = array(
        'r_typeR' => $rs['RoomType'],
        'r_des' => $rs['Description'],
        'r_key' => $rs['RT_ID'],          
        'r_img' => $rs['img'],          
        'r_details' => $rs['details'],      
        'r_price' => $rs['PriceRoom'],        
        'r_size' => $rs['SizeRoom'] 
      );
    }
    $json = json_encode($room);
    echo $json;
  }
  /*********** end function Select Room Type ***********/

  /*********** function Select Room ***********/
  function ChooseRoom($RT_ID,$cin,$cout){
    include 'db.conn.inc.php';  
    $room = array();
    $query = "SELECT * FROM room WHERE 1 ";
    if(!empty($RT_ID)){
      $query .= "and RT_ID = '".$RT_ID."'";
    }
    $query .= "Order by IDRoom";
    $result = mysqli_query($conn, $query) or die (mysqli_error());

    $sql = "SELECT Room_Key FROM reservation WHERE ((`CheckIn` >= '".$cin."' AND `CheckIn` <= '".$cout."') 
    or (`CheckOut` >= '".$cin."' AND `CheckOut` <= '".$cout."')) AND `CheckOut` != '".$cin."'";
    $res = mysqli_query($conn, $sql) or die (mysqli_error());
    $valroom = mysqli_fetch_array($res);
    $rsCheck = mysqli_num_rows($res);
   
    while($rs = mysqli_fetch_array($result))
    {
      $status=0;
      if(!empty($valroom)){
        foreach( $valroom as $value ) 
        {
          //echo "==> ".$value."<br>";
          if($value==$rs['Room_Key']){
            $status=1;
          }
        }
      }     
      
      $room[] = array(
          'r_key' => $rs['Room_Key'],
          'r_id' => $rs['IDRoom'],
          'r_RT_ID' => $rs['RT_ID'],
          'r_status' => $status,
        );
    }
    $data=0;

    $json = json_encode($room);
    echo $json;
  }
  /*********** end function Select Room ***********/

  /****** CheckDate *******/
  function active($cin,$cout){
    include 'db.conn.inc.php';
    $data=0;
    $query = "SELECT * FROM reservation WHERE ((`CheckIn` >= '".$cin."' AND `CheckIn` <= '".$cout."') 
    or (`CheckOut` >= '".$cin."' AND `CheckOut` <= '".$cout."')) AND `CheckOut` != '".$cin."'";
    $result = mysqli_query($conn, $query) or die (mysqli_error());
    $rsCheck = mysqli_num_rows($result);
    if($rsCheck!=0){
      $data = 1;
    }
    echo $data;
  }
  /****** end CheckDate *******/

  /****** Detail Reservation *******/
  function DetailReservation($RT_ID){
    include 'db.conn.inc.php';  
    $del = array();
    $query = "SELECT re.*,c.*,rr.IDRoom, rr.RoomType ,rr.PriceRoom FROM `reservation`re 
    LEFT JOIN customer c ON c.`Cus_IDCard` = re.`Cus_IDCard` 
    LEFT JOIN ( 
      SELECT r.`Room_Key`,r.IDRoom, rt.RoomType ,rt.PriceRoom FROM `room` r 
      LEFT JOIN roomtype rt ON r.`RT_ID` = rt.`RT_ID` 
      ) rr ON rr.`Room_Key` = re.`Room_Key` WHERE 1 ";
    if(!empty($RT_ID)){
      $query .= "and re.`Res_ID`='".$RT_ID."'";
    }
    $result = mysqli_query($conn, $query) or die (mysqli_error());
    while($rs = mysqli_fetch_array($result))
    {
      $del[] = array(
        'd_cusid' => $rs['Cus_IDCard'],
        'd_checkin' => $rs['CheckIn'],
        'd_checkout' => $rs['CheckOut'],     
        'd_price' => $rs['Price'],            
        'd_name' => $rs['FullName'],          
        'd_email' => $rs['Email'],
        'd_phone' => $rs['Phone'],
        'd_idroom' => $rs['IDRoom'],       
        'd_roomtype' => $rs['RoomType'] 
      );
    }
    $json = json_encode($del);
    echo $json;
  }
  /****** end Detail Reservation *******/

  /***** select function *****/
  if ($room == "roomtype"){
    $RT_ID = $_GET["RT_ID"]; 
    SelectRoomType($RT_ID);
  }
  else if($room == "chooroom"){
    $RT_ID = $_GET["RT_ID"]; 
    $cin = $_GET["cin"];
    $cout = $_GET["cout"];
    if(empty($RT_ID)){
      $RT_ID = 1;
    }
    ChooseRoom($RT_ID,$cin,$cout);
  }
  else if ($room == "ckdate"){
    $cin = $_GET["cin"];
    $cout = $_GET["cout"];
    active($cin,$cout);
  }
  else if ($room == "detail-res"){
    $RT_ID = $_GET["RT_ID"];
    DetailReservation($RT_ID);
  }
?>