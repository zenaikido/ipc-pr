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
<section class="content">

    <!-- Default box -->
    <div class="box">

        <div class="box-body">
            <form action="?page=result" method="post" name="postform">

                <table border="0">
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
                            document.location = 'index.php';
                        </script>
                    <?php
                    } else {
                    ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal'] ?></b> s/d <b><?php echo $_POST['tanggal_akhir'] ?></b></i>
                    <?php
                        global $link;
                        $query = mysqli_query($link, "SELECT * FROM mr WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                    }
                    ?>
            </p>
            <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr bgcolor="#FF6600">
                    <th width="10" height="40">ID</td>
                    <th width="60">NIP</td>
                    <th width="70">Nama</td>
                    <th width="60">Jenis Kelamin</td>
                    <th width="170">Tanggal Masuk</td>
                    <th width="70">Status</td>
                </tr>
                <?php
                    $i = 1;
                    //menampilkan pencarian data
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td align="center" height="30"><?= $i++ ?></td>
                        <td align="center"><?php echo $row['mr_no']; ?></td>
                        <td align="center"><?php echo $row['reason_rejected']; ?></td>
                        <td align="center"><?php echo $row['mpr_status']; ?></td>
                        <td align="center"><?php echo $row['approved_by']; ?></td>
                        <td align="center"><?php echo $row['edited_by']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="4" align="center">
                        <?php
                        //jika pencarian data tidak ditemukan
                        if (mysqli_num_rows($query) == 0) {
                            echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
        <?php
                } else {
                    unset($_POST['pencarian']);
                }
        ?>

        <iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
        </div>

        <div class="box-footer">
        </div>

    </div>
</section>