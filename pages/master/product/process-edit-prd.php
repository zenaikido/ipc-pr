<?php
global $link;
$prd = ucwords($_POST['product']);
$unt = $_POST['unit'];
$usr = $_SESSION['fullname'];
$sluga = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["product"])));
$slug = $_GET['slug'];

$l = $_POST['lenght'];
$w = $_POST['width'];
$h = $_POST['height'];

$qcek = "SELECT product FROM master_product WHERE 
											product='" . $prd . "' && 
											id_master_unit='" . $unt . "' && 
											lenght='" . $l . "' && 
											width='" . $w . "' && 
											height='" . $h . "' ";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo " <div class='content'> <div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1></div<br>";
	echo "<a href='?page=product'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_product SET 
														product='$prd', 
														id_master_unit='$unt', 
														lenght='$l', 
														width='$w', 
														height='$h', 
														slug_product='$sluga', 
														edited_by='$usr', 
														edited_at=now() 
														WHERE slug_product='$slug' ");

	header("location:?page=product");
}
