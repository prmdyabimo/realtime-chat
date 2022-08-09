<?php 

  // session
  session_start();
  // input from register to database
  include_once "config.php";
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // VALIDATION
  if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
    // pengecekan email user valid atau tidak
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // if email is valid
      // pengecekan apabila email sudah ada didatabase atau belum
      $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
      if (mysqli_num_rows($sql) > 0) {
        echo "$email - Email Ini Sudah Digunakan !";
      } else {
        // pengecekan apakah user mengupload img atau tidak
        if (isset($_FILES['image'])) { // apabila user mengupload gambar
          $img_name = $_FILES['image']['name']; // get user upload image name
          $img_type = $_FILES['image']['type']; // get user upload image type
          $tmp_name = $_FILES['image']['tmp_name']; // penyimpanan sementara nama image yang diupload user untuk disave/dipindahkan ke folder  

          // mengambil image dan format nya
          $img_explode = explode('.', $img_name);
          $img_ext = end($img_explode); // disini kita mendapatkan format imagenye yang diupload user

          $extensions = ['png', 'jpg', 'jpeg']; // format yang bisa digunakan
          if (in_array($img_ext, $extensions) === true) { // apakah format sama atau tidak dengan yg diupload user 
            $time = time(); // untuk mengambil waktu sekarang karena untuk merubah nama img menjadi waktu sekarang sehingga kita mempunyai unique image name

            // pindahkan image user ke folder
            $new_img_name = $time.$img_name;
            if (move_uploaded_file($tmp_name, "image_users/".$new_img_name)) {              
              $status = "Sedang Aktif"; // jika user sign up maka statusnya menjadi sedang aktif
              $random_id = rand(time(), 10000000); // membuat id random untuk user

              // insert semua data user ke table
              $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, first_name, last_name, email, password, img, status) 
              VALUES ('{$random_id}', '{$first_name}', '{$last_name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
              if ($sql2) { // apabila insert data
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if (mysqli_num_rows($sql3) > 0) {
                  $row = mysqli_fetch_assoc($sql3);
                  $_SESSION['unique_id'] = $row['unique_id']; // menggunakan session unique id untuk di file php lain
                  echo "success";
                }
              } else {
                echo "Sesuatu Ada Yang Salah !";
              }
            }
            
          } else {
            echo "Mohon Untuk Memilih Gambar - png, jpg, jpeg !";
          }
        } else {
          echo "Mohon Untuk Memilih Gambar !";
        }
      }
    } else {
      echo "$email - Email Ini Tidak Valid !";
    }
  } else {
    echo "Seluruh Data Wajib Diisi !";
  }

?>