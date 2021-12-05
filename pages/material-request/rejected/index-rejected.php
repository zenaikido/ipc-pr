<section class="content-header">
	<h1>
		Rejected Material Purchase Request
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Rejected MPR</li>
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
								<th>REASON OF REJECTED</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							global $link;
							$sql = mysqli_query(
								$link,
								"SELECT a.mr_no,b.abbreviation,c.supplier,c.currency_code,d.product,a.qty,a.unit_price,e.reason_rejected,f.unit,a.remarks
								FROM mr_detail a
								INNER JOIN master_department b
								ON a.id_department=b.id_department
								INNER JOIN master_supplier c
								ON a.id_supplier=c.id_supplier
								INNER JOIN master_product d
								ON a.id_product=d.id_product
								INNER JOIN mr e
								ON a.mr_no=e.mr_no
								INNER JOIN master_unit f
								ON d.id_master_unit=f.id_unit
								WHERE e.mpr_status=2 AND e.deleted_status=0
								ORDER BY a.mr_no DESC"
							);
							while ($data = mysqli_fetch_array($sql)) {
							?>
								<tr>
									<td style="text-align: center;"><?= $no++ ?></td>
									<td><?= $data['abbreviation']; ?>-<?= $data['mr_no']; ?></td>
									<td><?= $data['supplier']; ?></td>
									<td><?= $data['product']; ?></td>
									<td><?= $data['qty']; ?> <?= $data['unit']; ?></td>
									<td style="text-align: left;"><?= $data['currency_code']; ?> <?= number_format($data['unit_price'], 0, ".", ","); ?></td>
									<td><?php echo strtoupper($data['remarks']); ?></td>
									<td><?= $data['reason_rejected'] ?></td>
									<td>
										<a href="?page=detail-rejected-material-purchase-request&detail=<?= $data['mr_no'] ?>">
											<button class="btn btn-rounded btn-info fa fa-reorder"> Detail</button>
										</a>
										<?php if ($_SESSION['access'] != "View") { ?>
											<?php if ($_SESSION['access'] == "Leader" || $_SESSION['access'] == "Admin") { ?>
												<button class="btn btn-rounded btn-danger fa fa-trash-o" href="javascript:" title="Delete" onclick="return cek('<?= $data['mr_no']; ?>');"> Delete</button>
											<?php } ?>
										<?php } ?>
									</td>
								<?php } ?>
								</tr>

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
					var location = "index.php?page=delete-material-purchase-request&mr_no=" + mr_no;
					setTimeout('window.location.href="' + location + '"', 1000);
					return true;
				} else {
					swal("Your imaginary data is safe!");
					// return false;

				}
			});
	};
</script>