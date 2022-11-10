<?php
include_once "header.php";
?>

<div class="p-8 h-screen md:h-[90vh] w-full md:w-[480px] md:rounded-xl flex justify-center items-center  shadow-2xl">
    <form id="forgotpassword-form" class="w-full">
        <h1 class="text-3xl font-bold py-5 text-white">Change Password.</h1>

        <div class="py-5 flex flex-col gap-5">
            <label class="text-[12px] font-[600] text-white/80">EMAIL</label>
            <input class="text-white py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent" type="text"
                name="email" placeholder="Enter Email..." autocomplete="off" />
            <div class="relative w-full">
                <label class="text-white text-[12px] font-[600] text-white/80">CHANGE PASSWORD</label>

                <input class="text-white w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                    type="password" name="password" placeholder="Password..." autocomplete="off" />


            </div>
            <div class="relative w-full">
                <label class="text-white text-[12px] font-[600] text-white/80">CONFIRM PASSWORD</label>

                <input class="text-white w-full py-1 focus:outline-none border-b border-b-neutral-400 bg-transparent"
                    type="password" name="confirm-password" placeholder="Confirm Password..." autocomplete="off" />


            </div>
            <button id="login-btn" type="submit" name="login" class="bg-blue-500 text-white py-2 rounded-md">
                SUBMIT
            </button>
            <a href="signin.php" class="text-base text-white"> Doesn't have an account? </a>
        </div>
    </form>
</div>

<script>
const forgotpasswdForm = document.querySelector("#forgotpassword-form");

forgotpasswdForm.onsubmit = (e) => {
    e.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/todoApp/php/user/forgotpassword.inc.php", true);
    xhr.responseType = "text";
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                console.log(data);
                if (data === "Password Successfully Updated") {
                    alert(data);
                    window.location.href = "index.php";
                } else {
                    alert(data);
                }
            } else {
                console.error("error");
            }
        }
    };
    let formData = new FormData(forgotpasswdForm);
    xhr.send(formData);
};
</script>