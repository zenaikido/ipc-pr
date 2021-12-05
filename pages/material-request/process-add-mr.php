<?php
global $link;
$mrno = $_POST['mr_no'];
$id_dept = $_POST['id_department'];
$mpr_status = 1;
$usr = $_SESSION['fullname'];

$sql = mysqli_query($link, "INSERT INTO mr (mr_no, id_department, mpr_status, created_by, created_at, deleted_status) 
									VALUES ('$mrno', '$id_dept', '$mpr_status', '$usr', now(),'0')");

$supp = $_POST['supplier'];
$item = $_POST['category_item'];
$cost = $_POST['category_cost'];
$prod = $_POST['product'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$tot = $_POST['total'];
$delqty = $_POST['delqty'];
$deleta = $_POST['deleta'];
$remarks = $_POST['remarks'];

for ($i = 0; $i <= count($supp) - 1; $i++) {
	$sql2 = mysqli_query($link, "INSERT INTO mr_detail (mr_no, id_department, id_supplier, id_category_item, id_category_cost, id_product, qty, unit_price, total, devreq_qty, devreq_eta, remarks) 
	VALUES ('$mrno', '$id_dept', '$supp[$i]', '$item[$i]', '$cost[$i]', '$prod[$i]', '$qty[$i]', '$price[$i]', '$tot[$i]', '$delqty[$i]', '$deleta[$i]',  '$remarks[$i]')");

	// var_dump("INSERT INTO mr_detail (mr_no, id_department, id_supplier, id_category_item, id_category_cost, id_product, qty, unit_price, total, devreq_qty, devreq_eta, remarks) 
	// VALUES ('$mrno', '$id_dept', '$supp[$i]', '$item[$i]', '$cost[$i]', '$prod[$i]', '$qty[$i]', '$price[$i]', '$tot[$i]', '$delqty[$i]', '$deleta[$i]',  '$remarks[$i]')");
	// exit;
}

header("location:?page=pending-material-purchase-request");
