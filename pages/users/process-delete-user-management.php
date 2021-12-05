<?php
global $link;
$usr = $_GET['username'];
$sql = mysqli_query($link, "UPDATE user SET deleted_status=1 WHERE username='$usr'");

header("location:?page=user-management");
