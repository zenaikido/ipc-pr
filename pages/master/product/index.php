<section class="content-header">
	<h1>
		Product
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Master</a></li>
		<li class="active">Product</li>
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
								<th>PRODUCT</th>
								<th>UNIT</th>
								<th>DIMENSON</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							global $link;
							$query = mysqli_query(
								$link,
								"SELECT a.product, b.unit, a.lenght, a.width, a.height, a.slug_product
								FROM master_product a
								INNER JOIN master_unit b
								ON a.id_master_unit=b.id_unit
								WHERE a.deleted_status=0
								ORDER BY product ASC"
							);
							while ($data = mysqli_fetch_array($query)) {
							?>
								<tr>
									<td style="text-align: center;"><?= $no++ ?></td>
									<td><?= $data['product']; ?></td>
									<td><?= $data['unit']; ?></td>
									<td><?= $data['lenght']; ?>cm x <?= $data['width']; ?>cm x <?= $data['height']; ?>cm</td>
									<td>
										<?php if ($_SESSION['access'] != "View") { ?>
											<a href="?page=page-edit-product&slug=<?= $data['slug_product']; ?>">
												<button class="btn btn-rounded btn-info fa fa-edit"> Edit</button>
											</a>
											<?php if ($_SESSION['access'] == "Leader" || $_SESSION['access'] == "Admin") { ?>
												<button class="btn btn-rounded btn-danger fa fa-trash-o" href="javascript:" title="Delete" onclick="return cek('<?= $data['slug_product']; ?>');"> Delete</button>
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

<form action="?page=add-product" method="POST">
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<img src="images/ipc.png" class="gambartengah" style="width: 150px;">
					<h4 class="modal-title" style="text-align: center;">Add Data Product</h4>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Product</label>
						<?php
						$sql = mysqli_query($link, "SELECT * FROM master_unit ORDER BY unit ASC");
						?>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="product" placeholder="Mouse Logitech K120" required>
						</div>
						<div class="col-sm-3">
							<select class='js-example-basic-single form-control' name="unit" required>
								<option selected='' disabled=''>Choose Unit</option>
								<?php while ($dsql = mysqli_fetch_array($sql)) { ?>
									<option value='<?= $dsql['id_unit']; ?>'><?= $dsql['unit']; ?></option>
								<?php }	?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Dimension in Cm</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="lenght" placeholder="Lenght" required step="0.01">
						</div>

						<div class="col-sm-3">
							<input type="number" class="form-control" name="width" placeholder="Widht" required step="0.01">
						</div>

						<div class="col-sm-3">
							<input type="number" class="form-control" name="height" placeholder="Height" required step="0.01">
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

	function cek(slug_product) {
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
					var location = "index.php?page=delete-product&slug_product=" + slug_product;
					setTimeout('window.location.href="' + location + '"', 1000);
					return true;
				} else {
					swal("Your imaginary data is safe!");
					// return false;

				}
			});
	};
</script>