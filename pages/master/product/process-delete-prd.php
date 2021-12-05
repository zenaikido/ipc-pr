<?php
global $link;
$slug = $_GET['slug_product'];

$sqlcek = mysqli_query(
	$link,
	"SELECT * FROM master_product a
	INNER JOIN mr_detail b
	ON a.id_product=b.id_product
	WHERE a.slug_product='$slug'"
);
$row = mysqli_num_rows($sqlcek);

if ($row > 0) {
	echo " <div class='content'> <div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Can't Delete, Data Already Used at MPR</h1><br>";
	echo "<a href='?page=product'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_product SET deleted_status=1 WHERE slug_product='$slug'");

	// $query2 = "DELETE FROM master_brand WHERE id_brand='$brnd'";
	// $base = base64_encode($query2);
	// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");

	header("location:?page=product");
}
