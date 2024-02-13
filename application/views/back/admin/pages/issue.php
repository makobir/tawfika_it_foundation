

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Issue Certificate') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Issue Certificate</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Reissue Application') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#reissue" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Reissue Application</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Certificates') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Issued Certificates</a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
        <div class="tab-pane fade <?php if($title == 'Issue Certificate') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
        <div class="card card-primary" style="margin-top: 0px; width: 100%;">
          <div class="card-body">
             <form method="post" action="<?php echo base_url() ?>certificates/issue">
                <input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 0px 20px;">
                   <div class="formstyle">
                      <div class="row">
                         <div class="card card-primary" style="width: 100%;">
                            <div class="card-header">
                               Certifiate issue form
                            </div>
                            <div class="card-body">
                               <div class="row">
                                  <div class="col-sm-6">
                                     <select class="form-control select2" name="code"  onchange="javascript:this.form.submit()">
                                        <option value="">Select Center</option>
                                        <?php foreach ($this->Certificates_model->centers() as $key => $value) { ?>                       
                                        <option <?php if($id == $value->code) {echo 'selected';}?>  value="<?php echo $value->code; ?>"><?php echo $value->site_name; ?> - <?php echo $value->code; ?></option>
                                        <?php } ?>
                                     </select>
                                    </form>
                                    <form method="post" action="<?= base_url();?>certificates/issue_cert">
                                  </div> 
                                 <?php foreach ($documents as $key => $value) { 
                                    $check = $this->Certificates_model->markscheck($value->trainee_id);
                                    $marks = $check->mcq+$check->viva+$check->practical+$check->typing;
                                    if($marks >= 120) {
                                      $issue_check = $this->Certificates_model->issue_check($value->trainee_id);
                                      if($issue_check == NULL){
                                    ?> 
                                  <div class="col-sm-3">                            
                                    <div class="input-group" style="width: 250px;">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <input style="width:20px; height: 20px;" type="checkbox" name="trainee_id[]" value="<?= $value->trainee_id; ?>">
                                        <input type="hidden" name="code" value="<?= $id; ?>">
                                        </span>
                                      </div>            
                                      <div class="input-group-append">
                                          <div class="input-group-text" >
                                            <?= $value->trainee_id; ?>
                                          </div>
                                      </div>          
                                    </div>  
                                  </div>
                                  <?php } } } 
                                    if($documents!= NULL) {
                                  ?>                 
                                 <div class="col-sm-3">
                                    <button type="submit" class="btn btn-info"> Submit</button>
                                 </div>
                                  <?php } ?>
                               </div> 
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
          </div>
          </div>
        </div>
         <div class="tab-pane fade <?php if($title == 'Reissue Application') { echo 'show active'; }?>" id="reissue" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                  <th>Regi</th>
                  <th>Student Name</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $id = 1;
                    if($this->Certificates_model->reissue_applications() != NULL) {
                     foreach ($this->Certificates_model->reissue_applications() as $key => $value) {    
                  ?>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $value->type ?></td>
                    <td><?php echo $value->regi ?></td>
                    <td>
                      <?php 
                      $trainee = $this->Certificates_model->trainee($value->regi); 
                      echo $trainee->name; 
                      ?>                      
                    </td>
                    <td><?php echo $value->status ?></td>
                    <td><?php echo $value->date ?></td>
                    <td> <a class="btn btn-default" href="<?= base_url() ?>certificates/approve_now/<?php echo $value->regi ?>">Approve Now</a></td>
      
                  </tr>
                  <?php $id++; } } ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>   
          <div class="tab-pane fade <?php if($title == 'All Certificates') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                  <th>Regi</th>
                  <th>Student Name</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $id = 1;
                     foreach ($this->Certificates_model->certificates() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $value->type ?></td>
                    <td><?php echo $value->regi ?></td>
                    <td>
                      <?php 
                      $trainee = $this->Certificates_model->trainee($value->regi); 
                      echo $trainee->name; 
                      ?>                      
                    </td>
                    <td><?php echo $value->status ?></td>
                    <td><?php echo $value->date ?></td>
      
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