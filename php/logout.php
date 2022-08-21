<?php 

  session_start();
  if (isset($_SESSION['unique_id'])) { // jika pengguna masuk maka buka halaman ini jika tidak, buka halaman login    
    include_once "config.php";
    // logout_id diambil dari url
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) { // jika melakukan logout sesuai id
      // apabila logout maka status akan di update menjadi "sedang tidak aktif"
      // dan apabila login maka status menjadi "sedang aktif"
      $status = "Sedang Tidak Aktif";
      $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
      if ($sql) {
        session_unset();
        session_destroy();
        header("location: ../login.php");
      }
    } else {
      header("location: ../users.php");
    }
  } else {
    header("location: ../login.php");
  }

?>