<section class="content-header">
	<h1>
		Supllier
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Master</a></li>
		<li class="active">Supllier</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"></h3>

			<div class="box-tools pull-right">
				<div class="title-action">
					<?php if ($_SESSION['access'] != "View") { ?>
						<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-default">Add Data</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="text-align: center;">NO</th>
								<th>SUPPLIER</th>
								<th>COUNTRY</th>
								<th>CURRENCY</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								global $link;
								$q = "SELECT * FROM master_supplier";
								$qt = mysqli_query($link, $q);
								$row = mysqli_num_rows($qt);
								if ($row == "") {
									echo "<center><strong><h1>Data is Empty</strong></h1></center>";
								} else {
									$query = mysqli_query($link, "SELECT * FROM master_supplier WHERE deleted_status=0 ORDER BY supplier ASC");
									while ($data = mysqli_fetch_array($query)) {
								?>
										<td style="text-align: center;"><?= $no++ ?></td>
										<td><?= $data['supplier']; ?></td>
										<td><?= $data['currency_country']; ?></td>
										<td><?= $data['currency_code']; ?></td>
										<td>
											<?php if ($_SESSION['access'] != "View") { ?>
												<a href="?page=page-edit-supplier&slug=<?= $data['slug']; ?>">
													<button class="btn btn-rounded btn-info fa fa-edit"> Edit</button>
												</a>
												<?php if ($_SESSION['access'] == "Leader" || $_SESSION['access'] == "Admin") { ?>
													<button class="btn btn-rounded btn-danger fa fa-trash-o" href="javascript:" title="Delete" onclick="return cek('<?= $data['slug']; ?>');"> Delete</button>
												<?php } ?>
											<?php } ?>

										</td>
							</tr>
						<?php } ?>
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

<form action="?page=add-supplier" method="POST">
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<img src="images/ipc.png" class="gambartengah" style="width: 150px;">
					<h4 class="modal-title" style="text-align: center;">Add Data Supplier</h4>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Supplier</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="supplier" placeholder="Tokopedia" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Country</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="country" placeholder="Indonesia" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Currency</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="currency" placeholder="Rp" required>
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

	function cek(slug) {
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
					var location = "index.php?page=delete-supplier&slug=" + slug;
					setTimeout('window.location.href="' + location + '"', 1000);
					return true;
				} else {
					swal("Your imaginary data is safe!");
					// return false;

				}
			});
	};
</script>