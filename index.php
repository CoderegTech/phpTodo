<?php
session_start();

if ($_SESSION['user_uid']) {
    header("location: Todo.php");
} else {

    header("location: login.php");
}