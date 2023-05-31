<nav class="rounded-md flex items-center justify-between flex-wrap bg-[#2CD3E1] p-2 m-2 font-poppins">

    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">

        <div class="p-2 hover:bg-[#FBFFDC] flex flex-row justify-center mx-2 rounded-lg">
            <a href="/oldweb/welcome.php" class="block mt-4 lg:inline-block lg:mt-0">
                Home
            </a>
        </div>

        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) { ?>
            <div class="p-2 hover:bg-[#FBFFDC] flex flex-row justify-center mx-2 rounded-lg">
                <a href="/oldweb/login.php" class="block mt-4 lg:inline-block lg:mt-0">
                    Login
                </a>
            </div>
        <?php } ?>
        <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) { ?>
            <div class="p-2 hover:bg-[#FBFFDC] flex flex-row justify-center mx-2 rounded-lg">
                <a href="/oldweb/signup.php" class="block mt-4 lg:inline-block lg:mt-0">
                    Sign Up
                </a>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
            <div class="p-2 hover:bg-[#E76161] flex flex-row justify-center mx-2 rounded-lg hover:text-white">
                <a href="/oldweb/logout.php" class="block mt-4 lg:inline-block lg:mt-0">
                    Logout
                </a>
            </div>
        <?php } ?> </a>
    </div>
</nav>