<?php
global $link;
$dtl = $_GET['slug'];

$sql = mysqli_query($link, "UPDATE master_unit SET deleted_status=0 WHERE slug='$dtl'");

header("location:?page=restore-unit");
