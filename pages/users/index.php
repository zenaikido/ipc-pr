<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Management
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="active">User Management</a></li>
        <!-- <li class="active">Category Item</li> -->
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <div class="box-tools pull-right">
                <div class="title-action">
                    <?php if ($_SESSION['access'] != "View") { ?>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Add Data</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th>FULL NAME</th>
                                <th>DEPARTMENT</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>ACCESS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                global $link;
                                $sql = mysqli_query($link, "SELECT * FROM user a 
                                                                INNER JOIN master_department b 
                                                                ON a.id_department=b.id_department ");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= $data['fullname']; ?></td>
                                    <td><?= $data['department']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td> <i class="fa fa-lock"> Protected</i> </td>
                                    <td><?= $data['access']; ?></td>
                                    <td>
                                        <?php if ($_SESSION['access'] != "View") { ?>
                                            <a href="?page=page-edit-user-management&slug=<?= $data['username']; ?>">
                                                <button class="btn btn-rounded btn-info fa fa-edit"> Edit</button>
                                            </a>
                                            <?php if ($_SESSION['access'] == "Leader" || $_SESSION['access'] == "Admin") { ?>
                                                <button class="btn btn-rounded btn-danger fa fa-trash-o" href="javascript:" title="Delete" onclick="return cek('<?= $data['username']; ?>');"> Delete</button>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="box box-footer">
        </div>
    </div>
</section>

<form action="?page=add-user" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <img src="images/ipc.png" class="gambartengah" style="width: 150px;">
                    <h4 class="modal-title" style="text-align: center;">Add Data User</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fullname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                            <select name="department" class="form-control" required>
                                <option selected disabled>Select Department</option>
                                <?php
                                $sql_dep = mysqli_query($link, "SELECT * FROM master_department ORDER BY department ASC");
                                while ($data_dep = mysqli_fetch_array($sql_dep)) {;
                                ?>
                                    <option value="<?= $data_dep['id_department'] ?>"><?= $data_dep['department']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Access</label>
                        <div class="col-sm-10">
                            <select name="access" required>
                                <option disabled selected>Choose</option>
                                <option value="Admin">Admin</option>
                                <option value="Leader">Leader</option>
                                <option value="User">User</option>
                                <option value="View">View</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>

<script type="text/javascript">
    <?php if (isset($_SESSION['status'])) { ?>
        <?php if ($_SESSION['status'] == 'success') { ?>
            $(document).ready(function() {
                swal("Poof! Your imaginary data has been deleted!", {
                    icon: "success",

                });
            })
        <?php
            $_SESSION['status'] = '';
        } elseif ($_SESSION['status'] == 'error') { ?>
            $(document).ready(function() {
                swal("Can't Delete! The Item Used in Delivery Order", {
                    icon: "error",

                });
            })
    <?php
            $_SESSION['status'] = "";
        }
    } ?>

    function cek(username) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,

            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary data has been deleted!", {
                        icon: "success",

                    });
                    var location = "?page=delete-user&username=" + username;
                    setTimeout('window.location.href="' + location + '"', 1000);
                    return true;
                } else {
                    swal("Your imaginary data is safe!");
                    // return false;

                }
            });
    };
</script>