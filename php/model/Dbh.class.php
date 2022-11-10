<?php

class Dbh
{

	private $server = "localhost";
	private $user = "root";
	private $passwd = "";
	private $dbname = "todo_app";
	private $charset = "utf8mb4";


	protected function connect()
	{
		try {

			$dsn = "mysql:host=" . $this->server . ";dbname=" . $this->dbname . ";charset=" . $this->charset;

			$pdo = new PDO($dsn, $this->user, $this->passwd);

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;
		} catch (Exception $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
}