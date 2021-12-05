<?php
global $link;
$mr_no = $_GET['mr_no'];
$usr = $_SESSION['fullname'];

$query = mysqli_query($link, "UPDATE mr SET deleted_by='$usr', deleted_at=now(), deleted_status=1 WHERE mr_no='$mr_no'");

// $query2 = "DELETE FROM master_brand WHERE id_brand='$brnd'";
// $base = base64_encode($query2);
// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");

header("location:?page=pending-material-purchase-request");
