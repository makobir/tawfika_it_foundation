<div class="sptb bg-white">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row text-white">
             <?php foreach ($this->Home_model->all_event() as $events) {?>
               <div class="col-lg-3 col-md-12">
                  <div class="card-img">
                      <img src="<?= base_url() ?>upload/slider/1.jpg" alt="Los Angeles">
                       <h3>Holiday</h3>
                       <p>jksdhfjs dgdfgd fgfdg dgdf dgff kh jksdhfjs dgdfgd fgfdg dgdf dgff khff</p>
                       <span><a href="<?= base_url() ?>home/event_detail">Read More</a></span>
                  </div>
               </div>
              <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>

