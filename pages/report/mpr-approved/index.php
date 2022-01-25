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

<section class="content">
    <div class="box">
        <div class="box-body">
            <form action="?page=result" method="POST" name="postform">
                <table border="0" class="table table-bordered table-striped">
                    <tr>
                        <td width="125"><b>From</b></td>
                        <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16" /> </td>
                        <td width="125"><b>Until</b></td>
                        <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" /> </td>
                        <td colspan="2" width="190"><input type="submit" value="Search" name="pencarian" /></td>
                    </tr>
                </table>
            </form><br />

            <p>
                <?php
                //proses jika sudah klik tombol pencarian data
                if (isset($_POST['pencarian'])) {
                    //menangkap nilai form
                    $tanggal_awal = $_POST['tanggal_awal'];
                    $tanggal_akhir = $_POST['tanggal_akhir'];
                    if (empty($tanggal_awal) || empty($tanggal_akhir)) {
                        echo "Tidak ada data";
                ?>
                        <script language="JavaScript">
                            alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
                            document.location = '?page=report-mpr-approved';
                        </script>
                    <?php
                    } else {
                    ?>
                        <i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal
                            <b><?= $_POST['tanggal_awal'] ?></b> s/d <b><?= $_POST['tanggal_akhir'] ?></b>
                        </i>
                    <?php
                        global $link;
                        $query = mysqli_query($link, "SELECT * FROM mr_detail a                    
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
                        WHERE req_date BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND mpr_status=0 
                        ORDER BY a.mr_no DESC");
                    }
                    ?>
            </p>
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center;">NO</th>
                        <th style="text-align: center;">MR No</th>
                        <th style="text-align: center;">DEPARTMENT</th>
                        <th style="text-align: center;">SUPPLIER</th>
                        <th style="text-align: center;">PRODUCT</th>
                        <th style="text-align: center;">QTY</th>
                        <th style="text-align: center;">PRICE/UNIT</th>
                        <th style="text-align: center;">TOTAL PRICE</th>
                        <th style="text-align: center;">REMARKS</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td align="center" height="30"><?= $i++ ?></td>
                            <td align="center"><?= $data['mr_no']; ?></td>
                            <td align="center"><?= $data['department']; ?></td>
                            <td><?= $data['supplier']; ?></td>
                            <td><?= $data['product']; ?></td>
                            <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                            <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                            <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 2, ".", ","); ?></td>
                            <td><?= strtoupper($data['remarks']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        <?php
                } else {
                    unset($_POST['pencarian']);
                }
        ?>

        </div>
    </div>

</section>