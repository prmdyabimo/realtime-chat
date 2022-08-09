<?php 

  session_start();
  
?>

<?php include_once "header.php"; ?>
<body>
  <div class="flex items-center justify-center min-h-[100vh]">
    <div class="bg-gray-900 w-[450px] text-white rounded-md shadow-xl">
      <section class="px-[25px] py-[30px]">
        <header class="flex items-center justify-between border-b-2 border-slate-100 pb-[20px]">
          <?php 
              
          ?>
          <div class="flex">
            <img src="img/b.jpg" alt="" class="w-[50px] h-[50px] object-cover rounded-full">
            <div class="ml-[15px]">
              <span class="text-[18px] font-semibold">Prmdya Bimo</span>
              <p>Active Now</p>
            </div>
          </div>
          <a href="" class="text-[#fff] px-[15px] py-[7px] bg-slate-400 rounded">Logout</a>
        </header>
        <div class="mb-0 mt-4 flex">
          <span class="hidden">Select an user to start chat</span>
          <input type="text" id="small-input" placeholder="Enter name to search" id="search" class="search opacity-[0] block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-0 transition-all duration-300">
          <button><i id="btn-search" class="btn-search fas fa-search ml-1 bg-slate-400 w-[47px] h-[42px] flex items-center justify-center rounded-lg"></i></button>
        </div>
        <!-- USER LIST -->
        <div class="user-list max-h-[350px] overflow-y-auto">
          <a href="" class="flex items-center justify-between pb-[20px] pr-[15px] border-b-2 border-slate-100">
            <div class="flex mt-4 mb-0 items-center ">
              <img src="img/b.jpg" alt="" class="w-[40px] h-[40px] object-cover rounded-full">
              <div class="ml-[15px]">
                <span class="text-[18px] font-semibold">Prmdya Bimo</span>
                <p class="text-gray-400">This is test message</p>
              </div>
            </div>
            <div class="text-[12px] text-[#468669] text-center">
              <i class="fas fa-circle "></i>
            </div>
          </a>
        </div>
      </section>
    </div>
  </div>

  <script>
    // search btn
    var search = document.querySelector(".search")
    var searchBtn = document.querySelector(".btn-search")
    
    searchBtn.onclick = () => {
      if (search.type == "text" ) {
        search.type = "search"
        search.classList.remove("opacity-[0]");
        search.classList.add("search-active");
        search.focus()
      } else {
        search.type = "text";
        search.classList.remove("search-active");
        search.classList.add("opacity-[0]");
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
  <script src="js/script.js"></script>

</body>
</html>