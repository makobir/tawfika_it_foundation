
<!-- Courses section -->
<div class="sc_section accent_top bg_tint_light sc_bg1" data-animation="animated fadeInUp normal">
	<div class="sc_section_overlay">
		<div class="sc_section_content">
			<div class="sc_content content_wrap margin_top_2_5em_imp margin_bottom_2_5em_imp">
				<h2 style="font-weight:bold;" class="sc_title sc_title_regular sc_align_center margin_top_0 margin_bottom_085em text_center">Popular Courses <hr style="border:2px solid green; width:80px; background: green;"></h2>

				<div class="sc_blogger layout_courses_3 template_portfolio sc_blogger_horizontal no_description">
					<div class="isotope_wrap" data-columns="3">
						<?php foreach ($course as $key => $course) { ?>
						<!-- Courses item -->
						<div class="isotope_item isotope_item_courses isotope_column_3">
							<div class="post_item post_item_courses odd">
								<div class="post_content isotope_item_content ih-item colored square effect_dir left_to_right">
									<div class="post_featured img">
										<a href="paid-course.html">
											<img alt="" src="<?= base_url() ?>upload/course/<?= $course->userfile; ?>">
											<!-- <img alt="" src="http://placehold.it/400x400"> -->
										</a>
										<h4 class="post_title">
											<a href="paid-course.html"><?php echo $course->title ; ?></a>
										</h4>
										<div class="post_descr">
											<div class="post_price">
												<span class="post_price_value">৳ <?php echo $course->fee ; ?>.00</span>
												<!-- <span class="post_price_period"><?php echo $course->duration ; ?> </span> -->
											</div>
											<div class="post_category">
												<a href="product-category.html"><?php echo $course->duration ; ?> Months</a>
											</div>
										</div>
									</div>
									<div class="post_info_wrap info">
										<div class="info-back">
											<h4 class="post_title">
												<a href="paid-course.html"><?php echo $course->title ; ?></a>
											</h4>
											<div class="post_descr">
												<p>
													<a href="paid-course.html"><?php echo $course->short ; ?></a>
												</p>
												<div class="post_buttons">
													<div class="post_button">
														<a href="<?= base_url() ?>home/course_details/<?= $course->id; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_small">LEARN MORE</a>
													</div>
													<div class="post_button">
														<a href="product-page.html" class="sc_button sc_button_square sc_button_style_filled sc_button_bg_link sc_button_size_small">BUY NOW</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Courses item -->
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Courses section -->