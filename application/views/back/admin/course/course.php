<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Course') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Course</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'New Course') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">New Course</a>
         </li>        
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <?php if($title != 'Edit Course') { ?>
         <div class="tab-pane fade <?php if($title == 'New Course') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
            <div class="card card-primary" style="margin-top: 20px; width: 100%;">
            <div class="card-body"> 
                <form method="post" action="<?php echo base_url() ?>admin/add_course"  <?php echo form_open_multipart('upload/do_upload'); ?> 
                	<input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 20px 20px;">
                   <div class="formstyle">
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Course Title </label>
                                     <input type="text" name="title" id="title" class="form-control" required >
                                  </div>
                               </div>
                               <div class="col-md-2">
                                  <div class="form-group">
                                     <label>Duration</label>
                                     <input type="text" name="duration" id="course_fee" class="form-control" required >
                                  </div>
                               </div>
                               <div class="col-md-2">
                                  <div class="form-group">
                                     <label>Course Fee</label>
                                     <input type="text" name="course_fee" id="course_fee" class="form-control" required >
                                  </div>
                               </div>
                               <div class="col-md-2">
                                  <div class="form-group">
                                     <label>Certificate Fee</label>
                                     <input type="text" name="certificate_fee" id="certificate_fee" class="form-control" required >
                                  </div>
                               </div>
					              <div class="col-sm-12">
					                 <div class="form-group">
					                    <label>Short Description  </label>
					                    <textarea  id="editor0" name="short" rows="5" cols="100" class="form-control"> </textarea>
					                 </div>
					              </div>
					              <div class="col-sm-12">
					                 <div class="form-group">
					                    <label>Overview  </label>
					                    <textarea id="summernote" name="details" rows="10" cols="100" class="form-control"> </textarea>
					                 </div>
					              </div>
								<div class="col-lg-4 col-sm-6 hidden-xs">
                                   <label>Course Photo  </label>
				                   <input style="margin-bottom: 10px;" type="file" name="userfile" size="20" id="uploadFile" />
				                   <div id="imagePreview" class="well" ></div>
				                </div>
                            <center>
                               <hr style="margin:0; margin-top:5px; padding:5px;">
                               <button type="reset" class="btn btn-info" value="Reset">Resset</button>
                               <button type="submit" name="submit" class="btn btn-success"> Submit </button>
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
         <div class="tab-pane fade <?php if($title == 'Course') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Duration</th>
                  <th>Fee</th>
                  <th>Total Enrolled</th>
                  <th>Total Examinee</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Super_admin_model->course() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->title ?></td>
                    <td><?php echo $value->duration ?></td>
                    <td><?php echo $value->fee ?></td>
                    <td>
                     <?php $id = $value->id;
                     $enrolled = $this->Super_admin_model->cenrolled($id); 
                     echo $enrolled;
                     ?> 
                     </td>
                    <td>
                     <?php $id = $value->id;
                     $enrolled = $this->Super_admin_model->cexaminee($id); 
                     echo $enrolled;
                     ?>                        
                    </td>
                    <td>
                    
                    </td>
                  </tr>
                  <?php } ?>
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

<!-- Button trigger modal -->


<!-- Modal -->

<?php 
   foreach ($this->Super_admin_model->course() as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete this ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary left" data-dismiss="modal">No</button>
        <a href="<?= base_url() ?>super_admin/delete_course/<?php echo $value->id ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>