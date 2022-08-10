<?php 

  session_start();
  if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    $sql = "SELECT * FROM messages
            LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_assoc($query)) {
        if ($row['outgoing_msg_id'] === $outgoing_id) { // jika ini sama dengan maka dia adalah pesan pengirim
          $output .= '
            <div class="flex">
              <div class="details-chat-right">
                <p class="px-[8px] py-[16px] bg-gray-900 rounded-tl-[18px] rounded-bl-[18px] rounded-tr-[18px] break-words">'. $row['msg'] .'</p>
              </div>
            </div>
          ';
        } else { // jika berbeda maka ini penerima
          $output .= '
            <div class="flex items-end py-[10px] pr-[10px]">
              <img src="php/image_users/'. $row['img'] .'" alt="" class="h-[35px] w-[35px] rounded-full">
              <div class="details-chat-left">
                <p class="px-[8px] py-[16px] bg-gray-600 shadow-lg rounded-tl-[18px] rounded-br-[18px] rounded-tr-[18px] break-words">'. $row['msg'] .'</p>
              </div>
            </div>
          ';
        }
      }
      echo $output;
    }
  } else {
    header("../login.php");
  }

?>

