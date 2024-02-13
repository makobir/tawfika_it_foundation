<div class="container">
    <div class="row">
        <?php foreach ($this->Home_model->gallery_groups() as $key => $gallery) { ?>          
        <div class="col-lg-12">
            <div class="g-title-area">
                <h4 class="g-title">Shetbostro Bitoro<span class="c-all-img"><a style="color: #000;" href="<?= base_url() ?>home/all_gallery">All Image</a></span></h4>
                
                <hr>
            </div>
        </div> 
        <?php foreach ($this->Home_model->gallery_photos($gallery->id) as $key => $photos) { ?>
        <div class="col-lg-4">
            <div class="g-img">
                <img src="<?= base_url() ?>upload/gallery/<?= $photos->userfile; ?>" alt="Los Angeles">
            </div>
        </div>
        <?php } } ?>
    </div>
    
</div>

