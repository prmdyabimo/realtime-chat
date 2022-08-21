<?php 

    while ($row = mysqli_fetch_assoc($sql)) {
      $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
              OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
              OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
      $query2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($query2);
      if (mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
      } else {
        $result = "Tidak Ada Pesan";
      }

      // menerima pesan apabila lebih dari 28
      (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
      // pesan apabila kita mengirim pesan
      ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You : " : $you = "";
      // pengecekan apakah user online atau offline
      ($row['status'] == "Sedang Aktif") ? $offline = "text-[#468669]" : $offline = "";
      // if ($row['status'] === "Sedang Aktif") {
      //   $online = "online";
      // } else {
      //   $online = "";
      // }

      $output .= '
          <a href="chat.php?user_id='. $row['unique_id'] .'" class="flex items-center justify-between pb-[20px] pr-[15px] border-b-2 border-slate-100">
            <div class="flex mt-4 mb-0 items-center ">
              <img src="php/image_users/'. $row['img'] .'" alt="" class="w-[40px] h-[40px] object-cover rounded-full">
              <div class="ml-[15px]">
                <span class="text-[18px] font-semibold">' . $row['first_name'] . " " . $row['last_name'] .'</span>
                <p class="text-gray-400">'. $you . $msg .'</p>
              </div>
            </div>
            <div class="text-[12px] status text-center">
              <i class="fas fa-circle text-[#ccc] '.$offline.'"></i>
            </div>
          </a>
        ';
    }

?>