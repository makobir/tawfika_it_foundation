<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<style type="text/css">/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 36px;
  width: 32px;
  background-color: #fdca91;
  margin-top: 13px;
  border: 1px solid #fdca91;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 11px;
  top: 8px;
  width: 6px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
#in {
  padding-left: 40px;
}
</style>

<script type="text/javascript">
  if(document.getElementById("testName").checked) {
    document.getElementById('testNameHidden').disabled = true;
  }
</script>

   <!-- Calendar -->
   <div class="card card-primary card-outline " style="padding: 10px 20px; width:100%;">
      <div class="card-header">
         <?= $title ?> 
         <!-- tools box -->
         <!-- /. tools -->
         <h4 class="text-center" style="color: green">
            <?php
               $msg = $this->session->userdata('message');
               if ($msg) {
                   echo $msg;
                   $this->session->unset_userdata('message');
               }
               ?>
         </h4>
      </div>
      <!-- /.box-header -->
      <div class="card-body">
        <form style="text-align: ; border: 1px" method="post" action="<?php echo base_url(); ?>admin/add_question_info" >
         <div class="row" style="padding-top: 20px">
            <!--Form  Start here-->            
              <?php 
              if($limit == NULL){
                $limit = 200;
              }else{
                $limit = $limit->ques_limit;
              }
              if($total_question < $limit){
              if($exm_id == '') { ?>
                <div class="col-sm-4">
                  <div class="form-group">
                     <label>Select Subject </label>
                     <select class="form-control" name="xmid" id="category" required="required">
                      <?php foreach ($this->Super_admin_model->subject() as $key => $value) { ?>
                        <option value="<?= $value->id; ?>"><?= $value->title; ?></option>
                      <?php } ?>
                     </select>
                  </div>
                </div>
                <?php }else{ ?>
                  <div class="col-sm-3">
                    <div class="form-group">
                       <label> Subject: 
                         <?php
                            $exm_id = $this->session->userdata('exam');                      
                            $exam = $this->Super_admin_model->s_exam($exm_id);
                            echo $exam->title;
                            //echo $exm_id;
                         ?>
                        </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                       <label> Questions Found:
                       	<font style="color: red;"> 
                         <?php
                            echo ($total_question);
                         ?>
                     	</font>
                        </label>
                    </div>
                 </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                       <a class="btn btn-default" href="<?= base_url() ?>admin/question"><i class="fa fa-plus"></i> New Subject </a>
                    </div>
                 </div>
                <?php } ?>
                <div class="col-sm-12">
                  <div class="form-group">
                     <label> Question </label>
                     <input type="text" name="question" class="form-control" required="required">
                  </div>
                </div>
     
                <div class="col-sm-6">
                  <label class="input-group container">
                    <input type="checkbox" id='testName' value="1"  name="correct[]">
                    <input id='testNameHidden' type='hidden' value='0' name='correct[]'> 
                    <span class="checkmark"></span>
                  </label>
                  <input id="in" type="text" class="form-control" name="content[]" placeholder="Answer 1" required="required">
                </div>
                <div class="col-sm-6">
                  <label class="input-group container">
                    <input type="checkbox" value="1" name="correct[]">
                    <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                    <span class="checkmark"></span>
                  </label>
                  <input id="in" type="text" class="form-control" name="content[]" placeholder="Answer 2" required="required">
                </div>
                <div class="col-sm-6">
                  <label class="input-group container">
                    <input type="checkbox" value="1"  name="correct[]">
                    <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                    <span class="checkmark"></span>
                  </label>
                  <input id="in" type="text" class="form-control" name="content[]" placeholder="Answer 3" required="required">
                </div>
                <div class="col-sm-6">
                  <label class="input-group container">
                    <input type="checkbox" value="1"  name="correct[]">
                    <input id='testNameHidden' type='hidden' value='0' name='correct[]'>
                    <span class="checkmark"></span>
                  </label>
                  <input id="in" type="text" class="form-control" name="content[]" placeholder="Answer 4" required="required">
                </div>
                
                <div class="col-sm-6">
                  <br>
                    <p style="color: red;">[N.B. Please Mark the Correct Answer before Submit]</p>
                    <input class="btn btn-info" type="submit"; value="Submit now"> 
                    <input class="btn btn-success" type="reset"; value="Reset Inputs"> 
               </div>
               <?php }else{ 
                $this->session->unset_userdata('group');
                $this->session->unset_userdata('category');
                $this->session->unset_userdata('exam');
                ?>
                <div class="col-sm-12">
                  <p class="text-center" style="color: red;">Question Limit Reached</p>
                </div>
               <?php } ?>
            </form>
            <!-- Change Up -->
         </div>
      </div>
      <!-- /.box -->
   </div>


<!--
<script type="text/javascript">
  $(document).ready(function(){
   $('#group').change(function(){
    var gid = $('#group').val();
    if(gid != '')
    {
     $.ajax({
      url:"<?php echo base_url(); ?>super_admin/fetch_exam_category",
      method:"POST",
      data:{gid:gid},
      success:function(data)
      {
       $('#category').html(data);
      }
     });
    }
    else
    {
     $('#category').html('<option value="">Select</option>');
    }
   });

   $('#category').change(function(){
    var cid = $('#category').val();
    if(cid != '')
    {
     $.ajax({
      url:"<?php echo base_url(); ?>super_admin/fetch_exam",
      method:"POST",
      data:{cid:cid},
      success:function(data)
      {
       $('#exam').html(data);
      }
     });
    }
    else
    {
     $('#exam').html('<option value="">Select</option>');
    }
   });
  });

</script>

-->