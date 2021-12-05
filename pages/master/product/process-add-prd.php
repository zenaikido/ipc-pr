<?php
global $link;
$prd = ucwords($_POST['product']);
$unt = $_POST['unit'];
$usr = $_SESSION['fullname'];
$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["product"])));

$l = $_POST['lenght'];
$w = $_POST['width'];
$h = $_POST['height'];

$qcek = "SELECT product FROM master_product WHERE product='" . $prd . "'";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo "<div class='content'><div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1><br>";
	echo "<a href='?page=product'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "INSERT INTO master_product (product,id_master_unit,lenght,width,height,slug_product,created_by,created_at,deleted_status) 
					VALUES ('$prd','$unt','$l','$w','$h','$slug','$usr',now(),'0')");
	// var_dump("INSERT INTO master_product (product,slug,lenght,width,height,created_by,created_at,deleted_status) VALUES ('$prd','$l','$w','$h','$slug','$usr',now(),'')");
	// exit;
	// $query2 = "INSERT INTO master_product (product,old_product) VALUES ('$prd','$prd')";
	// $base = base64_encode($query2);
	// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");
	header("location:?page=product");
}
