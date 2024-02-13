<!-- Content without sidebar -->
<div class="page_content_wrap">
    <div class="content">
		<article class="post_item post_item_single page">						
            <section class="post_content">
				<!-- Features section -->
				<div class="sc_section">
					<div class="sc_content content_wrap margin_top_3em_imp margin_bottom_3em_imp">
						<div class="columns_wrap sc_columns columns_fluid sc_columns_count_3">
							<div class="column-1_3 sc_column_item sc_column_item_1 odd first text_center">
								<span class="sc_icon icon-mail-2 link_color font_5em lh_1em"></span>
								<div class="sc_section margin_top_1em_imp">
									<p><a href="#"><?php echo $this->data['email']; ?></a><br />
										<a href="#"><?php echo $this->data['domain']; ?></a>
									</p>
								</div>
							</div>
							<div class="column-1_3 sc_column_item sc_column_item_2 even text_center">
								<span class="sc_icon icon-telephone-2 link_color font_5em lh_1em"></span>
								<div class="sc_section margin_top_1em_imp sc_features_st1">
									<p><?php echo $this->data['mobile']; ?>
									
									</p>
								</div>
							</div>
							<div class="column-1_3 sc_column_item sc_column_item_3 odd text_center">
								<span class="sc_icon icon-map-2 link_color font_5em lh_1em"></span>
								<div class="sc_section margin_top_1em_imp sc_features_st1">
									<p><?php echo $this->data['address']; ?><br /> 
									
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Features section -->
				<!-- Contact form -->
				<div class="sc_section bg_tint_dark sc_contact_bg_img">
					<div class="sc_section_overlay sc_contact_bg_color" data-overlay="0.8" data-bg_color="#024b5e">
						<div class="sc_section_content">
							<div class="sc_content content_wrap margin_top_3em_imp margin_bottom_3_5em_imp">
							    <div>
						        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227.83100827659885!2d90.32141560489923!3d23.985317784474045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755dafaffffffff%3A0xc193f48d5e10ba59!2sTawfika%20Technical%20Training%20Institute!5e0!3m2!1sbn!2sbd!4v1639388884108!5m2!1sbn!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						    </div>
								<div id="sc_contact_form" class="sc_contact_form sc_contact_form_standard aligncenter width_80per">
									<h2 class="sc_contact_form_title">Contact Us Today</h2>
									<p class="sc_contact_form_description">Your email address will not be published. Required fields are marked *</p>
									<form id="sc_contact_form_1" data-formtype="contact" method="post" action="#">
										<div class="sc_contact_form_info">
											<div class="sc_contact_form_item sc_contact_form_field label_over">
												<label class="required" for="sc_contact_form_username">Name</label>
												<input id="sc_contact_form_username" type="text" name="username" placeholder="Name *">
											</div>
											<div class="sc_contact_form_item sc_contact_form_field label_over">
												<label class="required" for="sc_contact_form_email">E-mail</label>
												<input id="sc_contact_form_email" type="text" name="email" placeholder="E-mail *">
											</div>
											<div class="sc_contact_form_item sc_contact_form_field label_over">
												<label class="required" for="sc_contact_form_subj">Subject</label>
												<input id="sc_contact_form_subj" type="text" name="subject" placeholder="Subject">
											</div>
										</div>
										<div class="sc_contact_form_item sc_contact_form_message label_over">
											<label class="required" for="sc_contact_form_message">Message</label>
											<textarea id="sc_contact_form_message" name="message" placeholder="Message"></textarea>
										</div>
										<div class="sc_contact_form_item sc_contact_form_button">
											<button>SEND MESSAGE</button>
										</div>
										<div class="result sc_infobox"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Contact form -->
            </section>
        </article>
    </div>
</div>
            <!-- /Content without sidebar -->