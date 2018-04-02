<?php
 
  $room = $_GET["room"];
  /* select room */ 
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
    $query = "SELECT COUNT(r.RT_ID) AS CountRoom, rt.* FROM roomtype rt 
    LEFT JOIN room r ON rt.RT_ID = r.RT_ID GROUP BY r.RT_ID ORDER BY rt.RT_ID ";
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
  /* end select room */

   /* Select Room Type */ 
   function SelectRoomType($RT_ID){
    include 'db.conn.inc.php';  
    $room = array();
    $query = "SELECT  rt.* FROM roomtype rt WHERE rt.RT_ID = '".$RT_ID."'";
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

  if ($room == "room"){
    echo JoinRoom();
  }
  else if ($room == "roomtype"){
    $RT_ID = $_GET["RT_ID"]; 
    echo SelectRoomType($RT_ID);
  }
?>