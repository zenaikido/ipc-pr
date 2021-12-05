<section class="content-header">
	<h1>
		Restore Unit
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Master</a></li>
		<li class="active">Restore Unit</li>
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
								<th>UNIT</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								$no = 1;
								global $link;
								$q = "SELECT * FROM master_unit";
								$qt = mysqli_query($link, $q);
								$row = mysqli_num_rows($qt);
								if ($row == "") {
									echo "<center><strong><h1>Data is Empty</strong></h1></center>";
								} else {
									$query = mysqli_query($link, "SELECT * FROM master_unit WHERE deleted_status=1 ORDER BY unit ASC");
									while ($data = mysqli_fetch_array($query)) {
								?>
										<td style="text-align: center;"><?= $no++ ?></td>
										<td><?= $data['unit']; ?></td>
										<td>
											<?php if ($_SESSION['access'] != "View") { ?>
												<a href="?page=process-restore-unit&slug=<?= $data['slug']; ?>">
													<button class="btn btn-rounded btn-info fa fa-window-restore"> Restore</button>
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
					var location = "?page=permanent-delete-restore-unit&slug=" + slug;
					setTimeout('window.location.href="' + location + '"', 1000);
					return true;
				} else {
					swal("Your imaginary data is safe!");
					// return false;

				}
			});
	};
</script>