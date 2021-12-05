<?php
$lok = 'localhost';
$user = 'root';
$pass = '';
$db = 'ipc_pr';

$link = mysqli_connect($lok, $user, $pass, $db) or die(mysqli_error());
