<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

include_once "../model/Dbh.class.php";
include_once "controller/TodoContrl.class.php";
include_once "controller/Todos.class.php";

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {
	session_start();


	$user_uid = $_SESSION['user_uid'];
	$todos = $_POST['todos'];
	$completed = $_POST['completed'];
	$createdAt = $_POST['createdAt'];

	$todo = new Todos();
	$todo->addTodos($user_uid, $todos, $completed, $createdAt);
}