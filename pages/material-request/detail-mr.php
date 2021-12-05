<section class="content-header">
    <h1>
        Detail Page MPR
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Detail Page</a></li>
        <li class="active">Detail MPR</li>
    </ol>
</section>

<?php
global $link;
$no = $_GET['detail'];
$sql_user = mysqli_query($link, "SELECT * FROM user a
                    INNER JOIN master_department b
                    ON a.id_department=b.id_department
                    WHERE fullname='" . $_SESSION['fullname'] . "'");
$duser = mysqli_fetch_array($sql_user);

$sql_all = mysqli_query($link, "SELECT * FROM mr_detail a
								INNER JOIN master_department c
								ON a.id_department=c.id_department
								INNER JOIN master_supplier d
								ON a.id_supplier=d.id_supplier
								INNER JOIN master_category_item e
								ON a.id_category_item=e.id_category_item
								INNER JOIN master_category_cost f
								ON a.id_category_cost=f.id_category_cost
								INNER JOIN master_product g
								ON a.id_product=g.id_product
                                INNER JOIN mr h
                                ON a.mr_no=h.mr_no
                                INNER JOIN master_unit i
								ON g.id_master_unit=i.id_unit
								WHERE a.mr_no=$no");
$data_all = mysqli_fetch_array($sql_all);

?>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">MPR No.</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="department" value="<?= $duser['abbreviation'] ?>-<?= $data_all['mr_no'] ?>" readonly>
                    <input type="hidden" class="form-control" name="id_department" value="<?= $duser['id_department']  ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Created by</label>
                <div class="col-sm-5">
                    <?php
                    $sql_crt = mysqli_query($link, "SELECT created_by,created_at,edited_by,edited_at,approved_by,approved_at FROM mr WHERE mr_no='$no'");
                    $data_crt = mysqli_fetch_array($sql_crt);
                    ?>
                    <input type="text" class="form-control" value="<?= $data_crt['created_by']; ?> &nbsp;| <?= $data_crt['created_at'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Edited by</label>
                <div class="col-sm-5">
                    <?php
                    $sql_edt = mysqli_query($link, "SELECT * FROM mr WHERE mr_no='$no'");
                    $dedt = mysqli_fetch_array($sql_edt);
                    ?>
                    <input type="text" class="form-control" value="<?= $dedt['edited_by']; ?> &nbsp;| <?= $dedt['edited_at'] ?>" readonly>
                    <input type="hidden" class="form-control" name="mr" value="<?= $dedt['mr_no']  ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Status</label>
                <div class="col-sm-5">
                    <?php if ($data_all['mpr_status'] == 0) { ?>
                        <i class="form-control font-weight-bold" readonly>Approved !!! by <?= $dedt['approved_by']; ?> | <?= $dedt['approved_at']; ?></i>
                    <?php }; ?>
                    <?php if ($data_all['mpr_status'] == 1) { ?>
                        <i class="form-control font-weight-bold" readonly>Need to Approve !!!</i>
                        <?php if ($_SESSION['access'] != "View") { ?>
                            <a href="?page=approval&no=<?= $data_all['mr_no'] ?>"><button type="button" class="btn btn-success fa fa-thumbs-o-up"> Approve It</button></a> &nbsp;
                            <a href="#" class="btn btn-danger fa fa-times-circle" data-toggle="modal" data-target="#modal-default"> Reject It</a>
                        <?php }; ?>
                    <?php }; ?>
                    <?php
                    if ($data_all['mpr_status'] == 2) {; ?>
                        <i class="form-control font-weight-bold" readonly>Rejected cause <?= $dedt['reason_rejected']; ?></i>
                    <?php }; ?>

                    <br>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td style="text-align: center">NO</td>
                                <td style="text-align: center">SUPPLIER</td>
                                <td style="text-align: center">CTG.ITEM</td>
                                <td style="text-align: center">CTG.COST</td>
                                <td style="text-align: center;">PRODUCT DESCRIPTION</td>
                                <td style="text-align: center">QTY (Q)</td>
                                <td style="text-align: center">UNIT PRICE (P)</td>
                                <td style="text-align: center">TOTAL (Q x P)</td>
                                <td style="text-align: center">DELV.REQ.QTY</td>
                                <td style="text-align: center">DELV.ETA</td>
                                <td style="text-align: center">REMARKS</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            do {
                                $i++; ?>
                                <tr>
                                    <td class="rowNo rowNo<?php echo $i ?>"><?php echo $i ?></td>
                                    <td>
                                        <input type='text' class='form-control' value="<?= $data_all['supplier']; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control' value="<?= $data_all['category_item']; ?>" readonly>

                                    </td>
                                    <td>
                                        <input type='text' class='form-control' value="<?= $data_all['category_cost']; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control' value="<?= $data_all['product']; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control' name='qty' style='text-align:center' value="<?= number_format($data_all['qty'], 0, ".", ","); ?> <?= $data_all['unit']; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type=' text' class='form-control' name='price' value="<?= $data_all['currency_code']; ?> <?= number_format($data_all['unit_price'], 0, ".", ",") ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control' name='total' value="<?= $data_all['currency_code']; ?> <?= number_format($data_all['total'], 2, ".", ","); ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class=' form-control' name='delqty' style='text-align:center' value=" <?= number_format($data_all['devreq_qty'], 0, ".", ","); ?> <?= $data_all['unit']; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control' name='deleta' style='text-align:center' value="<?= $data_all['devreq_eta']; ?>" readonly>
                                    </td>
                                    <td>
                                        <input type='text' class='form-control' name='remarks' style='text-align:center' value="<?= strtoupper($data_all['remarks']); ?>" readonly>
                                    </td>
                                </tr>
                            <?php } while ($data_all = mysqli_fetch_array($sql_all)); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>

            <div class="form-group row">
                <label class="col-sm-1 col-form-label">Total Price</label>
                <div class="col-sm-5">
                    <?php
                    $query_sum = mysqli_query($link, "SELECT SUM(total) FROM mr_detail WHERE mr_no='$no'");
                    $data_sum = mysqli_fetch_array($query_sum);
                    $result = $data_sum[0];
                    ?>
                    <input type="text" class="form-control" value="<?= number_format($result, 2, ".", ","); ?>" readonly>
                </div>
            </div>

            <div class=" form-group row">
                <label for="inputPassword3" class="col-sm-1 col-form-label"></label>
                <div class="col-sm-10">
                    <?php
                    $query_mpr = mysqli_query($link, "SELECT * FROM mr WHERE mr_no='$no'");
                    $data_mpr = mysqli_fetch_array($query_mpr);
                    if ($data_mpr['mpr_status'] == 1) {; ?>
                        <a href="?page=pending-material-purchase-request"><button type="button" class="btn btn-default fa fa-mail-reply"> Back</button></a>&nbsp;&nbsp;&nbsp;
                    <?php } else { ?>
                        <a href="?page=approved-of-material-purchase-request"><button type="button" class="btn btn-default fa fa-mail-reply"> Back</button></a>&nbsp;&nbsp;&nbsp;
                    <?php }; ?>
                    <?php if ($_SESSION['access'] != "View") { ?>
                        <a href="?page=page-edit-material-purchase-request&no=<?= $data_mpr['mr_no'] ?>"> <button type="submit" class="btn btn-primary fa fa-edit"> Edit</button></a>&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                    <?php
                    if ($data_mpr['mpr_status'] == 0) { ?>
                        <a href="material-request/approved/print-mr.php?no=<?= $data_mpr['mr_no'] ?>" target=_blank><button class="btn btn-success fa fa-print"> Print</button></a>
                    <?php } ?>

                </div>
            </div>

            <div class="box-footer">
            </div>

        </div>
</section>

<form action="?page=rejected-of-material-purchase-request&no=<?= $data_mpr['mr_no'] ?>" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <img src="images/reject.jif" class="gambartengah" style="width: 150px;">

                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <h3 class="col-sm-12 col-form-label" style="text-align: center;">Please fill the reason</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Reason</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="reason" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>