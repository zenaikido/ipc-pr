<?php
global $link;
$mr = $_GET['no'];
$rsn = ucwords($_POST['reason']);

$query = mysqli_query($link, "UPDATE mr SET mpr_status=2, reason_rejected='$rsn' WHERE mr_no='$mr'");


header("location:?page=pending-material-purchase-request");
