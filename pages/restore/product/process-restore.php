<?php
global $link;
$dtl = $_GET['slug'];

$sql = mysqli_query($link, "UPDATE master_product SET deleted_status=0 WHERE slug_product='$dtl'");

header("location:?page=restore-product");
