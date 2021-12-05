<?php
global $link;
$full = ucwords($_POST['fullname']);
$user = strtolower($_POST['username']);
$pass = md5($_POST['password']);
$acc = $_POST['access'];
$dept = $_POST['department'];

$qcek = "SELECT username FROM user WHERE username='" . $user . "'";
$qtpl = mysqli_query($link, $qcek);
$row = mysqli_num_rows($qtpl);
if ($row > 0) {
    echo "<div class='content'><div class='text-center' style='margin-top:10%' ><img src='images/stop.png'><h1>Data Already Exist</h1><br>";
    echo "<a href='?page=user-management'><button class='btn btn-info btn-rounded' style='width:100px;'><b>BACK</b></button></a></div></div>";
} else {
    $sql = mysqli_query($link, "INSERT INTO user (fullname,username,password,access,id_department) VALUES ('$full','$user','$pass','$acc','$dept')");


    header("location:?page=user-management");
}
