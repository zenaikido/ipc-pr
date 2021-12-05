<?php
global $link;
$dtl = $_GET['mr_no'];

$sql = mysqli_query($link, "DELETE FROM mr WHERE mr_no='$dtl'");
$sql = mysqli_query($link, "DELETE FROM mr_detail WHERE mr_no='$dtl'");
header("location:?page=restore-approved-material-purchase-request");
