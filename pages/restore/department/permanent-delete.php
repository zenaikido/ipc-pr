<?php
global $link;
$dtl = $_GET['id_department'];

$sql = mysqli_query($link, "DELETE FROM master_department WHERE id_department='$dtl'");

header("location:?page=restore-department");
