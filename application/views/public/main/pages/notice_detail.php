
<!-- Content without sidebar -->
<div class="page_content_wrap">
    <div class="content">
        <article class="post_item post_item_single page">
			<section class="post_content">
				<!-- Info section -->
				<div class="sc_section accent_top bg_tint_light sc_bg1" data-animation="animated fadeInUp normal">
					<div class="sc_section_overlay">
						<div class="sc_section_content">
							<div class="sc_content content_wrap margin_top_2_5em_imp margin_bottom_2_5em_imp">
								<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
									<div class="column-1_2 sc_column_item sc_column_item_2 sc_info_st1 even">
                               <div class="notice-details">
                                  <h2 class="title"><?= $notice->title; ?></h2>
                                  <ul class="meta">
                                     <li class="info"><span class="icon"><i class="fas fa-user"></i></span> By / Admin</li>
                                     <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span> <?= $notice->date; ?></li>
                                  </ul>
                               </div>
									</div>
									<div class="column-1_2 sc_column_item sc_column_item_1 sc_info_st1 odd first ">
									    <p><?= $notice->details; ?></p>
									</div>
									<?php if($notice->pdf != NULL) { ?>
									<div class="column-1_1 sc_column_item sc_column_item_2 sc_info_st1 even">
                               <div class="notice-details">
                                  <div class="text notice-text"></div>
                                  <a href="<?= base_url();?>upload/notice/<?= $notice->pdf; ?>" class="btn btn-success btn-xs">
                                  <i class="fa fa-download"></i>Download</a>
                                  <iframe src="<?= base_url();?>upload/notice/<?= $notice->pdf; ?>" width="100%" height="800px" frameborder="0" style="margin-top: 15px;"></iframe>
                               </div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Info section -->