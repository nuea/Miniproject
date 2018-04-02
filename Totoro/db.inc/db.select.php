<?php
  /* select room */
  $room = $_GET["room"];

  function SelectRoom()
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
  if ($room == "room"){
    echo SelectRoom();
  }
  /* end select room */
?>