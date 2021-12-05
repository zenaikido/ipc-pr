<?php
require_once "pages/function/db.php";
global $link;
$username		= $_POST['username'];
$password		= md5($_POST['password']);
$op 			= $_GET['op'];

if ($op == "in") {
	$sql = mysqli_query($link, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	if (mysqli_num_rows($sql) == 1) {
		$qry = mysqli_fetch_array($sql);
		$_SESSION['username'] = $qry['username'];
		$_SESSION['password'] = $qry['password'];
		$_SESSION['fullname'] = $qry['fullname'];
		$_SESSION['access'] = $qry['access'];
		$_SESSION['pesan'] = "Login Success!";
		header("location:pages");
	} else {
		echo "<br><div style='color:120deg,#3498db,#8e44ad; text-align:center; border-bottom: 2px solid red;'> <strong>Username or Password Incorrect</strong></div>";
	}
} else if ($op == "out") {
	unset($_SESSION['id_user']);
	unset($_SESSION['hak_akses']);
	header("location:index.php");
}
