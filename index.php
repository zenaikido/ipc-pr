<?php
ob_start();
session_start();
require_once "pages/function/db.php";

//cek user apakah sudah login, agar tidak bisa di back ke login
if (isset($_SESSION['username'])) header("location:pages/index.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>MPR | Purchase</title>
    <link rel="icon" href="pages/images/logo 2.jpg" sizes="16x16" type="image/png">
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery.min.js"></script>
</head>

<body>
    <form class="login-form" action="index.php?page=login&op=in" method="POST">
        <h1>Login <a style="color: red;">Form</a></h1>
        <a href="index.php"><img src="pages/images/ipc.png" class=""> </a>
        <div class="txtb">
            <input type="text" name="username" autofocus>
            <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
            <input type="password" name="password">
            <span data-placeholder="Password"></span>
        </div>

        <input type="submit" class="logbtn" value="Login" name="">
        <!-- 	<div class="bottom-text">
			Don't have account ? <a href="mailto:rauf@ipcompound.co.id">Sign up</a>
		</div> -->

        <?php
        $page = (isset($_GET['page'])) ? $_GET['page'] : "main";
        switch ($page) {
            case 'login':
                include "process-login.php";
                break;
        }
        ?>

    </form>
    <script type="text/javascript">
        $(".txtb input").on("focus", function() {
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function() {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        });
    </script>

</body>

</html>