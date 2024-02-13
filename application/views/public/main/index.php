<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
    <title><?= $title ?>  | <?php echo $this->data['site']; ?></title>
	<?php include'include/css.php' ?>
</head>
<body class="home page body_style_fullscreen body_filled article_style_stretch layout_single-standard top_panel_style_dark top_panel_opacity_transparent top_panel_show top_panel_over menu_right user_menu_show sidebar_hide">
    <a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-angle-double-up" data-url="" data-separator="yes"></a>
	<!-- Body -->
    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <header class="top_panel_wrap bg_tint_dark" style="background-color: #018763;">
				<!-- User menu -->
                <div class="menu_user_wrap">
                    <div class="content_wrap clearfix">
                        <div class="menu_user_area menu_user_right menu_user_nav_area">
                            <ul id="menu_user" class="menu_user_nav">
                                <!-- 
                                <li class="menu_user_controls">
                                    <a href="#">
										<span class="user_avatar">
											<img alt="" src="http://1.gravatar.com/avatar/45e4d63993e55fa97a27d49164bce80f?s=16&#038;d=mm&#038;r=g" srcset="http://1.gravatar.com/avatar/45e4d63993e55fa97a27d49164bce80f?s=32&amp;d=mm&amp;r=g 2x" class="avatar avatar-16 photo" height="16" width="16" />
										</span>
										<span class="user_name">John Doe</span></a>
                                    <ul>
                                        <li><a href="#" class="icon icon-doc-inv">New post</a></li>
                                        <li><a href="#" class="icon icon-cog-1">Settings</a></li>
                                    </ul>
                                </li> -->
                                <li style="background:transparent !important; padding: 0px 5px !important; font-size:16px">
                                <?php
                                include('date/class.banglaDate.php');
                                $bn = new BanglaDate(time());
                                $date = $bn->get_date();
                                //print_r($bn->get_date());
                                echo $date[0].'ই '.$date[1].' '.$date[2];
                                ?>
                                </li>
                                <li class="menu_user_logout" style="padding: 0px 5px !important; font-size:16px">
									<a href="<?= base_url() ?>home/donation" class="icon icon-logout">Donation</a>
								</li>
                                <li style="padding: 0px 5px !important; font-size:16px; background:red;">
									<a href="<?= base_url() ?>home/blood_donors" class="icon icon-logout"> <i class="sc_button_iconed icon-plus"></i> Blood Donors</a>
								</li>
								<li style="padding: 0px 5px !important; font-size:16px; background:#550b18; " ><a href="#">Downloads</a>
									<ul class="sub-menu">
										<li class="menu-item"><a href="<?= base_url() ?>upload/scholarship/Scholarship_Application_Form.pdf">Scholarship Form </a></li>
										<li class="menu-item"><a href="<?= base_url() ?>upload/scholarship/Admission_form.pdf">Admission Form </a></li>
										<li class="menu-item"><a href="<?= base_url() ?>upload/scholarship/Affiliation_form.pdf">Affiliation Form </a></li>
									</ul>
								</li>
                            </ul>
                        </div>
                    </div>
                </div>
				<!-- /User menu -->
				<!-- Main menu -->
                <div class="menu_main_wrap logo_left">					
                    <div class="content_wrap clearfix">
						<!-- Logo -->
                        <div class="logo">
                            <a href="<?= base_url(); ?>">
								<img src="<?= base_url() ?>upload/logo/logo.png" class="logo_main" alt="" style="margin-top: -15px;">
								<img src="<?= base_url() ?>upload/logo/logo2.png" class="logo_fixed" alt="">
							</a>
                        </div>
						<!-- Logo -->
						<!-- Search 
                        <div class="search_wrap search_style_regular search_ajax" title="Open/close search form">
                            <a href="#" class="search_icon icon-search-2"></a>
                            <div class="search_form_wrap">
                                <form method="get" class="search_form" action="#">
                                    <button type="submit" class="search_submit icon-zoom-1" title="Start search"></button>
                                    <input type="text" class="search_field" placeholder="" value="" name="s" title="" />
                                </form>
                            </div>
                            <div class="search_results widget_area bg_tint_light">
                                <a class="search_results_close icon-delete-2"></a>
                                <div class="search_results_content">
							</div>
                            </div>
                        </div>-->
						<!-- /Search -->
						<!-- Navigation -->
                        <a href="#" class="menu_main_responsive_button icon-menu-1"></a>
						<nav class="menu_main_nav_area">
							<ul id="menu_main" class="menu_main_nav">
								<li class="menu-item menu-item-has-children <?php if($menu == 'Home') { echo 'current-menu-ancestor current-menu-parent'; } ?>">
									<a href="<?= base_url() ?>">Home</a>				
								</li>
								<li class="menu-item menu-item-has-children <?php if($menu == 'About Us') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="#">About</a>
									<ul class="sub-menu">
										<li class="menu-item"><a href="<?= base_url() ?>page/about">About Us</a></li>
										<li class="menu-item"><a href="<?= base_url() ?>page/mission">Mission</a></li>
										<li class="menu-item"><a href="<?= base_url() ?>page/vision">Vision </a></li>
									</ul>
								</li>
							    <li class="menu-item menu-item-has-children <?php if($menu == 'Courses') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="#">Courses</a>
									<ul class="sub-menu">
									    <?php foreach($this->Home_model->frontcourse() as $course){ ?>
										<li class="menu-item"><a href="<?= base_url() ?>home/course_details/<?php echo $course->id; ?>"><?= $course->title; ?></a></li>
										<?php } ?>
										<li class="menu-item"><a href="<?= base_url() ?>home/allcourse">All Courses</a></li>
									</ul>
								</li>
								<!--
								<li class="menu-item menu-item-has-children  <?php if($menu == 'Courses') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="#">Courses</a>
									<ul class="sub-menu">
										<li class="menu-item menu-item-has-children"><a href="<?= base_url() ?>home/months/03">03 Months Course</a>
											<ul class="sub-menu">
												<?php 
												$duration = '03';
												$course = $this->Home_model->course($duration);
												foreach ($course as $key => $course) { 
												?>
												<li class="menu-item "><a href="<?= base_url() ?>home/course_details/<?php echo $course->id; ?>"><?php echo $course->title; ?> </a></li>
												<?php } ?>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children"><a href="<?= base_url() ?>home/months/06">06 Months Course</a>
											<ul class="sub-menu">
												<?php 
												$duration = '06';
												$course = $this->Home_model->course($duration);
												foreach ($course as $key => $course) { 
												?>
												<li class="menu-item"><a href="<?= base_url() ?>home/course_details/<?php echo $course->id; ?>"><?php echo $course->title; ?></a></li>
												<?php } ?>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children"><a href="<?= base_url() ?>home/months/12">01 Years Course</a>
											<ul class="sub-menu">
												<?php 
												$duration = '12';
												$course = $this->Home_model->course($duration);
												foreach ($course as $key => $course) { 
												?>
												<li class="menu-item"><a href="free-lesson.html">PGD in ICT </a></li>
												<?php } ?>
											</ul>
										</li>
									</ul>
								</li> -->
								<li class="menu-item menu-item-has-children <?php if($menu == 'Centers') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="#">Affiliation</a>
									<ul class="sub-menu">
										<li class="menu-item"><a href="<?= base_url() ?>home/registration">Center Registration</a></li>
										<li class="menu-item"><a href="<?= base_url() ?>home/verify_center">Verify Centers</a></li>
									</ul>
								</li>

								<!--
								<li class="menu-item menu-item-has-children"><a href="blog-streampage.html">Blog</a>
									<ul class="sub-menu">
										<li class="menu-item menu-item-has-children"><a href="#">Post Formats</a>
											<ul class="sub-menu">
												<li class="menu-item"><a href="post-formats-with-sidebar.html">With Sidebar</a></li>
												<li class="menu-item"><a href="post-formats.html">Without sidebar</a></li>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children"><a href="#">Masonry tiles</a>
											<ul class="sub-menu">
												<li class="menu-item"><a href="masonry-2-columns.html">Masonry (2 columns)</a></li>
												<li class="menu-item"><a href="masonry-3-columns.html">Masonry (3 columns)</a></li>
											</ul>
										</li>
										<li class="menu-item menu-item-has-children"><a href="#">Portfolio tiles</a>
											<ul class="sub-menu">
												<li class="menu-item"><a href="portfolio-2-columns.html">Portfolio (2 columns)</a></li>
												<li class="menu-item"><a href="portfolio-3-columns.html">Portfolio (3 columns)</a></li>
												<li class="menu-item menu-item-has-children"><a href="#">Portfolio hovers</a>
													<ul class="sub-menu">
														<li class="menu-item"><a href="portfolio-hovers-circle.html">Circle, Part 1</a></li>
														<li class="menu-item"><a href="portfolio-hovers-circle-part-2.html">Circle, Part 2</a></li>
														<li class="menu-item"><a href="portfolio-hovers-circle-part-3.html">Circle, Part 3</a></li>
														<li class="menu-item"><a href="portfolio-hovers-square.html">Square, Part 1</a></li>
														<li class="menu-item"><a href="portfolio-hovers-square-part-2.html">Square, Part 2</a></li>
														<li class="menu-item"><a href="portfolio-hovers-square-part-3.html">Square, Part 3</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</li> -->
								<li class="menu-item <?php if($menu == 'Notice') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="<?= base_url() ?>home/notice">Notice</a></li>
								<li class="menu-item <?php if($menu == 'Gallery') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="<?= base_url() ?>home/gallery">Gallery</a></li>
								<li class="menu-item  <?php if($menu == 'Result') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="<?= base_url() ?>home/result">Result</a></li>
								<li class="menu-item <?php if($menu == 'Events') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="<?= base_url() ?>home/events">Events</a></li>
								<li class="menu-item <?php if($menu == 'Contact') { echo 'current-menu-ancestor current-menu-parent'; } ?>"><a href="<?= base_url() ?>home/contact">Contact</a></li>
										
							</ul>
						</nav>
						<!-- /Navigation -->
                    </div>
                </div>
				<!-- /Main menu -->
            </header>
            <?php if($title == 'Home') { }
            else {?>             	
			<!-- Page title -->
			<div class="page_top_wrap page_top_title page_top_breadcrumbs sc_pt_st1 slider_wrap" style="margin-top:150px;">
			    <div class="content_wrap">
			        <div class="breadcrumbs">
			            <a class="breadcrumbs_item home" href="<?= base_url() ?>"><?php echo $menu ?></a>
						<span class="breadcrumbs_delimiter"></span>
						<span class="breadcrumbs_item current"><?php echo $title ?></span>
					</div>
			        <h3 class="page_title"><?php echo $title ?></h3>
			    </div>
			</div>
			<!-- /Page title -->

            <?php } echo $public; ?>


			<!-- Contacts Footer -->
            <footer class="contacts_wrap bg_tint_dark contacts_style_dark">
    			<div data-animation="animated zoomIn normal">					
					<div class="columns_wrap sc_columns  sc_columns_count_3">
						<div class="column-1_4 sc_column_item sc_column_item_1">
							<img style="height: 200px;" src="<?= base_url() ?>upload/logo/logo.png" class="logo_main" alt="">								
						</div>
						<div class="column-1_4 sc_column_item sc_column_item_2" style="text-align:left !important;">
							<h4 style="font-weight: bold;"> Contact Information</h4>
							<hr>
							<ul style="margin-left: -24px">
								<li style="list-style: none;"><i style="margin-right:5px" class="fas fa-map-marker-alt"></i>Address : <?php echo $this->data['address']; ?></li>
								<li style="list-style: none;"><i style="margin-right:5px" class="fal fa-mobile-alt"></i>Mobile : <?php echo $this->data['mobile']; ?> </li>
								<li style="list-style: none;"><i style="margin-right:5px" class="far fa-envelope"></i>Email : <?php echo $this->data['email']; ?> </li>
							</ul>
						</div>
						<div class="column-1_4 sc_column_item sc_column_item_2" style="text-align:left !important;">
							<h4 style="font-weight: bold;"> Social Links .. </h4>
							<hr>
							<ul style="margin-left: -24px">
								<li style="list-style: none;"><i style="margin-right:5px" class="fas fa-map-marker-alt"></i>Facebook : <?php echo $this->data['fb']; ?></li>
								
							</ul>
						</div>
						<div class="column-1_4 sc_column_item sc_column_item_2" style="text-align:left !important;">
							<h4 style="font-weight: bold;"> Important Links .. </h4>
							<hr>
							<ul style="margin-left: -24px">
								<li style="list-style: none;"><i style="margin-right:5px" class="fas fa-map-marker-alt"></i>About US </li>
								<li style="list-style: none;"><i style="margin-right:5px" class="fal fa-mobile-alt"></i>Admission</li>
								<li style="list-style: none;"><i style="margin-right:5px" class="far fa-envelope"></i>Donate</li>
							</ul>
						</div>				
					</div>
				</div>       
            </footer>
            <!-- /Contacts Footer -->
			<!-- Copyright -->
            <div class="copyright_wrap">
                <div class="content_wrap">
                    <p>© 2018 All Rights Reserved. <a href="#">Terms of use</a> and <a href="#">Privacy Policy</a></p>
                </div>
            </div>
			<!-- /Copyright -->
        </div>
    </div>
    <!-- /Body -->
    <a href="#" class="scroll_to_top icon-up-2" title="Scroll to top"></a>
    <div class="custom_html_section"></div>
		
	<?php include 'include/js.php' ?>
	
	<!--<script type="text/javascript" src="js/core.customizer/front.customizer.min.js"></script>
	<script type="text/javascript" src="js/skin.customizer.min.js"></script>-->
   

</body>

</html>