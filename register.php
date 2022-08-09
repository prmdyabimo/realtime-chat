<?php include_once "header.php";  ?>
<body>
    <div class="w-[100%] min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5 ">
        <div class="w-[50%] bg-gray-100 text-gray-500 rounded-3xl shadow-xl overflow-hidden">
            <div class="md:flex w-full">
                <div class="w-full py-10 px-5 md:px-10">
                    <!-- TITLE -->
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                        <p>Enter your information to register</p>
                    </div>
                    <form class="form" action="" method="POST" enctype="multipart/form-data">
                        <div class="">
                            <div class="flex -mx-3">
                                <div id="error-txt" class="hidden w-[100%] p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800 text-center" role="alert">
                                    <span class="message font-medium"></span>
                                </div>
                            </div>
                            <!-- NAME -->
                            <div class="flex -mx-3">
                                <!-- FIRSTNAME -->
                                <div class="w-1/2 px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">First name</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input type="text" name="first_name" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="first name" required>
                                    </div>
                                </div>
                                <!-- LASTNAME -->
                                <div class="w-1/2 px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">Last name</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input name="last_name" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="last name" required>
                                    </div>
                                </div>
                            </div>
                            <!-- EMAIL -->
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">Email</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                        <input type="email" name="email" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="email" required>
                                    </div>
                                </div>
                            </div>
                            <!-- PASSWORD -->
                            <div class="flex -mx-3">
                                <div class="relative w-full px-3 mb-2">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                        <input type="password" name="password" id="pass" class=" w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************" required>
                                        <i id="btn-eye" class="fas fa-eye absolute top-[55%] right-[30px] text-gray-400 cursor-pointer"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- SELECT IMAGE -->
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-4">
                                    <label class="text-xs font-semibold px-1" for="large_size">Select Image</label>
                                    <div class="flex">
                                        <input name="image" class="block w-full text-lg text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-200 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file" required>
                                    </div>
                                </div>
                            </div>
                            <!-- BUTTON REGISTER -->
                            <div class="flex -mx-3">
                                <div class="w-full px-3 my-4">
                                    <button type="submit" class="button block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">REGISTER</button>
                                </div>
                            </div>
                            <!-- LOGIN -->
                            <div class="text-grey-dark text-center">
                                Already have an account?
                                <a class="text-blue-600 hover:underline" href="login.php">
                                    Log in
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // pass show / hide
        // from input password
        var passField = document.getElementById("pass");
        var toggleBtn = document.getElementById("btn-eye");

        toggleBtn.onclick = () => {
            if (passField.type == "password") {
            passField.type = "text";
            toggleBtn.classList.add("active");
            } else {
            passField.type = "password";
            toggleBtn.classList.remove("active");
            }
        };
    </script>

    <script src="js/register.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

</body>
</html>