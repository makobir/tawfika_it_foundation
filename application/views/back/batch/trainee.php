
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
            <a class="nav-link <?php if($title == 'Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Batch</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'New Batch') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#new" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"></a>
         </li>
      </ul>
      <div class="tab-content" id="custom-content-below-tabContent">
         <div class="tab-pane fade <?php if($title == 'New Application') { echo 'show active'; }?>" id="new" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">          
         </div>
         <div class="tab-pane fade <?php if($title == 'Trainee') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
            <div class="card card-primary">
              <div class="card-body">                    
                 <form method="post" action="<?= base_url() ?>super_admin/trainee">
                <div class="row"> 
                  <div class="col-sm-3">                    
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <select name="batch_id" class="form-control" onchange="javascript:this.form.submit()">
                           <option value="">Select Batch</option>
                           <?php $batch = $this->input->post('batch_id'); foreach ($this->Super_admin_model->batch() as $key => $value) { ?>
                           <option value="<?php echo $value->id; ?>" <?php if($batch == $value->id) {echo 'selected';} ?>> <?php echo $value->id; ?> - <?php echo $value->session_start; ?> : <?php echo $value->session_end; ?></option>
                           <?php } ?>
                        </select>
                      </div>
                    </div> 
                  </div> 
                  <div class="col-sm-2">              
                    <div class="form-group"><!-- 
                       <button type="submit" class="btn btn-info">View Report </button> -->
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <div style="margin-top: 20px;">
              <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>Regi</th>
                  <th>Name</th>
                  <th>Batch</th>
                  <th>Course</th>
                  <th>Mobile</th>
                  <th>Admission Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                     $batch = $this->input->post('batch_id');
                     foreach ($this->Super_admin_model->trainee($batch) as $key => $value) {
                  ?>
                  <tr>
                    <td><?php echo $value->regi ?></td>
                    <td><?php echo $value->name ?></td>
                    <td><?php echo $value->batch ?></td>
                    <td><?php echo $value->course_id ?></td>
                    <td><?php echo $value->mobile ?></td>
                    <td><?php echo $value->admission_date ?></td>
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
