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
  height: 32px;
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


  tr,th, td {
    border: 1px solid #ddd !important;
  }

</style>

<script type="text/javascript">
  if(document.getElementById("testName").checked) {
    document.getElementById('testNameHidden').disabled = true;
  }
</script>
<div class="card card-primary" style="width: 100%;">
  <div class="card-body">                    
     <form method="post" action="<?= base_url() ?>admin/goque">
    <div class="row"> 
      <div class="col-sm-4">                    
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-book"></i>
              </span>
            </div>
            <select name="sub_id" class="form-control" onchange="javascript:this.form.submit()">
               <option value="">Select Course</option>
               <?php
                  $id = $this->input->post('sub_id'); foreach ($this->Super_admin_model->subject() as $key => $value) { ?>
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
<div class="card card-primary card-outline" style="width: 100%;">
  <div class="card-body">
     <div class="col-sm-12" style="padding-top: 20px">
        <table class="table table-striped table-bordered table-hover datatable">
          <tr>
            <td colspan="6" class="text-center" style="font-size:15pt">
              <?php if($this->Super_admin_model->s_exam($id) != NULL) { $exam = $this->Super_admin_model->s_exam($id);
                            echo $exam->title; }
              ?>   
              <br>
              Total Question :
              <?php $exa = $this->Super_admin_model->total_question($id);
                            echo $exa;
                            
              ?>
            </td>
          </tr>
          <tr>
            <td colspan="2"> Questions </td>
            <td colspan="4"> Answers </td>
          </tr>
          <?php 
          $x = 0;
         // $questions = $this->Super_admin_model->questions();
          if(isset($questions) && !empty($questions)){
          foreach ($questions as $key => $questions) {
            $x++;
           ?>
          
          <tr>
            <td><?php echo $x; ?> </td>
            <td> <?php echo $questions->content ?> </td>
             <?php 
             foreach ($this->Question_model->findAnswersByQuestion($questions->id) as $key => $answer) { 
              if($answer->correct == 1 ) {
                 ?>
                  <td style="color: green; font-weight: bold;"><i class="fa fa-check-circle"></i> <?php echo $answer->content ?> </td>
                <?php } else { ?>
                    <td> <?php echo $answer->content ?> </td>
            <?php } } ?>
          </tr>
        <?php } ?>
        <?php }else{ ?>
          <tr>
            <td colspan="8" class="text-center">No Data Found!</td>
          </tr>
        <?php } ?>
        </table>
     </div>
  <!-- Change Up -->
  </div>
</div>

