<?php 

    while ($row = mysqli_fetch_assoc($sql)) {
      $output .= '
          <a href="" class="flex items-center justify-between pb-[20px] pr-[15px] border-b-2 border-slate-100">
            <div class="flex mt-4 mb-0 items-center ">
              <img src="php/image_users/'. $row['img'] .'" alt="" class="w-[40px] h-[40px] object-cover rounded-full">
              <div class="ml-[15px]">
                <span class="text-[18px] font-semibold">' . $row['first_name'] . " " . $row['last_name'] .'</span>
                <p class="text-gray-400">This is test message</p>
              </div>
            </div>
            <div class="text-[12px] text-[#468669] text-center">
              <i class="fas fa-circle "></i>
            </div>
          </a>
        ';
    }

?>