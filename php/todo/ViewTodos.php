<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

include_once "../model/Dbh.class.php";
include_once "controller/TodoContrl.class.php";
include_once "controller/Todos.class.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "GET") {
	session_start();
	$user_uid = $_SESSION['user_uid'];

	$todo = new Todos();
	$todos = $todo->showTodos($user_uid);

	foreach ($todos as $todo) {
		echo "<li class='w-full py-2 px-5 rounded-full flex justify-between items-center bg-white cursor-pointer shadow-2xl shadow-inner'>
		<p class='text-black text-lg'  onclick='updateTodo(" . $todo['id'] . ")' > " . $todo['todos'] . "</p>
		<button class='text-black text-lg hover:text-[red]' onclick='deleteTodo(" . $todo['id'] . ")'>
			<ion-icon name='trash-outline'></ion-icon>
		</button>
	</li>";
	}
}