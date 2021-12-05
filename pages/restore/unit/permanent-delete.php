<?php
global $link;
$dtl = $_GET['slug'];

$sql = mysqli_query($link, "DELETE FROM master_unit WHERE slug='$dtl'");
header("location:?page=restore-unit");
