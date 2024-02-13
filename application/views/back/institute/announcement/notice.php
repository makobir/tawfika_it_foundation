

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'New Notice') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-home" aria-selected="true">New Notice</a>
         </li>
         <?php if($title == 'Edit Notice') { ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Edit Notice') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#edit" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Edit Notice</a>
         </li>
          <?php } ?>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Notice') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Notice</a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
          <?php if($title == 'New Notice') { ?>
         <div class="tab-pane fade <?php if($title == 'New Notice') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
          <div class="card card-primary" style="margin-top: 0px; width: 100%;">
            <div class="card-body"> 
              <form method="post" action="<?php echo base_url() ?>institute/publish_notice"<?php echo form_open_multipart('upload/do_upload'); ?> 
                	<input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 0px 20px;">
                   <div class="formstyle">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                 <label> Title </label>
                                 <input type="text" name="title" id="title" class="form-control" required >
                            </div>
                          </div>                              
					              <div class="col-sm-12">
					                 <div class="form-group">
					                    <label>Short Description  </label>
					                    <textarea  id="editor0" name="short" rows="3" cols="100" class="form-control"> </textarea>
					                 </div>
					              </div>
					              <div class="col-sm-12">
					                 <div class="form-group">
					                    <label>Overview  </label>
					                    <textarea id="summernote" name="details" > </textarea>
					                 </div>
					              </div>
								        <div class="col-lg-4 col-sm-6 hidden-xs">
				                   <input style="margin-bottom: 10px;" type="file" name="userfile" size="20" id="uploadFile" />
				                   <div id="imagePreview" class="well" ></div>
				                </div>
                        <center>
                           <hr style="margin:0; margin-top:5px; padding:5px;">
                           <button type="reset" class="btn btn-info" value="Reset">Resset</button>
                           <button type="submit" name="submit" class="btn btn-success"> Publish </button>
                           <center>
                              <!-- <input type="submit" value="সাবমিট" class="btn btn-success"> -->
                           </center>
                        </center>
                      </div>
                    </div>
                </div>
            </div>
            </form>    
          </div>   
         </div>         
         <?php } if($title == 'Edit Notice') { ?>
         <div class="tab-pane fade <?php if($title == 'Edit Notice') { echo 'show active'; }?>" id="edit" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
          <div class="card card-primary" style="margin-top: 0px; width: 100%;">
            <div class="card-body"> 
              <form method="post" action="<?php echo base_url() ?>institute/update_notice"<?php echo form_open_multipart('upload/do_upload'); ?> 
                  <input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 0px 20px;">
                   <div class="formstyle">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                 <label> Title </label>
                                 <input type="text" name="title" id="title" class="form-control" value="<?= $notice->title; ?>" >
                                 <input type="hidden" name="id" id="title" class="form-control" value="<?= $notice->id; ?>" >
                            </div>
                          </div>                              
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label>Short Description  </label>
                              <textarea  id="editor0" name="short" rows="3" cols="100" class="form-control"> <?= $notice->short; ?></textarea>
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group">
                              <label>Overview  </label>
                              <textarea id="summernote" name="details" > <?= $notice->details; ?></textarea>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 hidden-xs">
                           <input style="margin-bottom: 10px;" type="file" name="userfile" size="20" id="uploadFile" />
                           <div id="imagePreview" class="well" ></div>
                        </div>
                        <center>
                           <hr style="margin:0; margin-top:5px; padding:5px;">
                           <button type="reset" class="btn btn-info" value="Reset">Resset</button>
                           <button type="submit" name="submit" class="btn btn-success"> Publish </button>
                           <center>
                              <!-- <input type="submit" value="সাবমিট" class="btn btn-success"> -->
                           </center>
                        </center>
                      </div>
                    </div>
                </div>
            </div>
            </form>    
          </div>   
         </div>
          <?php } ?>
         <div class="tab-pane fade <?php if($title == 'All Notice') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Publish Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $id = 1;
                     foreach ($this->Institute_model->all_notice() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $value->title ?></td>
                    <td><?php echo $value->date ?></td>
                    <td>
                      <a href="<?= base_url() ?>institute/edit_notice/<?php echo $value->id ?>"><i class="fa fa-edit"></i> Edit</a>
                    </td>
      
                  </tr>
                  <?php $id++; } ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
          
    </div>
</div>





<script type="text/javascript">
 $(document).ready(function() {
  var t = $('#summernote').summernote(
  {
  height: 150,
  focus: true
}
  );
  $("#btn").click(function(){
    $('div.note-editable').height(150);
  });
});
</script>