
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
           $("#sim").hide();
           $("#card").hide();
        $("#load").show();
      }
       else  
      {
        $("#load").hide();
        $("#sim").hide();
        $("#card").hide();
      }
    });
});

</script>

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'Batch') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Batch</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'New Batch') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">New Batch</a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'New Application') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">           
          <div class="card card-primary" style="margin-top: 20px; width: 100%;">
              <div class="card-body"> 
                <form method="post" action="<?php echo base_url() ?>super_admin/new_batch"> 
                <input type="hidden" id="srt" name="type" placeholder="get value on option select">
                <div style="padding: 20px 20px;">
                   <div class="formstyle">
                            <div class="row">
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Batch Title</label>
                                     <input type="text" name="title" class="form-control" placeholder="1st Batch" required >
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Start</label>
                                     <input type="text" name="start" class="form-control" placeholder="01-01-2000" required >
                                  </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                     <label>Ends</label>
                                     <input type="text" name="end" class="form-control" placeholder="31-06-2000" required >
                                  </div>
                               </div>
                            <center>
                               <hr style="margin:0; margin-top:21px; padding:5px;">
                               <button type="reset" class="btn btn-info" value="Reset">Save</button>
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
         <div class="tab-pane fade <?php if($title == 'Batch') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Total Enrolled</th>
                  <th>Total Examinee</th>
                  <th>Duration</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     foreach ($this->Super_admin_model->batch() as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->id ?></td>
                    <td><?php echo $value->title ?></td>
                    <td>
                     <?php $id = $value->id;
                     $enrolled = $this->Super_admin_model->enrolled($id); 
                     echo $enrolled;
                     ?> 
                     </td>
                    <td>
                     <?php $id = $value->id;
                     $enrolled = $this->Super_admin_model->examinee($id); 
                     echo $enrolled;
                     ?>                        
                    </td>
                    <td><?php echo $value->session_start.' - '.$value->session_end ?></td>
                    <td>
                      <?php if ($value->status == 'Active') { ?>
                        <button class="btn btn-success"> Active </button>
                      <?php }else { ?>
                        <a href="<?= base_url() ?>super_admin/active_batch/<?php echo $value->id; ?>" class="btn btn-default"> Active Now  </a>
                      <?php } ?>                     
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




<script src="<?php echo base_url() ?>assets/back/plugins/jquery/jquery.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
          $('#division').change(function(){
           var division = $('#division').val();
           if(division != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_district",
             method:"POST",
             data:{division:division},
             success:function(data)
             {
              $('#district').html(data);
             }
            });
           }
           else
           {
            $('#district').html('<option value="">Select</option>');
           }
          });

          $('#district').change(function(){
           var district = $('#district').val();
           if(district != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_upazila",
             method:"POST",
             data:{district:district},
             success:function(data)
             {
              $('#upazila').html(data);
             }
            });
           }
           else
           {
            $('#upazila').html('<option value="">Select</option>');
           }
          });

          $('#upazila').change(function(){
           var upazila = $('#upazila').val();
           if(upazila != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_union",
             method:"POST",
             data:{upazila:upazila},
             success:function(data)
             {
              $('#union').html(data);
             }
            });
           }
           else
           {
            $('#union').html('<option value="">Select</option>');
           }
          });

          $('#union').change(function(){
           var union = $('#union').val();
           if(union != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_village",
             method:"POST",
             data:{union:union},
             success:function(data)
             {
              $('#village').html(data);
             }
            });
           }
           else
           {
            $('#village').html('<option value="">Select</option>');
           }
          });

          $('#union').change(function(){
           var union = $('#union').val();
           if(union != '')
           {
            $.ajax({
             url:"<?php echo site_url()?>home/fetch_post",
             method:"POST",
             data:{union:union},
             success:function(data)
             {
              $('#post').html(data);
             }
            });
           }
           else
           {
            $('#post').html('<option value="">Select</option>');
           }
          });

         });
      </script>
