<section class="content-header">
	<h1>
		Edit Page Product
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
			<?php
			$slug = $_GET['slug'];
			$query = mysqli_query($link, "SELECT * FROM master_product WHERE slug_product='" . $slug . "'");
			$data = mysqli_fetch_array($query);
			?>
			<form action="?page=edit-product&slug=<?= $data['slug_product']; ?>" method="POST">
				<div class="form-group row">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" value="<?= $data['product']; ?>" name="product">
					</div>
					<div class="col-sm-3">
						<?php
						global $link;
						$sql_unit = mysqli_query($link, "SELECT a.product, b.unit, a.lenght, a.width, a.height, a.slug_product 
						FROM master_product a
						INNER JOIN master_unit b
						ON a.id_master_unit=b.id_unit");
						$unt = mysqli_fetch_array($sql_unit);
						?>
						<select class='js-example-basic-single form-control' name="unit" required>
							<option selected='' disabled required>Choose Unit</option>
							<?php
							$sql_unit2 = mysqli_query($link, "SELECT * FROM master_unit");
							while ($dsql = mysqli_fetch_array($sql_unit2)) { ?>
								<option value='<?= $dsql['id_unit']; ?>'><?= $dsql['unit']; ?></option>
							<?php }	?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Dimension in Cm</label>
					<div class="col-sm-3">
						<input type="number" class="form-control" name="lenght" placeholder="Lenght" required step="0.01" value="<?= $data['lenght']; ?>">
					</div>

					<div class="col-sm-3">
						<input type="number" class="form-control" name="width" placeholder="Widht" required step="0.01" value="<?= $data['width']; ?>">
					</div>

					<div class="col-sm-3">
						<input type="number" class="form-control" name="height" placeholder="Height" required step="0.01" value="<?= $data['height']; ?>">
					</div>
					CM
				</div>

				<div class=" form-group row">
					<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
					<div class="col-sm-10">
						<a href="?page=product"><button type="button" class="btn btn-default">Cancel</button></a>&nbsp;&nbsp;
						<button type="submit" class="btn btn-primary">Apply</button>
					</div>
				</div>
			</form>

			<div class="box-footer">
			</div>

		</div>
</section>