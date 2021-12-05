<?php
global $link;
$dtl = $_GET['id_category_cost'];

$sql = mysqli_query($link, "DELETE FROM master_category_cost WHERE id_category_cost='$dtl'");
header("location:?page=restore-category-cost");
