<?php 

  session_start();
  include_once "config.php";
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // validation
  if (!empty($email) && !empty($password)) {
    // cek apakah email dan password sama atau tidak dengan yang ada di database
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) { // jika email dan password sama dengan yang ada di database
      $row = mysqli_fetch_assoc($sql);
      $status = "Sedang Aktif";
      // update user status "sedang aktif" apabila berhasil login
      $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
      if ($sql2) {
        $_SESSION['unique_id'] = $row['unique_id']; // menggunakan session unique id untuk di file php lain
        echo "success";
      }
    } else {
      echo "Email Atau Password Salah !";
    }
  } else {
    echo "Seluruh Data Wajib Diisi !";
  }

?>