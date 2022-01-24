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

<form action="index.php" method="POST" name="postform">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h4>From:
                    <input class="form-group" type="date" name="tanggal_awal">
                    &nbsp;&nbsp;&nbsp;
                    Until:
                    <input class="form-group" type="date" name="tanggal_akhir">
                    &nbsp;&nbsp;&nbsp;
                    <input type="submit" name="pencarian" class="fa fa-success" value="Search">
                </h4>
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

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</form>

<?php
//proses jika sudah klik tombol pencarian data
if (isset($_POST['pencarian'])) {
    //menangkap nilai form
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    if (empty($tanggal_awal) || empty($tanggal_akhir)) {
        echo "No Data";
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
        $query = mysqli_query($link, "select * from mr where created_at between '$tanggal_awal' and '$tanggal_akhir'");
    }
    ?>
    </p>
    <table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FF6600">
            <th width="10" height="40">ID</td>
            <th width="60">NIP</td>
            <th width="70">Nama</td>
            <th width="60">Jenis Kelamin</td>
                <!-- <th width="170">Tanggal Masuk</td>
            <th width="70">Status</td> -->
        </tr>
        <?php
        $i = 1;
        //menampilkan pencarian data
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td align="center" height="30"><?= $i++; ?></td>
                <td align="center"><?php echo $row['mr_no']; ?></td>
                <td align="center"><?php echo $row['reason_rejected']; ?></td>
                <!-- <td align="center"><?php echo $row['jk']; ?></td>
                <td align="center"><?php echo $row['tgl_masuk']; ?></td>
                <td align="center"><?php echo $row['status']; ?></td> -->
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