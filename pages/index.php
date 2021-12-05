<?php
session_start();
ob_start();
require_once "function/db.php";

// // mencegah direct akses url
if ($_SESSION['fullname'] == "") {
    header("location:../index.php");
}

//Membuat batasan waktu sesion untuk user di PHP 
$timeout = 5; // Set timeout menit
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 600; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('System Logout. You should be login again'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();

?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <?php
    include "linkheader.php";
    $start = microtime(true);
    ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="images/ipc.png" alt=""> </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>MPR - IPC</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <?php
                            global $link;
                            $sql = mysqli_query($link, "SELECT * FROM mr a WHERE mpr_status=1 && deleted_status=0");
                            $row = mysqli_num_rows($sql);
                            ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">
                                    <?php
                                    if ($row == "") {
                                        echo "";
                                    } else {
                                        echo  $row;
                                    }; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?= $row; ?> notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php
                                        if ($row != "") { ?>
                                            <li>
                                                <a href="?page=pending-material-purchase-request">
                                                    <i class="fa fa-users text-aqua"></i> <?= $row; ?> New MPR Pending
                                                </a>
                                            </li>
                                        <?php }; ?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/logo 2.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['fullname']; ?></span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="images/logo 2.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                        <!-- <?php echo $_SESSION['access']; ?>
                                       <small><?php echo $_SESSION['created_at']; ?></small>  -->
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-6 text-center">
                                            <a href="#">Username: <?php echo $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="col-xs-6 text-center">
                                            <a href="#">Access: <?php echo $_SESSION['access']; ?></a>
                                        </div>
                                        <!-- <div class="col-xs-4 text-center">
                                            <a href="#">Department: <?php echo $_SESSION['department']; ?></a>
                                        </div> -->
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="?page=logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <?php include "linksidebar.php"; ?>
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include "linkcontent.php"; ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <?php include "linkfooter.php"; ?>
        </footer>

        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php include "linkscript.php"; ?>

    <!-- sweetalert tidak bisa pisah form -->
    <script src="bower_components/sweetalert/sweetalert.min.js"></script>

    <?php
    global $link;
    $sql = mysqli_query($link, "SELECT * FROM master_supplier WHERE deleted_status=0 ORDER BY supplier ASC");
    $sql2 = mysqli_query($link, "SELECT * FROM master_category_item WHERE deleted_status=0 ORDER BY category_item ASC ");
    $sql3 = mysqli_query($link, "SELECT * FROM master_category_cost WHERE deleted_status=0 ORDER BY category_cost ASC");
    $sql4 = mysqli_query($link, "SELECT * FROM master_product WHERE deleted_status=0 ORDER BY product ASC");

    ?>
    <!-- Untuk Injection -->
    <script>
        function subtotal(id) {
            var qty = $('#qty' + id).val();
            var price = $('#price' + id).val();
            var total = (parseInt(qty) * parseInt(price));
            $('#total' + id).val(total);
        }
        //Untuk add table dinamis di DO
        $('.addnew').click(function() {
            var rowCount = $('#myTable tr').length + 1;
            var table = document.getElementById("myTable");
            var rowPlus = $('#myTable tr').length;
            var row = table.insertRow(rowPlus);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);
            var cell10 = row.insertCell(9);
            var cell11 = row.insertCell(10);
            var cell12 = row.insertCell(11);
            // var cell13 = row.insertCell(12);

            // alert(rowPlus);
            cell1.innerHTML = rowPlus;
            cell1.className = 'rowNo rowNo' + rowPlus;

            cell2.innerHTML = "<select class='js-example-basic-single form-control' style='width:100%;' name='supplier[]' id='supplier" + rowPlus + "' required><option selected='' disabled=''>Choose</option><?php while ($data = mysqli_fetch_array($sql)) { ?>   <option value='<?= $data['id_supplier']; ?>' item='<?= $data['supplier']; ?>'><?= $data['supplier']; ?></option>  <?php } ?> </select>";

            cell3.innerHTML = "<select class='js-example-basic-single form-control' style='width:100%;' name='category_item[]' id='category_item" + rowPlus + "' required><option selected='' disabled=''>Choose</option><?php while ($data2 = mysqli_fetch_array($sql2)) { ?>   <option value='<?= $data2['id_category_item']; ?>' item='<?= $data2['category_item']; ?>'><?= $data2['category_item']; ?></option>  <?php } ?> </select>";

            cell4.innerHTML = "<select class='js-example-basic-single form-control' name='category_cost[]' id='category_cost" + rowPlus + "' required><option selected='' disabled=''>Choose</option><?php while ($data3 = mysqli_fetch_array($sql3)) { ?>   <option value='<?= $data3['id_category_cost']; ?>' item='<?= $data3['category_cost']; ?>'><?= $data3['category_cost']; ?></option>  <?php } ?> </select>";

            cell5.innerHTML = "<select class='js-example-basic-single form-control' style='width:100%;' name='product[]' id='product" + rowPlus + "' required><option selected='' disabled=''>Choose</option><?php while ($data4 = mysqli_fetch_array($sql4)) { ?>   <option value='<?= $data4['id_product']; ?>' product='<?= $data4['product']; ?>'><?= $data4['product']; ?></option>  <?php } ?> </select>";

            cell6.innerHTML = "<input type='text' id='qty" + rowPlus + "' class='form-control' onfocusout='subtotal(" + rowPlus + ")' name='qty[]' style='text-align:center' required>";

            cell7.innerHTML = "<input type='text' id='price" + rowPlus + "' class='form-control' onfocusout='subtotal(" + rowPlus + ")' name='price[]' required>";

            cell8.innerHTML = "<input type='text' id='total" + rowPlus + "' readonly class='form-control  input-element' onfocusout='subtotal(" + rowPlus + ")' name='total[]' style='text-align:center' >";

            cell9.innerHTML = "<input type='number'" + rowPlus + "' class='form-control' name='delqty[]'>";

            cell10.innerHTML = "<input type='date'" + rowPlus + "' class='form-control' name='deleta[]' style='text-align:center'>";

            // cell11.innerHTML = "<input type='text'" + rowPlus + "' class='form-control' name='po[]'>";

            cell11.innerHTML = "<input type='text'" + rowPlus + "' class='form-control' name='remarks[]' required=''>";

            cell12.innerHTML = "<button class='delete btn-danger' onClick='deleteRow(" + rowPlus + ")' style='text-align:center'>Delete</button>";
            $(".js-example-basic-single").select2();

        });

        function deleteRow(rowId) {

            var rowCount = $('#myTable tr').length - 1;
            var table = document.getElementById("myTable");
            var rowPlus = $('#myTable tr').length;
            var row = table.deleteRow(rowId);

            var rowNo = $('.rowNo').length;
            // alert(rowNo);
            for (var i = 1; i <= rowNo; i++) {

                myTable.rows[i].cells[0].innerHTML = i;
                myTable.rows[i].cells[11].innerHTML = "<button type='button' class='delete btn-danger' onClick='deleteRow(" + i + ")' style='text-align:center'> Delete </button>";;
            }
        }
    </script>

    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>

    <script src="http://www.ilmuwebsite.com/tutorial/js/cleave/cleave.min.js"></script>
    <script type="text/javascript">
        var cleave = new Cleave('.input-element', {
            numeral: true,
            numeralDecimalMark: 'thousand',
            delimiter: ','
        });
    </script>

    <?php
    $finish = microtime(true);
    print 'Page generated in : ' . round(($finish - $start) * 1000, 2) . ' <small>-ms</small>';
    ?>
</body>

</html>