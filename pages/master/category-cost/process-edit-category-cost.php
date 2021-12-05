<?php
global $link;
$cost = ucwords($_POST['category_cost']);
$abbv = strtoupper($_POST['abbreviation']);
$usr = $_SESSION['fullname'];
$sluga = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["category_cost"])));
$slug = $_GET['slug'];

$qcek = "SELECT category_cost FROM master_category_cost WHERE 
															category_cost='" . $cost . "' &&
															abbreviation='" . $abbv . "' ";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

if ($row > 0) {
	echo " <div class='content'> <div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1><br>";
	echo "<a href='?page=category-cost'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
	$query = mysqli_query($link, "UPDATE master_category_cost SET category_cost='$cost', abbreviation='$abbv', slug='$sluga', edited_by='$usr', edited_at=now() WHERE slug='$slug' ");

	header("location:?page=category-cost");
}
