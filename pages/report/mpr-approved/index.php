<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        PRINT REPORT
        <small>MPR APPROVED</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Report</a></li>
        <li class="active">MPR Approved</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="form-group">

            </div>
            <input class="form-group" type="date" name="dari">
            <a href="" class="btn btn-success"><i class="fa fa-search"></i> Search</a>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form action="?page=add-chemical-family" method="POST">
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <img src="images/ipc.png" class="gambartengah" style="width: 150px;">
                                <h4 class="modal-title" style="text-align: center;">Add Data Chemical Family</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Chemical Family</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="chemfamily" required>
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
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->