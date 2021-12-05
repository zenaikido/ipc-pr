<?php
global $link;
$dtl = $_GET['slug'];

$sql = mysqli_query($link, "DELETE FROM master_supplier WHERE slug='$dtl'");
header("location:?page=restore-supplier");
