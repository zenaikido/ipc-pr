<?php
ob_start();
include "../../function/db.php";
global $link;
$no = $_GET['no'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../../images/logo 2.jpg" sizes="16x16" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div.absolute {
            position: absolute;
            top: 80px;
            right: 0;
            width: 200px;
            height: 100px;
            border: 3px solid #73AD21;
        }

        .tabel {
            border-collapse: collapse;
            border-color: black;
            border-spacing: 0;
        }

        .tabel td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            color: #444;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tabel th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            color: #444;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
            text-align: center;
            width: 120px;
        }
    </style>

    </style>
    <style>
        .tg {
            border-collapse: collapse;
            border-color: black;
            border-spacing: 0;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            color: #444;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 5px 5px;
            word-break: normal;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            color: #444;
            font-family: Arial, sans-serif;
            font-size: 12px;
            overflow: hidden;
            padding: 8px 5px;
            word-break: normal;
        }
    </style>

    <style>
        .kotakbawah {
            position: relative;
        }

        .kotakbawahkiri {
            position: absolute;
            left: 0;
        }

        .kotakbawahkanan {
            position: absolute;
            right: 0;
        }
    </style>
    <title>Print Preview</title>
</head>

<body>
    <div class="logo">
        <img src="../../images/logo-ipc.jpg">
    </div>

    <div style="text-align: right;">
        No Doc: FM.SCM-07 <br>
        Revise: 01
    </div>


    <?php
    $i = 1;
    $sql = mysqli_query($link, "SELECT * FROM mr_detail a
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
								WHERE a.mr_no='$no'");
    $data = mysqli_fetch_array($sql);
    $row = mysqli_num_rows($sql);

    $sql_item = mysqli_query($link, "SELECT b.abbreviation FROM mr_detail a
                                INNER JOIN master_category_item b
                                ON a.id_category_item=b.id_category_item
                                WHERE a.mr_no=$no");
    $data_item = mysqli_fetch_array($sql_item);

    $sql_cost = mysqli_query($link, "SELECT b.abbreviation FROM mr_detail a
                                INNER JOIN master_category_cost b
                                ON a.id_category_cost=b.id_category_cost
                                WHERE a.mr_no=$no");
    $data_cost = mysqli_fetch_array($sql_cost);
    ?>
    <div class="row">
        <div class="col-6" style="text-align: center;">
            <h3> GENERAL PURCHASE REQUEST</h3>
            <h4>Department / MPR No: <?= isset($data['department']) ? $data['department'] : '' ?>/<?= isset($data['mr_no']) ? $data['mr_no'] : ''; ?></h4>
        </div>

    </div>

    <table class="tg">
        <thead>
            <tr>
                <th rowspan="2" style="text-align: center; width: 7px;">NO</th>
                <th rowspan="2" style="text-align: center; width: 120px;">SUPPLIER</th>
                <th colspan="2" style="text-align: center; ">CATEGORY</th>
                <th rowspan="2" style="text-align: center; width: 185px;">ITEM DESCRIPTIONS</th>
                <th rowspan="2" style="text-align: center; width:50px;">QTY</th>
                <th rowspan="2" style="text-align: center; width:75px;">UNIT PRICE</th>
                <th rowspan="2" style="text-align: center; width:87.5px;">TOTAL PRICE</th>
                <th colspan="2" style="text-align: center; ">DELIVERY REQUEST</th>
                <th rowspan="2" style="text-align: center; width:150px;">REMARKS</th>
            </tr>
            <tr>
                <th style="text-align: center;">S/C/W/M </th>
                <th style="text-align: center;">I/E</th>
                <th style="text-align: center; width: 40;">QTY</th>
                <th style="text-align: center; ">ETA IPC</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($row === 1) {
                do {
            ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 2) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 3) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 4) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 5) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 6) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 7) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 8) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row === 9) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
                <tr>
                    <td style="text-align: center;"><?= $i++; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php } elseif ($row > 10) {
                do { ?>
                    <tr>
                        <td style="text-align: center;"><?= $i++; ?></td>
                        <td><?= $data['supplier'] ?></td>
                        <td style="text-align: center;"><?= $data_item['abbreviation'] ?></td>
                        <td style="text-align: center;"><?= $data_cost['abbreviation'] ?></td>
                        <td><?= $data['product'] ?></td>
                        <td><?= number_format($data['qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ",") ?></td>
                        <td><?= $data['currency_code']; ?> <?= number_format($data['total'], 0, ".", ","); ?></td>
                        <td><?= number_format($data['devreq_qty'], 0, ".", ","); ?> <?= $data['unit']; ?></td>
                        <td><?= $data['devreq_eta']; ?></td>
                        <td style="text-transform: capitalize; width:105px;"><?= $data['remarks']; ?></td>
                    </tr>
                <?php } while ($data = mysqli_fetch_array($sql))  ?>
            <?php } ?>
        </tbody>
    </table>
    <?php
    $sql_sum = mysqli_query($link, "SELECT SUM(total) FROM mr_detail WHERE mr_no='$no'");
    $data_sum = mysqli_fetch_array($sql_sum);
    $result = $data_sum[0];

    $sql_curr = mysqli_query($link, "SELECT b.currency_code FROM mr_detail a INNER JOIN master_supplier b ON a.id_supplier=b.id_supplier WHERE a.mr_no='$no'");
    $data_curr = mysqli_fetch_array($sql_curr);
    ?>
    <div style="text-align: center; border:1px solid black; padding: 3px;">
        Grand Total: <?= $data_curr['currency_code']; ?> <?= number_format($result, 0, ".", ","); ?>
    </div>
    <br>


    <div class="kotakbawah" style=" margin-top:20px;">
        <div class="kotakbawahkiri">
            <br>S = Sparepart
            <br>C = Consumable
            <br>W = Work
            <br>M = Machine / Equipment
            <br>I = Investment
            <br>E = Expense
        </div>

        <div class="kotakbawahkanan">
            <table class="tabel">
                <thead>
                    <tr>
                        <th>Prepared</th>
                        <th>Checked</th>
                        <th>Approved</th>
                        <th>Received</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding-bottom: 70px;"></td>
                        <td style="padding-bottom: 70px;"></td>
                        <td style="padding-bottom: 70px;"></td>
                        <td style="padding-bottom: 70px;"></td>
                    </tr>

                    <tr style="text-align: center;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>

<?php
$html = ob_get_contents();
ob_end_clean();
require_once '../../bower_components/html2pdfv52/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$pdf = new Html2Pdf('L', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Purchase Request Material.pdf');
