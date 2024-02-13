<div class="sc_section " data-animation="animated fadeInUp normal">
  	<div class="sc_section_overlay">
    	<div class=""> 
    		<div class=" content_wrap margin_top_2_5em_imp margin_bottom_2_5em_imp">
        		<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2"> 
			    	<table width="100%" style="border:1px solid black !important;">
						<tr>
							<td>SL</td>
							<td>Notice Title</td>
							<td>Published Date</td>
						</tr>
						<?php $i= 1; foreach ($this->Home_model->all_notice() as $notice) {?>
						<tr>
							<td><?= $i; ?></td>
							<td> <a href="<?= base_url() ?>home/notice_detail/<?= $notice->id ?>" ><?= $notice->title ?></a></td>
							<td><?= $notice->date ?></td>
						</tr>
						<?php $i++; } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>