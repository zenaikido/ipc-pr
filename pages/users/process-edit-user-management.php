<?php
global $link;
$id = $_GET['slug'];
$full = ucwords($_POST['fullname']);
$user = strtolower($_POST['username']);
$pass = md5($_POST['password']);
$acc = $_POST['access'];
$dept = $_POST['department'];

$sql = mysqli_query($link, "UPDATE user SET fullname='$full', username='$user', password='$pass', access='$acc', id_department='$dept' WHERE username='$id'");

// var_dump("UPDATE user SET fullname='$full', username='$user', password='$pass', access='$acc', id_department='$dept' WHERE username='$id'");
// exit;

header("location:?page=user-management");
