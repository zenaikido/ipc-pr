<?php
global $link;
$dtl = $_GET['id_category_item'];

$sql = mysqli_query($link, "DELETE FROM master_category_item WHERE id_category_item='$dtl'");
header("location:?page=restore-category-item");
