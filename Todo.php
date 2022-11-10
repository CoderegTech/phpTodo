<?php
session_start();

if (!$_SESSION['user_uid']) {
    header("location: index.php");
} else {
    if (time() - $_SESSION["timeout"] > 1800) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="js/script.js" defer></script>
    <script src="js/todos.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>
<style>
.todos::-webkit-scrollbar {
    width: 0;
}

.addBtn.active .back {
    display: block;
}

.addTodo {
    transform: translateX(1000%);
}

.addBtn.active~.addTodo {
    transform: translateX(0);
}

.addBtn.active .plus {
    display: none;
}


.tooltip {
    opacity: 0;
}

.logout-icon:hover~.tooltip {
    opacity: 1;

}
</style>

<body class="h-screen grid place-items-center bg-[#000]">
    <div class="relative w-full md:max-w-lg h-screen px-10 py-8 overflow-hidden">
        <header class="w-full flex justify-between items-center pb-5">
            <div class="leading-loose text-white">
                <h1 class="text-3xl font-semibold">Hi <?php echo $_SESSION['username'] ?> </h1>
                <p class="text-sm">Here are your tasks</p>
            </div>
            <div class="relative flex items-center gap-3">
                <img class="w-10 h-10 object-cover object-center rounded-full bg-white/50"
                    src="php/user/profileImages/<?php echo $_SESSION['profileImgName'] ?>" alt="">

                <div class="">
                    <a class="logout-icon" href="php/user/logout.php">
                        <ion-icon class=" text-blue-500 text-2xl" name="power-outline"></ion-icon>
                    </a>
                    <span
                        class="tooltip duration-200 delay-300 absolute -bottom-6 -right-6 px-3 py-1 bg-white text-sm font-semibold text-black rounded-lg">

                        LOGOUT
                    </span>
                </div>
            </div>
        </header>
        <div
            class="w-full h-36 flex flex-col justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl p-5">
            <div>
                <p id="date" class="text-xl text-white"></p>
                <h1 id="time" class="text-5xl text-white"></h1>
            </div>

        </div>
        <!-- todo body -->
        <div class="w-full h-full py-5">

            <ul class="todos w-full h-full flex flex-col gap-3 overflow-y-auto scroll">
                <!-- <li class='w-full py-2 px-5 rounded-full flex justify-between items-center bg-white'>
                    <p class='text-black text-lg'>hello world</p>
                    <button class='text-black text-lg hover:text-[red]'>
                        <ion-icon name='trash-outline'></ion-icon>
                    </button>
                </li> -->

            </ul>
        </div>

        <!-- Add New Todo -->
        <div
            class="addBtn absolute bottom-6 right-8 w-10 h-10 rounded-full bg-blue-500 grid place-items-center  duration-300">
            <ion-icon class="plus text-white text-2xl" name="add-outline"></ion-icon>
            <ion-icon class="back hidden text-white text-2xl" name="arrow-forward-outline"></ion-icon>
        </div>

        <div class="addTodo w-96 absolute left-8 duration-300 bottom-6 bg-white rounded-full px-2 py-1 shrink-0">
            <form class="todo-form flex justify-bewtween items-center">
                <input class="todo-input w-full px-2 bg-transparent focus:outline-none " type="text"
                    placeholder="Add Todo..." required>
                <button type='submit' class=" w-8 h-8 rounded-full bg-blue-500 grid place-items-center shrink-0">
                    <ion-icon class="text-white text-base " name="add-outline"></ion-icon>

                </button>
            </form>
        </div>

    </div>


    <script>
    const addBtn = document.querySelector('.addBtn')
    addBtn.onclick = () => document.querySelector('.addBtn').classList.toggle('active')
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>