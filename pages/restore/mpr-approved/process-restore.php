<?php
global $link;
$dtl = $_GET['no'];

$sql = mysqli_query($link, "UPDATE mr SET deleted_status=0 WHERE mr_no='$dtl'");

header("location:?page=restore-approved-material-purchase-request");
