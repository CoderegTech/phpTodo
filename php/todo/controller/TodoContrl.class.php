<?php

class TodoContrl extends Dbh
{

	// Add Todo to Database
	protected function AddTodo($user_uid, $todos, $createdAt)
	{

		try {
			// MYSQL Query
			$sql = "INSERT INTO todos (user_uid, todos, createdAt) VALUES (?, ?, ?);";

			$stmt = $this->connect()->prepare($sql);

			$execute = $stmt->execute([$user_uid, $todos, $createdAt]);

			if ($execute) {
				echo "Todo Added Successfully";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	protected function getTodos($user_uid)
	{
		try {
			// MYSQL Query
			$sql = "SELECT * FROM todos WHERE user_uid = ? ORDER BY createdAt DESC";
			$stmt = $this->connect()->prepare($sql);
			$execute = $stmt->execute([$user_uid]);

			if ($execute) {

				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $results;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	protected function deleteTodo($id)
	{
		try {

			// MYSQL Query
			$sql = "DELETE FROM todos WHERE id = ? LIMIT 1;";

			$stmt = $this->connect()->prepare($sql);

			$execute = $stmt->execute([$id]);

			if ($execute) {
				echo "Todo Deleted!";
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}