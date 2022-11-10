<?php
include_once "header.php";
?>
<div class="p-8 h-screen md:h-[90vh] w-full md:w-[480px] md:rounded-xl flex justify-center items-center shadow-2xl">
    <form id="signin-form" class="w-full" enctype="multipart/form-data" autocomplete="off">
        <h1 class="text-white text-3xl font-bold py-5">Create Account</h1>
        <span id="msg" class="p-1 my-2 hidden text-white w-full"></span>
        <div class="py-5 flex flex-col gap-4">
            <label class="text-white text-[12px] font-[600] text-white/80">USERNAME</label>
            <input class="text-white w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                id="signin_username" type="text" name="username" placeholder="Username..." autocomplete="off" />
            <label class="text-white text-[12px] font-[600] text-white/80">EMAIL</label>
            <input class="text-white w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                id="signin_email" type="text" name="email" placeholder="Email..." autocomplete="off" />
            <div class="relative w-full">
                <label class="text-white text-[12px] font-[600] text-white/80">PASSWORD</label>

                <input class="text-white w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                    id="signin_password" type="password" name="password" placeholder="Password..." autocomplete="off" />

            </div>
            <div class="relative w-full">
                <label class="text-white text-[12px] font-[600] text-white/80">CONFIRM PASSWORD</label>

                <input class="text-white w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                    id="signin_confirm_password" type="password" name="confirm-password"
                    placeholder="Confirm Password..." autocomplete="off" />

            </div>
            <label class="text-white text-[12px] font-[600] text-white/80">PROFILE IMAGE</label>
            <input class="text-white focus:outline-none file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100" id="signin_profileImg" type="file" name="profileImg" autocomplete="off"
                accept="image/png,image/jpeg,image/jpg" />
            <button id="signin-btn" name="signin" type="submit" class="bg-blue-500 text-white py-2 rounded-md">
                Register
            </button>
            <a href="login.php" class="text-base text-white"> Already have an account </a>
        </div>
    </form>
</div>

<script src="js/signin.js"></script>

</body>

</html>