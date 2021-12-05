<?php
global $link;
$dtl = $_GET['slug'];

$sqlcek = mysqli_query(
	$link,
	"SELECT * FROM master_unit a
	INNER JOIN master_product b
	ON a.id_unit=b.id_master_unit
	WHERE a.slug='$dtl'"
);
$row = mysqli_num_rows($sqlcek);

if ($row > 0) {
	echo "<div class='text-center' style='padding-top:10%'><img src='images/stop.png'><h1>Can't Delete the Master Supplier !!!<br>
	Data Used at Material Purchase Request</h1><br>";
	echo "<a href='?page=unit'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_unit SET deleted_status=1 WHERE slug='$dtl'");

	// $query2 = "DELETE FROM master_brand WHERE id_brand='$brnd'";
	// $base = base64_encode($query2);
	// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");

	header("location:?page=unit");
}
