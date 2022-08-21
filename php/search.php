<?php 

  session_start();
  include_once "config.php";
  $outgoing_id = $_SESSION['unique_id'];
  $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
  $output = "";

  // search
  $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%')");

  if (mysqli_num_rows($sql) > 0) {
    include "data.php";
  } else {
    $output .= '
      <div class="text-[20px] mt-2 text-white text-center">
        <p>User Yang Anda Cari Tidak Ditemukan</p>
      </div>
    ';
  }
  echo $output;

?>