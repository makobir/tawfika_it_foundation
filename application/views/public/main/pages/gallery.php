

    <div class="columns_wrap margin_bottom_2_5em_imp sc_columns columns_nofluid sc_columns_count_2 content_container gallery_item ">
        <?php foreach ($this->Home_model->gallery_groups() as $gallery) {?>
        	<div class=" ">
        		<div class="sc_section font_1_25em lh_1_3em">
        			<h4 style="display: inline-block"><?= $gallery->title ?></h4>
        			<a href="<?= base_url() ?>home/gelllery_detail/<?= $gallery->id ?>" ><span>All Imge</span></a>
        			<hr>              
             <div class="page_content_wrap">
                <div class="content_wrap">
                   <div class="content">
                      <article class="post_item post_item_single post_featured_right post">
                         <section class="post_content">
                            <div id="gallery-1" class="gallery gallery-columns-3 gallery-size-medium_image">
                              <?php foreach ($this->Home_model->gallery_photos($gallery->id) as $key => $value) { ?>
                               <dl class="gallery-item">
                                  <dt class="gallery-icon landscape">
                                     <a href="#">
                                     <img src="<?=  base_url() ?>upload/gallery/<?= $value->userfile; ?>" class="attachment-medium_image" alt="" />
                                     </a>
                                  </dt>
                                  <dd class="gallery-caption">
                                    <?= $value->title; ?>
                                  </dd>
                               </dl>
                              <?php } ?>
                               <br class="clear" />
                            </div>            
                         </section>
                      </article>
                   </div>
                </div>
              </div>
        		</div>
    	    </div>
	    <?php } ?>


</div>