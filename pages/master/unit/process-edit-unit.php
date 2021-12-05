<?php
global $link;
$unt = ucwords($_POST['unit']);
$usr = $_SESSION['fullname'];
$sluga = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["unit"])));
$slug = $_GET['slug'];


$qcek = "SELECT unit FROM master_unit WHERE unit='" . $unt . "' ";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo " <div class='content'> <div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1></div<br>";
	echo "<a href='?page=unit'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_unit SET unit='$unt', slug='$sluga', edited_by='$usr', edited_at=now() WHERE slug='$slug' ");

	header("location:?page=unit");
}
