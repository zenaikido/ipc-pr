<?php
global $link;
$dtl = $_GET['slug'];

$sql = mysqli_query($link, "UPDATE master_category_item SET deleted_status=0 WHERE slug='$dtl'");

header("location:?page=restore-category-item");
