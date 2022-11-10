<?php

class Todos extends TodoContrl
{
	// Add Todos to Database
	public function addTodos($user_uid, $todos, $createdAt)
	{
		$this->AddTodo($user_uid, $todos, $createdAt);
	}

	// Show Todos from Database
	public function showTodos($user_uid)
	{
		return $this->getTodos($user_uid);
	}

	// Delete Todo from Database
	public function delTodos($id)
	{
		$this->deleteTodo($id);
	}
}