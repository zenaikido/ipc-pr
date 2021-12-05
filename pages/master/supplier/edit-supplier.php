<?php
global $link;
$slug = $_GET['slug'];
$query = mysqli_query($link, "SELECT * FROM master_supplier WHERE slug='" . $slug . "'");
$data = mysqli_fetch_array($query);
?>

<section class="content-header">
	<h1>
		Edit Page Supplier
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
			<form action="?page=edit-supplier&slug=<?= $data['slug']; ?>" method="POST">
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Supllier</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['supplier']; ?>" name="supplier">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['currency_country']; ?>" name="country">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Currency</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?= $data['currency_code']; ?>" name="currency">
					</div>
				</div>

				<div class=" form-group row">
					<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<a href="?page=product"><button type="button" class="btn btn-default fa fa-reply"> Cancel</button></a>&nbsp;&nbsp;
						<button type="submit" class="btn btn-primary fa fa-edit"> Apply</button>
					</div>
				</div>
			</form>

			<div class="box-footer">
			</div>

		</div>
</section>