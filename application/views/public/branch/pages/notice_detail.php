<section class="notice-details-area">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="notice-details">
               <h2 class="title"><?= $notice->title ?></h>
               <?php if($notice->userfile != NULL) {?>
                    
               <?php } ?>
               <div class="text notice-text">
                   <h5><?= $notice->details ?></h5>
                   <img src="<?= base_url() ?>upload/notice/<?= $notice->userfile; ?>"; ?>
               </div>
                               
               
               <?php if($notice->pdf != NULL) { ?>
               
                      <a href="<?= base_url();?>upload/notice/<?= $notice->pdf; ?>" class="btn btn-success btn-xs">
                      <i class="fa fa-download"></i>Download</a>
                      <iframe src="<?= base_url();?>upload/notice/<?= $notice->pdf; ?>" width="100%" height="800px" frameborder="0" style="margin-top: 15px;"></iframe>
                
               <?php } ?>
            </div>
         </div>
         <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
            <div class="sidebar">
               <div class="sidebar-widget">
                  <div class="detail-title-bg">
                     <h2 class="sidebar-title text-center">Latest Notice</h2>
                  </div>
                  <ul class="widget-notice">
                      <?php $i= 1; foreach ($this->Home_model->all_notice() as $notice) {?>
                     <li>
                        <a href="#">
                        <span class="title"><?= $notice->title ?></span>
                        <span class="date"><span class="icon"><i class="far fa-calendar-alt"></i></span> Jan 6, 2021</span>
                        <span class="date"><span class="icon"><i class="fas fa-user"></i></span> By / Admin</span>
                        <span class="date"><span class="icon"><i class="fas fa-users"></i></span> Notice for: All</span>
                        </a>
                     </li>
                     <?php $i++; } ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>