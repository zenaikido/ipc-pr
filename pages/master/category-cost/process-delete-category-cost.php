<?php
global $link;
$id_category_cost = $_GET['id_category_cost'];
$usr = $_SESSION['fullname'];

$sqlcek = mysqli_query(
	$link,
	"SELECT * FROM master_category_cost a
	INNER JOIN mr_detail b
	ON a.id_category_cost=b.id_category_cost
	WHERE a.id_category_cost=$id_category_cost"
);
// var_dump("SELECT * FROM master_category_cost a
// 	INNER JOIN mr_detail b
// 	ON a.id_category_cost=b.id_category_cost
// 	WHERE b.id_category_cost=$id_category_cost");
// exit;
$row = mysqli_num_rows($sqlcek);


if ($row > 0) {
	echo " <div class='content'> <div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Can't Delete, Data Already Used at MPR</h1><br>";
	echo "<a href='?page=category-cost'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_category_cost SET deleted_status=1, deleted_by='$usr', deleted_at=now() WHERE id_category_cost='$id_category_cost'");

	// $query2 = "DELETE FROM master_category_cost WHERE id_brand='$brnd'";
	// $base = base64_encode($query2);
	// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");

	header("location:index.php?page=category-cost");
}
