<?php
  $serverName = "localhost";
  $userName = "root";
  $userPassword = "";
  $dbName = "totorohotal";

  $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
/*
  if (mysqli_connect_errno())
  {
    echo "Database Connect Failed : " . mysqli_connect_error();
  }
  else
  {
    echo "Database Connected.";
  }

  mysqli_close($conn);*/
?>