<?php
global $link;
$mrno = $_GET['no'];
$mpr_status = 0;
$usr = $_SESSION['fullname'];

$sql = mysqli_query($link, "UPDATE mr SET mr_no='$mrno',  mpr_status='$mpr_status', approved_by='$usr', approved_at=now(), deleted_status=0 WHERE mr_no='$mrno' ");


header("location:?page=approved-of-material-purchase-request");
