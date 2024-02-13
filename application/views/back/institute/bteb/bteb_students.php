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
<style type="text/css">

    #imagePreview,#imagePreview2 {
        width: 100px;
        height:100px;
        background-position: center center;
        background-size: cover;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
    </style>

<div class="card card-primary card-outline" style="width: 100%">
<div class="card-body">
<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
   <li class="nav-item">
      <a class="nav-link <?php if($title == 'BTEB Students') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#all" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Students</a>
   </li>
</ul>
<div class="tab-content" id="custom-content-below-tabContent">
   <div class="tab-pane fade <?php if($title == 'BTEB Students') { echo 'show active'; }?>" id="all" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
      <div class="card card-primary">
         <div class="card-body">
            <div style="margin-top: 20px;">
               <table id="example1" class="table table-bordered table-striped" >
                  <thead>
                     <tr class="text-center">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Registration</th>
                        <th>Course</th>
                        <th>Mobile</th>
                        <th>Result</th>
                        <th>Delivery Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=1; if($this->Institute_model->bteb_trainee() != NULL){ foreach ($this->Institute_model->bteb_trainee() as $key => $t) { ?>
                     <tr class="text-center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $t->name; ?></td>
                        <td><?php echo $t->registration; ?></td>
                        <td><?php echo $t->course; ?></td>
                        <td><?php echo $t->mobile; ?></td>
                        <td><?php echo $t->result; ?></td>
                        <td><?php echo $t->cert_deliver; ?>, <?php echo $t->by; ?>, <?php echo $t->deliver_date; ?><br></td>
                        <td>
                           <div class="btn-group">
                              <a href="<?= base_url() ?>institute/trainee/<?php echo $t->regi; ?>" class="btn btn-default"> <i class="fa fa-eye"></i> </a>
                              <a href="<?= base_url() ?>institute/deliveryinfo/<?php echo $t->regi; ?>" class="btn btn-default"> <i class="fa fa-certificate"></i> </a>                     
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $t->regi ?>"><i class="fa fa-trash"></i></button>       
                           </div>
                        </td>
                     </tr>
                     <?php $i++; } } ?>
                  </tbody>
                  <tfoot>
                  </tfoot>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   function run() {
       document.getElementById("srt").value = document.getElementById("Ultra").value;
   }
</script>


<?php 
   foreach ($this->Institute_model->bteb_trainee() as $key => $value) {
?>
<div class="modal fade" id="exampleModal<?php echo $value->regi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a href="<?= base_url() ?>institute/delete_bteb_trainee/<?php echo $value->regi ?>" type="button" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>