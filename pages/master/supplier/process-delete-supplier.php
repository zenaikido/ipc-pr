<?php
global $link;
$slug = $_GET['slug'];
$usr = $_SESSION['fullname'];

$sqlcek = mysqli_query(
	$link,
	"SELECT * FROM master_supplier a
	INNER JOIN mr_detail b
	ON a.id_supplier=b.id_supplier
	WHERE a.slug='$slug'"
);
$row = mysqli_num_rows($sqlcek);

if ($row > 0) {
	echo "<div class='text-center' style='padding-top:10%'><img src='images/stop.png'><h1>Can't Delete the Master Supplier !!!<br>
	Data Used at Material Purchase Request</h1><br>";
	echo "<a href='index.php?page=supplier'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_supplier SET deleted_by='$usr', deleted_at=now(), deleted_status=1 WHERE slug='$slug'");


	header("location:index.php?page=supplier");
}
