<?php
global $link;
$dtl = $_GET['detail'];

$sql = mysqli_query($link, "UPDATE master_category_cost SET deleted_status=0 WHERE slug='$dtl'");

header("location:?page=restore-category-cost");
