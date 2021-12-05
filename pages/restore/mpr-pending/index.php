<section class="content-header">
    <h1>
        Restore Pending Material Purchase Request
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Restore Pending MPR</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center;">NO</th>
                                <th>MR NO</th>
                                <th>SUPPLIER</th>
                                <th>PRODUCT</th>
                                <th>QTY</th>
                                <th style="text-align: center;">PRICE /UNIT</th>
                                <th>REMARKS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                global $link;
                                $sql = mysqli_query($link, "SELECT * FROM mr_detail a
								INNER JOIN master_department b
								ON a.id_department=b.id_department
								INNER JOIN master_supplier c
								ON a.id_supplier=c.id_supplier
								INNER JOIN master_product f
								ON a.id_product=f.id_product
								INNER JOIN mr g
								ON a.mr_no=g.mr_no
								INNER JOIN master_unit h
								ON f.id_master_unit=h.id_unit
								WHERE g.mpr_status=1 AND g.deleted_status=1
								ORDER BY a.mr_no DESC");

                                while ($data = mysqli_fetch_array($sql)) {
                                ?>

                                    <td style="text-align: center;"><?= $no++ ?></td>
                                    <td><?= $data['abbreviation']; ?>-<?= $data['mr_no']; ?></td>
                                    <td><?= $data['supplier']; ?></td>
                                    <td><?= $data['product']; ?></td>
                                    <td><?= $data['qty']; ?> <?= $data['unit']; ?></td>
                                    <td style="text-align: left;"><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 2, ".", ","); ?></td>
                                    <td><?php echo strtoupper($data['remarks']); ?></td>
                                    <td>
                                        <?php if ($_SESSION['access'] != "View") { ?>
                                            <a href="?page=process-restore-pending-material-purchase-request&no=<?= $data['mr_no']; ?>">
                                                <button class="btn btn-rounded btn-info fa fa-window-restore"> Restore</button>
                                            </a>
                                            <?php if ($_SESSION['access'] == "Leader" || $_SESSION['access'] == "Admin") { ?>
                                                <button class="btn btn-rounded btn-danger fa fa-trash-o" href="javascript:" title="Delete" onclick="return cek('<?= $data['mr_no']; ?>');"> Delete</button>
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

<script>
    $('input.number').keyup(function(event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
</script>

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

    function cek(mr_no) {
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
                    var location = "index.php?page=permanent-delete-restore-pending-material-purchase-request&mr_no=" + mr_no;
                    setTimeout('window.location.href="' + location + '"', 1000);
                    return true;
                } else {
                    swal("Your imaginary data is safe!");
                    // return false;

                }
            });
    };
</script>