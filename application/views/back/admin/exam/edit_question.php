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
</style>

<script type="text/javascript">
  if(document.getElementById("testName").checked) {
    document.getElementById('testNameHidden').disabled = true;
  }
</script>

<div class="card card-primary" style="width:100%;"> 
  <form style="text-align: ; border: 1px" method="post" action="<?php echo base_url(); ?>super_admin/update_question/<?php echo $question->id; ?>" >
    <div class="card-body">
      <div class="row">
       
           
                <div class="col-sm-12">
                  <div class="form-group">
                     <label> Question </label>
                     <input type="text" name="question" class="form-control" required="required" value="<?php echo $question->content; ?>">
                  </div>
                </div>
                
                <?php 
                  $x = 0;
                  foreach ($answers as $key => $ans) {
                  $x++;
                ?>
                <div class="col-sm-6">
                  <label class="input-group container">
                    <input type="checkbox" id='testName' value="1"  name="correct[]" <?php if($ans->correct == 1){echo "checked";} ?>>
                    <input id='testNameHidden' type='hidden' value='0' name='correct[]'> 
                    <input type='hidden' value='<?php echo $ans->id; ?>' name='aid[]'> 
                    <span class="checkmark"></span>
                  </label>
                  <input id="in" type="text" class="form-control" name="content[]" placeholder="Answer <?php echo $x; ?>" required="required" value="<?php echo $ans->content; ?>">
                </div>
                <?php } ?>

                <div class="col-sm-6">
                  <br>
                    <input type="hidden" name="xmid" value="<?php echo $question->xmid; ?>">
                    <input type="hidden" name="id" value="<?php echo $question->id; ?>">
                    <input class="btn btn-info" type="submit" value="Update Now"> 
               </div>
            </form>
            <!-- Change Up -->
         </div>
      </div>
      <!-- /.box -->
   </div>


