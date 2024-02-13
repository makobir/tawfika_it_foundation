<div class="card card-primary card-outline" style="width: 100%;">
	<div class="card-header">
		All Transections by : <b> <?php echo $t->site_name;?> </b>
	</div>
	<div class="card-body">
		<table class="table">
			<tr>
				<td>ID</td>
				<td>Method</td>
				<td>Mobile</td>
				<td>TNX ID</td>
				<td>Date & Time</td>
				<td>Status</td>
			</tr>
			<?php $i =1; foreach ($tnx as $key => $value) { ?>				
			<tr>
				<td><?= $i; ?></td>
				<td><?= $value->method; ?></td>
				<td><?= $value->mobile; ?></td>
				<td><?= $value->tnxid; ?></td>
				<td><?= $value->date; ?></td>
				<td><?= $value->status; ?></td>
			</tr>
			<?php $i++; } ?>
		</table>
	</div>
</div>