<?php include_once "header.php";  ?>
<body>
  <div class="flex items-center justify-center min-h-[100vh]">
    <div class="bg-gray-900 w-[450px] text-white rounded-md shadow-xl">
      <!-- chat area -->
      <section class="">
        <header class="flex items-center px-[18px] py-[20px]">
          <a href="#" class="text-[18px] text-gray-200"><i class="fas fa-arrow-left"></i></a>
          <img src="img/login.jpg" alt="" class="w-[45px] h-[45px] mx-[15px] my-0 object-cover rounded-full">
          <div class="ml-[15px]">
            <span class="text-[16px] font-semibold">Prmdya Bimo</span>
            <p>Active Now</p>
          </div>
        </header>
        <!-- chatbox -->
        <div class="chat-box h-[500px] bg-slate-800 p-[10px] shadow-lg overflow-y-auto">
          <!-- chat ongoing -->
          <div class="flex ">
            <div class="details-chat-right">
              <p class="px-[8px] py-[16px] bg-gray-900 rounded-tl-[18px] rounded-bl-[18px] rounded-tr-[18px] break-words">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, optio.</p>
            </div>
          </div>
          <!-- chatincoming -->
          <div class="flex items-end py-[10px] pr-[10px]">
            <img src="img/login.jpg" alt="" class="h-[35px] w-[35px] rounded-full">
            <div class="details-chat-left">
              <p class="px-[8px] py-[16px] bg-gray-600 shadow-lg rounded-tl-[18px] rounded-br-[18px] rounded-tr-[18px] break-words">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, optio.</p>
            </div>
          </div>
          <!-- chat ongoing -->
          <div class="flex ">
            <div class="details-chat-right">
              <p class="px-[8px] py-[16px] bg-gray-900 rounded-tl-[18px] rounded-bl-[18px] rounded-tr-[18px] break-words">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, optio.</p>
            </div>
          </div>
          <!-- chatincoming -->
          <div class="flex items-end py-[10px] pr-[10px]">
            <img src="img/login.jpg" alt="" class="h-[35px] w-[35px] rounded-full">
            <div class="details-chat-left">
              <p class="px-[8px] py-[16px] bg-gray-600 shadow-lg rounded-tl-[18px] rounded-br-[18px] rounded-tr-[18px] break-words">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, optio.</p>
            </div>
          </div>
        </div>
        <form action="" method="post">
          <div class="flex m-4 justify-between">
            <input type="text" id="small-input" placeholder="Type a message here..." class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <button class="ml-2 bg-gray-600 py-2 px-4 rounded-lg"><i class="fas fa-paper-plane"></i></button>
          </div>
        </form>
      </section>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
  <script src="js/script.js"></script>

</body>
</html>