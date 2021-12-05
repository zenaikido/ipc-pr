<?php
global $link;
$dtl = $_GET['slug_product'];

$sql = mysqli_query($link, "DELETE FROM master_product WHERE slug_product='$dtl'");
header("location:?page=restore-product");
