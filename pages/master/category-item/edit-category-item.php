<?php
global $link;
$slug = $_GET['slug'];
$query = mysqli_query($link, "SELECT * FROM master_category_item WHERE slug='" . $slug . "'");
$data = mysqli_fetch_array($query);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Page Category Item
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Master</a></li>
		<li class="active">Edit Page</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="box">
		<div class="box-body">
			<form action="?page=edit-category-item&slug=<?= $data['slug']; ?>" method="POST">
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Category Item</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['category_item']; ?>" name="category_item" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">CODE</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['abbreviation']; ?>" name="abbreviation" minlength="1" maxlength="1" required>
					</div>
				</div>

				<div class=" form-group row">
					<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<a href="?page=category-item"><button type="button" class="btn btn-default">Cancel</button></a>&nbsp;&nbsp;
						<button type="submit" class="btn btn-primary">Apply</button>
					</div>
				</div>
			</form>

			<div class="box-footer">
			</div>

		</div>
</section>