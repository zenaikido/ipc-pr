<?php
global $link;
$cost = ucwords($_POST['category_cost']);
$abbv = strtoupper($_POST['abbreviation']);
$usr = $_SESSION['fullname'];
$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["category_cost"])));

$qcek = "SELECT category_cost FROM master_category_cost WHERE category_cost='" . $cost . "'";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo "<div class='content'><div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1><br>";
	echo "<a href='?page=category-cost'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "INSERT INTO master_category_cost 
	(category_cost,abbreviation,slug,created_by,created_at,deleted_status) VALUES 
	('$cost','$abbv','$slug','$usr',now(),'0')");
	header("location:?page=category-cost");
}
