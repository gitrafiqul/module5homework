<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];
$password = $_POST['password'];

$users = file("users.txt");
 foreach($users as $user) {
list($username, $storedEmail, $storedPassword, $role) = explode(",", $user);
if($storedEmail == $email && password_verify($password, trim($storedPassword))) {
$_SESSION['loggedin'] = true;
 $_SESSION['role'] = trim($role);
 $_SESSION['username'] = $username;

            // redirecting based on role
 if(trim($role) == 'admin') {
 header("Location: role_management.php");
 } 
 elseif(trim($role) == 'manager') {
 header("Location: manager_page.php");
 } else {
 header("Location: user_page.php");
 }
 exit;
 }
 }
 echo "Invalid login!";
}
?>