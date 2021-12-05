<?php
global $link;
$slug = $_GET['slug'];
$query = mysqli_query($link, "SELECT department, abbreviation, slug FROM master_department WHERE slug='" . $slug . "'");
$data = mysqli_fetch_array($query);
?>

<section class="content-header">
	<h1>
		Edit Page Department
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Master</a></li>
		<li class="active">Edit Page</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<form action="?page=edit-department&slug=<?= $data['slug']; ?>" method="POST">
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['department']; ?>" name="department" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Code</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['abbreviation']; ?>" name="abbreviation" minlength="2" maxlength="4" required>
					</div>
				</div>

				<div class=" form-group row">
					<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<a href="?page=department"><button type="button" class="btn btn-default">Cancel</button></a>&nbsp;&nbsp;
						<button type="submit" class="btn btn-primary">Apply</button>
					</div>
				</div>
			</form>

			<div class="box-footer">
			</div>

		</div>
</section>