<?php
include_once "header.php";
?>

<div class="p-8 h-screen md:h-[90vh] w-full md:w-[480px] md:rounded-xl flex justify-center items-center  shadow-2xl">
    <form id="login-form" class="w-full">
        <h1 class="text-3xl font-bold py-5 text-white">Login Here.</h1>

        <div class="py-5 flex flex-col gap-5">
            <label class="text-[12px] font-[600] text-white/80">EMAIL</label>
            <input class="text-white py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                id="login_email" type="text" name="email" placeholder="Email..." autocomplete="off" />

            <div class="relative w-full">
                <label class="text-[12px] font-[600] text-white/80">PASSWORD</label>

                <input
                    class="text-white password w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                    id="login_password" type="password" name="password" placeholder="Password..." autocomplete="off" />

            </div>

            <a href="forgotpassword.php" class="text-base text-white"> Forgot password?</a>
            <button id="login-btn" type="submit" name="login" class="bg-blue-500 text-white py-2 rounded-md">
                LOGIN
            </button>
            <a href="signin.php" class="text-base text-white"> Doesn't have an account? </a>
        </div>
    </form>
</div>



<script src="js/login.js"></script>

</body>

</html>