<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
die("Access Denied!");
}

// Fetch all users
$users = file("users.txt");

?>
<h1>Role Management</h1>
<!-- Add other functionalities here like create, edit and delete user roles -->