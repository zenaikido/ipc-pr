<section class="content-header">
	<h1>
		Category Cost
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Master</a></li>
		<li class="active">Category Cost</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"></h3>
			<div class="box-tools pull-right">
				<div class="title-action">
					<?php if ($_SESSION['access'] != "View") { ?>
						<a href="#" class="btn btn-success fa fa-plus-circle" data-toggle="modal" data-target="#modal-default"> Add Data</a>
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
								<th>CATEGORY COST</th>
								<th>CODE</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							global $link;
							$query = mysqli_query($link, "SELECT * FROM master_category_cost WHERE deleted_status=0 ORDER BY category_cost ASC ");
							while ($data = mysqli_fetch_array($query)) {
							?>
								<tr>
									<td style="text-align: center;"><?= $no++ ?></td>
									<td><?= $data['category_cost']; ?></td>
									<td><?= $data['abbreviation']; ?></td>
									<td>
										<?php if ($_SESSION['access'] != "View") { ?>
											<a href="?page=page-edit-category-cost&slug=<?= $data['slug']; ?>">
												<button class="btn btn-rounded btn-info fa fa-edit"> Edit</button>
											</a>
											<?php if ($_SESSION['access'] == "Leader" || $_SESSION['access'] == "Admin") { ?>
												<button class="btn btn-rounded btn-danger fa fa-trash-o" href="javascript:" title="Delete" onclick="return cek('<?= $data['id_category_cost']; ?>');"> Delete</button>
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
		<!-- /.box-body -->
		<div class="box box-footer">

		</div>
		<!-- /.box-footer-->
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

<form action="?page=add-category-cost" method="POST">
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<img src="images/ipc.png" class="gambartengah" style="width: 150px;">
					<h4 class="modal-title" style="text-align: center;">Add Data Category Cost</h4>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Category Cost</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="category_cost" required>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label"> CODE</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="abbreviation" minlength="1" maxlength="1" required>
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

	function cek(id_category_cost) {
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
					var location = "index.php?page=delete-category-cost&id_category_cost=" + id_category_cost;
					setTimeout('window.location.href="' + location + '"', 1000);
					return true;
				} else {
					swal("Your imaginary data is safe!");
					// return false;

				}
			});
	};
</script>