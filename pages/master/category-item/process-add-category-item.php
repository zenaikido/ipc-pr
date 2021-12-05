<?php
global $link;
$item = ucwords($_POST['category_item']);
$abbv = strtoupper($_POST['abbreviation']);
$usr = $_SESSION['fullname'];
$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["category_item"])));

$qcek = "SELECT category_item FROM master_category_item WHERE category_item='" . $item . "'";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo "<div class='content'><div class='text-center' style='margin-top:10%' ><img src='img/stop.png'><h1>Data Already Exist</h1><br>";
	echo "<a href='?page=category-item'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "INSERT INTO master_category_item (category_item,abbreviation,slug,created_by,created_at,deleted_status) VALUES ('$item','$abbv','$slug','$usr',now(),'0')");
	// var_dump("INSERT INTO master_category_item (category_item,abbreviation,slug,created_by,created_at,deleted_status) VALUES ('$item','$abbv','$slug','$usr',now(),'')");
	// exit;

	// $query2 = "INSERT INTO master_category_item (category_item,old_category_item) VALUES ('$item','$item')";
	// $base = base64_encode($query2);
	// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");
	header("location:?page=category-item");
}
