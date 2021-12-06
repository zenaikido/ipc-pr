<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Page MPR
    </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add Page</a></li>
        <li class="active">Add MPR</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            <form action="?page=add-material-purchase-request" method="POST">
                <div class="form-group row">
                    <?php
                    global $link;
                    $sql = mysqli_query($link, "SELECT * FROM user a
                    INNER JOIN master_department b
                    ON a.id_department=b.id_department
                    WHERE fullname='" . $_SESSION['fullname'] . "'");
                    $duser = mysqli_fetch_array($sql);

                    $qno = mysqli_query($link, "SELECT mr_no FROM mr_detail ORDER BY mr_no DESC limit 1");
                    $qdt = mysqli_fetch_assoc($qno);
                    $qdt2 = ((int)$qdt['mr_no']) + 1;
                    $qdt3 = mysqli_fetch_array($qno);

                    if ($qdt2 < 10) {
                        $nol = '00';
                    } else {
                        $nol = '0';
                    }
                    $qdt2 = $nol . $qdt2;
                    ?>

                    <label class="col-sm-2 col-form-label">MPR No.</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?= $duser['abbreviation']  ?>" readonly>
                        <input type="hidden" name="id_department" value="<?= $duser['id_department']; ?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="mr_no" class="form-control" value="<?= $qdt2 ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Created by</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $_SESSION['fullname']; ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Created at</label>
                    <?php
                    $qcst = mysqli_query($link, "SELECT * FROM master_product ORDER BY product ASC");
                    ?>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= date("Y-m-d"); ?>" readonly>
                    </div>
                </div>

                <button class="addnew btn btn-primary" type="button">Add</button>
                <table border="1" class="col-xs-12" id="myTable" style="margin-bottom: 20px;">
                    <tr>
                        <td style="text-align: center">NO</td>
                        <td style="text-align: center">SUPPLIER</td>
                        <td style="text-align: center">CTG.ITEM</td>
                        <td style="text-align: center">CTG.COST</td>
                        <td style="text-align: center">ITEM DESCRIPTION</td>
                        <td style="text-align: center">QUANTITY</td>
                        <td style="text-align: center">UNIT PRICE</td>
                        <td style="text-align: center">TOTAL</td>
                        <td style="text-align: center">DELV.REQ.QTY</td>
                        <td style="text-align: center">DELV.ETA</td>
                        <!-- <td style="text-align: center">PO</td> -->
                        <td style="text-align: center">REMARKS</td>
                        <td style="text-align: center">ACTION</td>
                    </tr>
                </table>

                <div class=" form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <a href="?page=approved-of-material-purchase-request"><button type="button" class="btn btn-default">Cancel</button></a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </form>

            <div class="box-footer">
            </div>

        </div>
</section>