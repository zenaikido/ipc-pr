<section class="content-header">
    <h1>
        Edit Page MPR
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Edit Page</a></li>
        <li class="active">Edit MPR</li>
    </ol>
</section>

<?php
global $link;
$no = $_GET['no'];
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
								WHERE a.mr_no=$no");
$data_all = mysqli_fetch_array($sql_all);
?>

<section class="content">
    <div class="box">
        <div class="box-body">
            <form action="?page=edit-material-purchase-request&no=<?= $data_all['mr_no'] ?>" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">MPR No.</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="department" value="<?= $duser['abbreviation']  ?>" readonly>
                        <input type="hidden" class="form-control" name="id_department" value="<?= $duser['id_department']  ?>" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="mr_no" class="form-control" value="<?= $data_all['mr_no'] ?>" readonly>

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Created by</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $data_all['created_by']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Created at</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $data_all['created_at'] ?>" readonly>
                    </div>
                </div>

                <button class="addnew btn btn-primary" type="button">Add</button>
                <table border="1" class="col-xs-12" id="myTable" style="margin-bottom: 20px;">
                    <tr>
                        <td style="text-align: center">NO</td>
                        <td style="text-align: center">SUPPLIER</td>
                        <td style="text-align: center">CTG.ITEM</td>
                        <td style="text-align: center">CTG.COST</td>
                        <td style="text-align: center">PRODUCT DESCRIPTION</td>
                        <td style="text-align: center">QUANTITY</td>
                        <td style="text-align: center">UNIT PRICE</td>
                        <td style="text-align: center">TOTAL</td>
                        <td style="text-align: center">DELV.REQ.QTY</td>
                        <td style="text-align: center">DELV.ETA</td>
                        <!-- <td style="text-align: center">PO</td> -->
                        <td style="text-align: center">REMARKS</td>
                        <td style="text-align: center">ACTION</td>
                    </tr>
                    <tbody>
                        <?php
                        $i = 0;
                        do {
                            $i++; ?>
                            <tr>
                                <td class="rowNo rowNo<?php echo $i ?>"><?php echo $i ?></td>
                                <td>
                                    <?php
                                    $sql_supp = mysqli_query($link, "SELECT * FROM master_supplier WHERE deleted_status=0 ORDER BY supplier ASC");
                                    ?>
                                    <select class='js-example-basic-single form-control' style='width:100%;' name='supplier[]' id='supplier" + rowPlus + "' required>
                                        <option value='<?= $data_all['id_supplier']; ?>' item='<?= $data_all['supplier']; ?>'><?= $data_all['supplier']; ?></option>
                                        <?php while ($data_supp = mysqli_fetch_array($sql_supp)) { ?>
                                            <option value='<?= $data_supp['id_supplier']; ?>' item='<?= $data_supp['supplier']; ?>'><?= $data_supp['supplier']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <?php
                                    $sql_item = mysqli_query($link, "SELECT * FROM master_category_item WHERE deleted_status=0 ORDER BY category_item ASC ");
                                    ?>
                                    <select class='js-example-basic-single form-control' style='width:100%;' name='category_item[]' id='category_item" + rowPlus + "' required>
                                        <option value="<?= $data_all['id_category_item']; ?>" selected=''>
                                            <?= $data_all['category_item']; ?>
                                        </option>
                                        <?php while ($data_item = mysqli_fetch_array($sql_item)) { ?>
                                            <option value='<?= $data_item['id_category_item']; ?>' item='<?= $data_item['category_item']; ?>'><?= $data_item['category_item']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <?php
                                    $sql_cost = mysqli_query($link, "SELECT * FROM master_category_cost WHERE deleted_status=0 ORDER BY category_cost ASC");
                                    ?>
                                    <select class='js-example-basic-single form-control' style='width:100%;' name='category_cost[]' id='category_cost" + rowPlus + "' required>
                                        <option value="<?= $data_all['id_category_cost']; ?>" selected=''><?= $data_all['category_cost']; ?></option>
                                        <?php while ($data_cost = mysqli_fetch_array($sql_cost)) { ?>
                                            <?php if ($data_all['category_cost'] != $data_cost['category_cost']) { ?>
                                                <option value='<?= $data_cost['id_category_cost']; ?>' item='<?= $data_cost['category_cost']; ?>'><?= $data_cost['category_cost']; ?>
                                                </option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <?php
                                    $sql_prd = mysqli_query($link, "SELECT * FROM master_product WHERE deleted_status=0 ORDER BY product ASC");
                                    ?>
                                    <select class='js-example-basic-single form-control' style='width:100%;' name='product[]' id='product" + rowPlus + "'>
                                        <option value="<?= $data_all['id_product']; ?>" item='<?= $data_all['product']; ?>'><?= $data_all['product']; ?></option>
                                        <?php while ($data_prd = mysqli_fetch_array($sql_prd)) { ?>
                                            <option value='<?= $data_prd['id_product']; ?>' product='<?= $data_prd['product']; ?>'><?= $data_prd['product']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type='text' id='qty<?= $i ?>' class='form-control' onfocusout='subtotal(<?= $i ?>)' name='qty[]' style='text-align:center;' value="<?= $data_all['qty']; ?>">
                                </td>
                                <td>
                                    <input type='text' id='price<?= $i ?>' class='form-control' onfocusout='subtotal(<?= $i ?>)' name='price[]' style='text-align:center;' value="<?= $data_all['unit_price'] ?>">
                                </td>
                                <td>
                                    <input type='text' id='total<?= $i ?>' readonly class='form-control ' onfocusout='subtotal(<?= $i ?>)' name='total[]' style='text-align:center' value="<?= $data_all['total'] ?>">

                                </td>
                                <td>
                                    <input type='text' class=' form-control' name='delqty[]' style='text-align:center' value=" <?= $data_all['devreq_qty']; ?>">
                                </td>
                                <td>
                                    <input type='date' class='form-control' name='deleta[]' style='text-align:center' value="<?= $data_all['devreq_eta']; ?>">
                                </td>
                                <td>
                                    <input type='text' class='form-control' name='remarks[]' style='text-align:center' value="<?= $data_all['remarks']; ?>">
                                </td>
                                <td>
                                    <button class='delete btn-danger' onClick='deleteRow(<?= $i ?>)' style='text-align:center'>Delete</button>
                                </td>
                            </tr>
                        <?php } while ($data_all = mysqli_fetch_array($sql_all)); ?>
                    </tbody>
                </table>

                <div class=" form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <?php
                        $query_mpr = mysqli_query($link, "SELECT * FROM mr WHERE mr_no='$no'");
                        $data_mpr = mysqli_fetch_array($query_mpr);
                        if ($data_mpr['mpr_status'] == 1) {; ?>
                            <a href="?page=pending-material-purchase-request"><button type="button" class="btn btn-default fa fa-mail-reply"> Back</button></a>&nbsp;&nbsp;&nbsp;
                        <?php } else { ?>
                            <a href="?page=rejected-of-mpr"><button type="button" class="btn btn-default fa fa-mail-reply"> Back</button></a>&nbsp;&nbsp;&nbsp;
                        <?php }; ?>
                        <button type="submit" class="btn btn-primary">Apply </button>
                    </div>
                </div>
            </form>

            <div class="box-footer">
            </div>

        </div>
</section>