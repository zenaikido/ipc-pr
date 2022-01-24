<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="images/Logo 2.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $_SESSION['fullname']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-aqua text-success">MAIN NAVIGATION</li>
        <li> <a href="?"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Master</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    <!-- <span class="label label-primary pull-right">5</span> -->
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="?page=category-cost"><i class="fa fa-circle-o"></i> Category Cost</a></li>
                <li><a href="?page=category-item"><i class="fa fa-circle-o"></i> Category Item</a></li>
                <li><a href="?page=department"><i class="fa fa-circle-o"></i> Department</a></li>
                <li><a href="?page=product"><i class="fa fa-circle-o"></i> Product</a></li>
                <li><a href="?page=supplier"><i class="fa fa-circle-o"></i> Supplier</a></li>
                <li><a href="?page=unit"><i class="fa fa-circle-o"></i> Unit</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>MPR</span>
                <span class=" pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <?php
            global $link;
            $sql_pending = mysqli_query($link, "SELECT mpr_status FROM mr a WHERE mpr_status=1 && deleted_status=0");
            $row_pending = mysqli_num_rows($sql_pending);

            $sql_reject = mysqli_query($link, "SELECT mpr_status FROM mr a WHERE mpr_status=2 && deleted_status=0");
            $row_reject = mysqli_num_rows($sql_reject);
            ?>
            <ul class="treeview-menu">
                <li><a href="?page=approved-of-material-purchase-request"><i class="fa fa-check"></i> Approved</a></li>
                <li><a href="?page=pending-material-purchase-request"><i class="fa fa-hand-paper-o"></i> Pending <span class="label label-primary pull-right"><?= $row_pending; ?></span></a></li>
                <li><a href="?page=rejected-of-mpr"><i class="fa fa-times-circle"></i> Rejected <span class="label label-primary pull-right"><?= $row_reject; ?></span></a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-print"></i> <span>Report</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="?page=report-mpr-approved"><i class="fa fa-circle-o"></i> MPR Approved</a></li>
                <li><a href="?page=report-mpr-rejected"><i class="fa fa-circle-o"></i> MPR Rejected <span class="label label-primary pull-right"></span></a></li>
            </ul>
        </li>

        <?php
        if ($_SESSION['access'] != "View" && $_SESSION['access'] != "Leader") {
        ?>
            <li class="header text-aqua">ADMIN PANEL</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-exchange"></i> <span>Restore</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?page=restore-category-cost"><i class="fa fa-circle-o"></i> Category Cost</a></li>
                    <li><a href="?page=restore-category-item"><i class="fa fa-circle-o"></i> Category Item</a></li>
                    <li><a href="?page=restore-department"><i class="fa fa-circle-o"></i> Department</a></li>
                    <li><a href="?page=restore-approved-material-purchase-request"><i class="fa fa-circle-o"></i> MPR Approved</a></li>
                    <li><a href="?page=restore-pending-material-purchase-request"><i class="fa fa-circle-o"></i> MPR Pending</a></li>
                    <li><a href="?page=restore-product"><i class="fa fa-circle-o"></i> Product</a></li>
                    <li><a href="?page=restore-supplier"><i class="fa fa-circle-o"></i> Supplier</a></li>
                    <li><a href="?page=restore-unit"><i class="fa fa-circle-o"></i> Unit</a></li>

                </ul>
            </li>
            <li><a href="?page=user-management"><i class="fa fa-users"></i> <span>User Management</span></a></li>
            <!-- <li><a href="#"><i class="fa fa-building"></i> <span>Company</span></a></li> -->
        <?php } ?>
        <li><a href="?page=logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->