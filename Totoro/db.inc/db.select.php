<?php
  /** get value **/
  $room = $_GET["room"];
  
  /*********** function select room ***********/ 
  function JoinRoom()
  {
    include 'db.conn.inc.php';
    $arr = array(
      'typeR' => 'Room type',
      'count' => 'room total',
      'RT_ID' => 'id room type',
      'img' => 'img room',
      'details' => 'details room',
      'items' => array()
     );
    $query = "SELECT rr.CountRoom, rt.* FROM roomtype rt 
      LEFT JOIN  (SELECT r.RT_ID,COUNT(r.RT_ID) AS CountRoom FROM room r 
      LEFT JOIN mannageroom m on m.Room_Key=r.Room_Key 
      WHERE m.Status='OFF' GROUP by r.RT_ID ) rr ON rr.RT_ID=rt.RT_ID ";
    $result = mysqli_query($conn,$query);
    while($rs = mysqli_fetch_assoc($result))
    {
      $arr['items'][] = array(
        'typeR' => $rs['RoomType'],
        'count' => $rs['CountRoom'],
        'RT_ID' => $rs['RT_ID'],          
        'img' => $rs['img'],          
        'details' => $rs['details']
      );
    }
    $json = json_encode($arr);
    echo $json;
  }
  /*********** end function select room ***********/

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

    while($rs = mysqli_fetch_array($result))
    {
      $status=0;
      foreach( $valroom as $value ) 
      {
        if($value==$rs['Room_Key']){
          $status=1;
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

  if ($room == "room"){
    JoinRoom();
  }
  else if ($room == "roomtype"){
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
?>