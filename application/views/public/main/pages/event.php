    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-full.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-theme.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-full-mobile.min.css" type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/main/css/events-calendar/tribe-events-theme-mobile.min.css" type="text/css" media="only screen and (max-width: 768px)" />

			<!-- Content -->		
            <div class="page_content_wrap">
				<!-- Events calendar -->
                <div class="content_wrap">
                    <div class="content">
                        <article class="post_item post_item_single page">
                            <div class="post_info">
                            </div>  
								<div class="columns_wrap margin_bottom_2_5em_imp sc_columns columns_nofluid sc_columns_count_2">
								    <?php foreach ($this->Home_model->all_event() as $events) {?>
    									<div class="column-1_2 sc_column_item sc_column_item_1 sc_info_st1 odd first ">
    										<div class="sc_section margin_bottom_2_5em_imp event_border font_1_25em lh_1_3em">
    											<img src="<?= base_url() ?>upload/event/download.jpg">
    											<h4 style="color:#376692;">TEST EVENT</h4>
    											<p>Study, have fun, uncover a new passion or learn
    											    have fun, uncover a new passionsimply dummy text 
    											    skills that just may change your life.
    											    <span class="event_btn"><a href="<?= base_url() ?>home/event_detail/<?= $events->id ?>" >Details</a></span>
    											</p>
    										</div>
    									</div>
									<?php } ?>
								</div>
                            </div>
                        </div>
                    </section>-->
                </article>
            </div>
        </div>
				<!-- /Events calendar -->
				<!-- Related Posts Section -->
                <!--<section class="related_wrap scroll_wrap">
                    <div class="content_wrap">
                        <h2 class="section_title">Related Posts</h2>
                        <div class="sc_scroll_container sc_scroll_controls sc_scroll_controls_horizontal sc_scroll_controls_type_top">
                            <div class="sc_scroll sc_scroll_horizontal swiper-slider-container scroll-container" id="related_scroll">
                                <div class="sc_scroll_wrapper swiper-wrapper">
                                    <div class="sc_scroll_slide swiper-slide">
                                        <article class="post_item post_item_related post_item_1">
                                            <div class="post_content">
                                                <div class="post_content_wrap">
                                                    <h4 class="post_title">
														<a href="courses-streampage.html">All courses</a>
													</h4>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="post_item post_item_related post_item_2">
                                            <div class="post_content">
                                                <div class="post_content_wrap">
                                                    <h4 class="post_title">
														<a href="video-tutorials.html">Video Tutorials</a>
													</h4>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="post_item post_item_related post_item_3">
                                            <div class="post_content">
                                                <div class="post_content_wrap">
                                                    <h4 class="post_title">
														<a href="#">All Events</a>
													</h4>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="post_item post_item_related post_item_4">
                                            <div class="post_content">
                                                <div class="post_content_wrap">
                                                    <h4 class="post_title">
														<a href="homepage-3.html">Homepage 3</a>
													</h4>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div id="related_scroll_bar" class="sc_scroll_bar sc_scroll_bar_horizontal related_scroll_bar"></div>
                            </div>
                            <div class="sc_scroll_controls_wrap">
                                <a class="sc_scroll_prev" href="#"></a>
                                <a class="sc_scroll_next" href="#"></a>
                            </div>
                        </div>
                    </div>
                </section>-->
				<!-- /Related Posts Section -->
            </div>
            <!-- /Content -->