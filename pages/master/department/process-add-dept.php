<?php
global $link;
$dept = ucwords($_POST['department']);
$abbv = strtoupper($_POST['abbreviation']);
$usr = $_SESSION['fullname'];
$slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["department"])));

$qcek = "SELECT department FROM master_department WHERE department='" . $dept . "' || 
														abbreviation='" . $abbv . "'";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo " <div class='content'> <div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1><br>";
	echo "<a href='?page=department'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "INSERT INTO master_department 
												(department,abbreviation,slug,created_by,created_at,deleted_status) 
										VALUES ('$dept','$abbv','$slug','$usr',now(),'0')");


	// $query2 = "INSERT INTO master_department (department,old_department) VALUES ('$dept','$dept')";
	// $base = base64_encode($query2);
	// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");
	header("location:?page=department");
}
