
<!-- Content without sidebar -->
<div class="page_content_wrap">
    <div class="content">
        <article class="post_item post_item_single page">
			<section class="post_content">
				<!-- Info section -->
				<div class="sc_section accent_top bg_tint_light sc_bg1" data-animation="animated fadeInUp normal">
					<div class="sc_section_overlay">
						<div class="sc_section_content">
						    <?php if($center != Null){ ?>
							<div class="sc_content content_wrap margin_top_2_5em_imp margin_bottom_2_5em_imp">
								<h4 class="sc_title sc_title_regular sc_align_center margin_top_0 margin_bottom_085em text_center"><?= $center->site_name; ?></h4>
								<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
									<div class="column-1_2 sc_column_item sc_column_item_2 sc_info_st1 even">
										<img src="<?= base_url() ?>upload/logo/<?= $center->userfile; ?>">
									</div>
									<div class="column-1_2 sc_column_item sc_column_item_1 sc_info_st1 odd first ">
									    <p>Center Code : <?= $center->code; ?></p>
									    <p>Address : <?= $center->address; ?></p>
									    <p>Upazila : <?= $center->upazila; ?></p>
									    <p>District : <?= $center->district; ?></p>
									    <p>Email : <?= $center->email; ?></p>
									</div>
								</div>
							</div>
							<?php } else {
							    echo "Nothing Found!";
							} ?>
						</div>
					</div>
				</div>
				<!-- /Info section -->