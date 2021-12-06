<?php
global $link;
$mrno = $_GET['no'];
$id_dept = $_POST['id_department'];
$usr = $_SESSION['fullname'];

$query1 = mysqli_query($link, "UPDATE mr SET id_department='$id_dept', edited_by='$usr', edited_at=now(), deleted_status=0, mpr_status=1 WHERE mr_no='$mrno'");

// tujuannya adalah agar data bisa di edit, jadi dihapus dlu yg ada lalu di insert sama data dibawah
$sql = mysqli_query($link, "DELETE FROM mr_detail WHERE mr_no='$mrno'");

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
	$sql2 = mysqli_query($link, "INSERT INTO mr_detail 
	(mr_no, id_department, id_supplier, id_category_item, id_category_cost, id_product, qty, unit_price, total, devreq_qty, devreq_eta, remarks) VALUES 
	('$mrno', '$id_dept', '$supp[$i]', '$item[$i]', '$cost[$i]', '$prod[$i]', '$qty[$i]', '$price[$i]', '$tot[$i]', '$delqty[$i]', '$deleta[$i]', '$remarks[$i]')");
}



// $query2 = "INSERT INTO m_dept (id_category,old_id_category) VALUES ('$dept','$dept')";
// $base = base64_encode($query2);
// $str = mysqli_query($link, "INSERT INTO log_activity (process,user,time) VALUES ('$base','$_SESSION[fullname]',now())");
header("location:?page=pending-material-purchase-request");
