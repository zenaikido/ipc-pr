<?php
global $link;
$supp = ucwords($_POST['supplier']);
$ctry = ucwords($_POST['country']);
$code = $_POST['currency'];
$usr = $_SESSION['fullname'];
$sluga = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["supplier"])));
$slug = $_GET['slug'];

$qcek = "SELECT supplier FROM master_supplier WHERE supplier='" . $supp . "' ";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);

$sql = mysqli_query($link, "UPDATE master_supplier SET supplier='$supp', currency_country='$ctry', currency_code='$code', slug='$sluga', edited_by='$usr', edited_at=now() WHERE slug='$slug' ");

header("location:?page=supplier");
