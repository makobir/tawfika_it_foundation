

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Reissue Certificate') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Reissue Application</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Certificates') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">All Issued Certificates</a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'Reissue Certificate') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
          <div class="card card-primary" style="margin-top: 0px; width: 100%;">
            <div class="card-body"> 
              <form method="post" action="<?php echo base_url() ?>certificates/reissue_cert"> 
                	<input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 0px 20px;">
                   <div class="formstyle">
                      <div class="row"><div class="card card-primary" style="width: 100%;">
                          <div class="card-header">
                            Certifiate Reissue Application
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                                <input type="text" name="id" class="form-control" placeholder="Registration Number">
                              </div>
                              <div class="col-sm-3">
                                <button type="submit" class="btn btn-info"> Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            </form>    
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $id = 1;
                     foreach ($this->Certificates_model->all_certificates() as $key => $value) {
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
                    <td>
                        <a class="btn btn-info" href="<?= base_url() ?>institute/certificate/<?php echo $value->regi ?>">Print Preview</a>
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