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

            include_once "php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
            }

          ?>
          <div class="flex">
            <img src="php/image_users/<?php echo $row['img'] ?>" alt="" class="w-[50px] h-[50px] object-cover rounded-full">
            <div class="ml-[15px]">
              <span class="text-[18px] font-semibold"><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
              <p><?php echo $row['status'] ?></p>
            </div>
          </div>
          <a href="" class="text-[#fff] px-[15px] py-[7px] bg-slate-400 rounded">Logout</a>
        </header>
        <div class="mb-0 mt-4 flex flex-row">
          <span class="hidden">Select an user to start chat</span>
          <input type="text" id="small-input" placeholder="Enter name to search" id="search" class="search opacity-[0] block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 outline-0 transition-all duration-300">
          <div>
            <i id="btn-search" class="btn-search fas fa-search cursor-pointer ml-1 bg-slate-400 w-[47px] h-[42px] flex items-center justify-center rounded-lg"></i>
          </div>

        </div>
        <!-- USER LIST -->
        <div class="users-list max-h-[350px] overflow-y-auto">
          
        </div>
      </section>
    </div>
  </div>

  <script src="js/users.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

</body>
</html>