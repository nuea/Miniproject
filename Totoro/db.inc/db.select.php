<?php
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
    //$rs = mysqli_fetch_assoc($result); 
    while($rs = mysqli_fetch_array($result))
    {
      $room[] = array(
          'R_typeR' => $rs['RoomType'],
          'R_Des' => $rs['Description'],
          'R_key' => $rs['RT_ID'],          
          'R_img' => $rs['img'],          
          'R_details' => $rs['details'],      
          'R_price' => $rs['PriceRoom'],        
          'R_size' => $rs['SizeRoom'] 
      );
    }
    $json = json_encode($room);
    echo $json;
  }
  /*********** function Select Room Type ***********/

  if ($room == "room"){
    echo JoinRoom();
  }
  else if ($room == "roomtype"){
    $RT_ID = $_GET["RT_ID"]; 
    echo SelectRoomType($RT_ID);
  }
?>