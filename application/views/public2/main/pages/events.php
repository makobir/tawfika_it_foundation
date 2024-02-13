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
                                <span class="post_info_item post_info_posted">Posted 
									<a href="#" class="post_info_date date updated">September 1, 2015</a>
								</span>
                                <span class="post_info_item post_info_posted_by">by 
									<a href="#" class="post_info_author">John Doe</a></span>
                                <span class="post_info_item post_info_counters">	
									<a class="post_counters_item post_counters_views icon-eye" title="Views - " href="#"></a>
									<a class="post_counters_item post_counters_comments icon-comment-1" title="Comments - 0" href="#">
										<span class="post_counters_number">0</span>
									</a>
									<a class="post_counters_item post_counters_likes icon-heart enabled" title="Like" href="#">
										<span class="post_counters_number"></span>
									</a>
                                </span>
                            </div>
                            <section class="post_content">
                                <div class="sc_reviews alignright"></div>
                                <div id="tribe-events" class="tribe-no-js">
                                    <div id="tribe-events-content-wrapper" class="tribe-clearfix">
                                        <input type="hidden" id="tribe-events-list-hash" value="">
                                        <div id="tribe-events-bar">
                                            <form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="#">
                                                <div id="tribe-bar-collapse-toggle">
                                                    Find Events<span class="tribe-bar-toggle-arrow"></span>
                                                </div>
												<div id="tribe-bar-views">
													<div class="tribe-bar-views-inner tribe-clearfix">
														<h3 class="tribe-events-visuallyhidden">Event Views Navigation</h3>
														<label>View As</label>
														<ul class="tribe-bar-views-list">
															<li class="tribe-bar-views-option tribe-bar-views-option-month tribe-bar-active" data-tribe-bar-order="1" data-view="month">   
																<a href="#"><span class="tribe-icon-month">Month</span></a>
															</li>
															<li class="tribe-bar-views-option tribe-bar-views-option-list" data-tribe-bar-order="0" data-view="list">   
																<a href="#"><span class="tribe-icon-list">List</span></a>
															</li>
															<li class="tribe-bar-views-option tribe-bar-views-option-day" data-tribe-bar-order="2" data-view="day">   
																<a href="#"><span class="tribe-icon-day">Day</span></a>
															</li>
														</ul>
													</div>
												</div>
                                                <div class="tribe-bar-filters">
                                                    <div class="tribe-bar-filters-inner tribe-clearfix">
                                                        <div class="tribe-bar-date-filter">
                                                            <label class="label-tribe-bar-date" for="tribe-bar-date">Events In</label>
                                                            <input type="text" class="pos_rel" name="tribe-bar-date" id="tribe-bar-date" value="" placeholder="Date">
                                                            <input type="hidden" name="tribe-bar-date-day" id="tribe-bar-date-day" class="tribe-no-param" value=""> 
														</div>
                                                        <div class="tribe-bar-search-filter">
                                                            <label class="label-tribe-bar-search" for="tribe-bar-search">Search</label>
                                                            <input type="text" name="tribe-bar-search" id="tribe-bar-search" value="" placeholder="Search"> 
														</div>
                                                        <div class="tribe-bar-submit">
                                                            <input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="Find Events" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tribe-events-content" class="tribe-events-month">
                                            <h2 class="tribe-events-page-title">Events for September 2015</h2>
                                            <div id="tribe-events-header" data-title="Events for September 2015 | Education Center">
                                                <h3 class="tribe-events-visuallyhidden">Calendar Month Navigation</h3>
                                                <ul class="tribe-events-sub-nav">
                                                    <li class="tribe-events-nav-previous">
                                                        <a data-month="2015-08" href="#" rel="prev">
															<span>&laquo;</span> August </a> 
													</li>
                                                    <li class="tribe-events-nav-next"></li>
                                                </ul>
                                            </div>
                                            <table class="tribe-events-calendar">
                                                <thead>
                                                    <tr>
                                                        <th id="tribe-events-monday" title="Monday" data-day-abbr="Mon">Mon</th>
                                                        <th id="tribe-events-tuesday" title="Tuesday" data-day-abbr="Tue">Tue</th>
                                                        <th id="tribe-events-wednesday" title="Wednesday" data-day-abbr="Wed">Wed</th>
                                                        <th id="tribe-events-thursday" title="Thursday" data-day-abbr="Thu">Thu</th>
                                                        <th id="tribe-events-friday" title="Friday" data-day-abbr="Fri">Fri</th>
                                                        <th id="tribe-events-saturday" title="Saturday" data-day-abbr="Sat">Sat</th>
                                                        <th id="tribe-events-sunday" title="Sunday" data-day-abbr="Sun">Sun</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="vcalendar">
                                                    <tr>
                                                        <td class="tribe-events-othermonth tribe-events-past mobile-trigger">
                                                            <div id="tribe-events-daynum-31">
                                                                31
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger">
                                                            <div id="tribe-events-daynum-1">
                                                                1
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger">
                                                            <div id="tribe-events-daynum-2">
                                                                2
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger">
                                                            <div id="tribe-events-daynum-3">
                                                                3
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-4">
                                                                4
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-5">
                                                                5
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-6">
                                                                6
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger">
                                                            <div id="tribe-events-daynum-7">
                                                                7
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-present mobile-trigger">
                                                            <div id="tribe-events-daynum-8">
                                                                8
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-9">
                                                                9
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-10">
                                                                10
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-11">
                                                                11
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-12">
                                                                12
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-13">
                                                                13
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-14">
                                                                14
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-15">
                                                                15
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-16">
                                                                16
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future tribe-events-has-events mobile-trigger">
                                                            <div id="tribe-events-daynum-17">
                                                                <a href="event-example.html">17</a>
                                                            </div>
                                                            <div id="tribe-events-event-1" class="tribe_events type-tribe_events tribe-events-last">
                                                                <h3 class="tribe-events-month-event-title entry-title summary">
																	<a href="event-example.html" class="url">Event Example</a>
																</h3>
																<div class="tribe-events-tooltip" id="tribe-events-tooltip-1">
																	<h4 class="entry-title summary">Event Example</h4>
																	<div class="tribe-events-event-body">
																		<div class="duration">
																			<abbr class="tribe-events-abbr updated published dtstart">September 17</abbr>
																		</div>																		
																		<div class="tribe-events-event-thumb">
																			<img alt="Event" src="http://placehold.it/75x75">
																		</div>
																		<p class="entry-summary description">New Event example</p>
																		<span class="tribe-events-arrow"></span>
																	</div>
																</div>
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-18">
                                                                18
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-19">
                                                                19
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-20">
                                                                20
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-21">
                                                                21
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-22">
                                                                22
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-23">
                                                                23
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-24">
                                                                24
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-25">
                                                                25
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-26">
                                                                26
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-27">
                                                                27
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-28">
                                                                28
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-29">
                                                                29
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-30">
                                                                30
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger">
                                                            <div id="tribe-events-daynum-1-new">
                                                                1
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-2-new">
                                                                2
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-3-new">
                                                                3
                                                            </div>
                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger tribe-events-right">
                                                            <div id="tribe-events-daynum-4-new">
                                                                4
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="tribe-events-footer">
                                                <h3 class="tribe-events-visuallyhidden">Calendar Month Navigation</h3>
                                                <ul class="tribe-events-sub-nav">
                                                    <li class="tribe-events-nav-previous">
                                                        <a href="#" rel="prev"><span>&laquo;</span> August </a></li>
                                                    <li class="tribe-events-nav-next"></li>
                                                </ul>
                                            </div>
                                            <a class="tribe-events-ical tribe-events-button" title="Use this to share calendar data with Google Calendar, Apple iCal and other compatible apps" href="#">+ Export Month's Events</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </article>
                    </div>
                </div>
				<!-- /Events calendar -->
				<!-- Related Posts Section -->
                <section class="related_wrap scroll_wrap">
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
                </section>
				<!-- /Related Posts Section -->
            </div>
            <!-- /Content -->