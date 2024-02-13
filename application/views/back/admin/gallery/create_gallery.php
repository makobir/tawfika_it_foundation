<div class="card card-primary card-outline" style="width: 100%;">
	<div class="card-header">
		Create Gallery 
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<form method="post" action="<?= base_url() ?>super_admin/gallery_groups_info">
				<div class="form-group">
					<label>Gallery Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<button class="btn btn-info" type="submit">Create</button>
				</div>
			</div>
			<div class="col-sm-6">
				<table class="table" id="editor1">
					<tr>
						<td>SL</td>
						<td>Title</td>
						<td>Total Photo</td>
					</tr>
					<?php $i = 1; foreach ($this->Super_admin_model->gallery_groups() as $key => $value) { ?>
					<tr>
						<td><?= $i ?></td>
						<td><?= $value->title; ?></td>
						<td></td>
					</tr>
					<?php $i++; } ?>
				</table>
			</div>
		</div>
	</div>
</div>