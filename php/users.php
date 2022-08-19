<?php 

  session_start();
  include_once "config.php";
  $outgoing_id = $_SESSION['unique_id'];
  $sql = mysqli_query($conn, "SELECT * FROM users");
  $output = "";
  
  if (mysqli_num_rows($sql) == 0) {
    $output = "Tidak Ada User Untuk Dichat";
  } else if (mysqli_num_rows($sql) > 0) {
    include "data.php";
  }
  echo $output;

?>