<?php
 // 
  /* select room */
  $f = $_GET["f"];

  function SelectRoom()
  {
    include 'db.conn.inc.php';
    $arr = array(
      'type' => 'Room type',
      'count' => 'room total',
      'RT_ID' => 'id room type',
      'items' => array()
 );
    $query = "SELECT COUNT(r.RT_ID) AS CountRoom, r.*, rt.* FROM room r  
    LEFT JOIN roomtype rt ON rt.RT_ID = r.RT_ID 
    GROUP BY r.RT_ID ORDER BY rt.RT_ID ";
    $result = mysqli_query($conn,$query);
    while($rs = mysqli_fetch_assoc($result))
    {
      $arr['items'][] = array(
          'type' => $rs['RoomType'],
          'count' => $rs['CountRoom'],
          'RT_ID' => $rs['RT_ID']
      );
    }
    $json = json_encode($arr);
    echo $json;
  }
  if ($f == "sr"){
    echo SelectRoom();
  }
?>