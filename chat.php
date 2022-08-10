<?php 

  session_start();
  if (!isset($_SESSION['unique_id'])) {
    header("location:login.php");
  }

?>


<?php include_once "header.php";  ?>
<body>
  <div class="flex items-center justify-center min-h-[100vh]">
    <div class="bg-gray-900 w-[450px] text-white rounded-md shadow-xl">
      <!-- chat area -->
      <section class="">
        <header class="flex items-center px-[18px] py-[20px]">
          <?php 
            include_once "php/config.php";
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if (mysqli_num_rows($sql) > 0) {
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <a href="users.php" class="text-[18px] text-gray-200"><i class="fas fa-arrow-left"></i></a>
          <img src="php/image_users/<?php echo $row['img'] ?>" alt="" class="w-[45px] h-[45px] mx-[15px] my-0 object-cover rounded-full">
          <div class="ml-[15px]">
            <span class="text-[16px] font-semibold"><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
            <p><?php echo $row['status'] ?></p>
          </div>
        </header>
        <!-- chatbox -->
        <div class="chat-box flex flex-col-reverse h-[500px] bg-slate-800 p-[10px] shadow-lg overflow-y-auto">
          <!-- chat outgoing -->
          <!-- chatincoming -->
        </div>
        <form class="typing-message" action="" method="post" autocomplete="off">
          <div class="flex m-4 justify-between">
            <!-- input berisi id chat yang dikirim -->
            <input hidden type="number" name="outgoing_id" class="text-black" value="<?php echo $_SESSION['unique_id']; ?>">
            <input hidden type="number" name="incoming_id" class="text-black" value="<?php echo $user_id; ?>">
            <input type="text" name="message" placeholder="Type a message here..." class="field-message block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <button class="send-message ml-2 bg-gray-600 py-2 px-4 rounded-lg"><i class="fas fa-paper-plane"></i></button>
            
          </div>
        </form>
      </section>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
  <script src="js/chat.js"></script>

</body>
</html>