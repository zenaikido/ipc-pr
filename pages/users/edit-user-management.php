<?php
global $link;
$user = $_GET['slug'];
$sql = mysqli_query($link, "SELECT * FROM user a INNER JOIN master_department b ON a.id_department=b.id_department WHERE username='" . $user . "'");
$data = mysqli_fetch_array($sql);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Page Category Item
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master</a></li>
        <li class="active">Edit Page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <form action="?page=edit-user&slug=<?= $data['username']; ?>" method="POST">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $data['fullname']; ?>" name="fullname" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-10">
                        <select name="department" class="form-control" required>
                            <option value="<?= $data['id_department'] ?>"><?= $data['department'] ?></option>
                            <?php
                            $sql_dep = mysqli_query($link, "SELECT * FROM master_department ORDER BY department ASC");
                            while ($data_dep = mysqli_fetch_array($sql_dep)) {;
                            ?>
                                <?php
                                if ($data['department'] != $data_dep['department']) {; ?>
                                    <option value="<?= $data_dep['id_department'] ?>"><?= $data_dep['department']; ?></option>
                                <?php }; ?>
                            <?php }; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $data['username']; ?>" name="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Access</label>
                    <div class="col-sm-10">
                        <select name="access" required>

                            <option value="<?= $data['access']; ?>" selected><?= $data['access']; ?></option>
                            <?php
                            if ($data['access'] != "Admin") {;
                            ?>
                                <option value="Admin">Admin</option>
                            <?php }; ?>
                            <?php
                            if ($data['access'] != "Leader") {;
                            ?>
                                <option value="Leader">Leader</option>
                            <?php }; ?>
                            <?php
                            if ($data['access'] != "User") {;
                            ?>
                                <option value="User">User</option>
                            <?php }; ?>
                            <?php
                            if ($data['access'] != "View") {;
                            ?>
                                <option value="View">View</option>
                            <?php }; ?>
                        </select>
                    </div>
                </div>

                <div class=" form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <a href="?page=user-management"><button type="button" class="btn btn-default">Cancel</button></a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </form>

            <div class="box-footer">
            </div>

        </div>
</section>