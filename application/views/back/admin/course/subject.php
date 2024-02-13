
<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Subject') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Subject</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'New Subject') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">New Subject</a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'New Subject') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
        <div class="card card-primary" style="margin-top: 20px; width: 100%;">
            <div class="card-body"> 
                <form method="post" action="<?php echo base_url() ?>admin/add_subject" <?php echo form_open_multipart('upload/do_upload'); ?> 
                	<input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 20px 20px;">
                   <div class="formstyle">
                            <div class="row">
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Select Course Fee</label>
                                    <select name="course_id" class="form-control"  >
                                       <option value="">Select Course</option>
                                       <?php foreach ($this->Super_admin_model->course() as $key => $value) { ?>
                                       <option value="<?php echo $value->id; ?>"> <?php echo $value->title; ?> </option>
                                       <?php } ?>
                                    </select>
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Subject Title</label>
                                     <input type="text" name="title" id="holdingno" class="form-control" required >
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Subject Code</label>
                                     <input type="text" name="scode" id="holdingno" class="form-control" required >
                                  </div>
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
         <div class="tab-pane fade <?php if($title == 'Subject') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
            <div class="card card-primary">
              <div class="card-body">                    
                 <form method="post" action="<?= base_url() ?>admin/subject">
                <div class="row"> 
                  <div class="col-sm-4">                    
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <select name="course_id" class="form-control" onchange="javascript:this.form.submit()">
                           <option value="">Select Course</option>
                           <?php
                              $id = $this->input->post('course_id'); foreach ($this->Super_admin_model->course() as $key => $value) { ?>
                           <option value="<?php echo $value->id; ?>"  <?php if($id == $value->id) {echo 'selected';} ?>> <?php echo $value->title; ?> </option>
                           <?php } ?>
                        </select>
                      </div>
                    </div> 
                  </div> 
                  <div class="col-sm-2">              
                    <div class="form-group">
                     <!--   <button type="submit" class="btn btn-info">View Report </button> -->
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Subject Title</th>
                  <th>Course</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $id = $this->input->post('course_id');
                     foreach ($this->Super_admin_model->subjects($id) as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->title ?></td>
                    <td>
                     <?php 
                        $id = $value->course_id;
                        $course = $this->Super_admin_model->courseby($id);
                        echo $course->title; 
                     ?>                        
                     </td>
                     <td>
                       
                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $value->id ?>">Delete</button>
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


<?php 
   foreach ($this->Super_admin_model->subjects($id) as $key => $value) {
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
        <a href="<?= base_url() ?>super_admin/delete_subject/<?php echo $value->id ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>