<style type="text/css">
  .submit {padding: 5px 10px;}
  .panel-default {background-color: #ffffffa1 !important;}
  .panel-heading {min-height: 65px !important}
  .panel-body {background: transparent ;}
  .panel-body:hover {background: transparent !important;}
  .btn-result {padding: 6px 18px;margin-top: 20px;}
  .modal {z-index: 99999999999;}
  .modal-body {overflow-y: auto;max-height: 440px;}
  #exampleModalCenterTitle {font-size: 20px;display: inline-block;line-height: 1.5;color: #000;}
  .close {font-size: 29px;}
  .btn-close {color: #fff;background-color: #6c757d;border-color: #6c757d;}
  .btn-close:hover {color: #fff;background-color: #5a6268;border-color: #545b62;}
  .modal-header, .modal-body, .modal-footer {padding: 15px 20px;}
  .modal-body li {margin-bottom: 30px;}
  .modal-body li:last-child {margin-bottom: 15px;}
  .modal-body img {width: 160px;}
  .modal-body p {height: 115px;}
  .ml9 {position: relative;font-size: 25px;display: inline-block;color: #143353;text-shadow: 1px 1px 2px #fff;}
  .ml9 .letter {transform-origin: 50% 100%;display: inline-block;line-height: 1em;}

  @media only screen and (max-width: 767px){
    .btn-result {margin-left: 0;margin-top: 20px;}
    .modal-body li p {margin-top: 8px;}
    .modal-body img {width: 100%;}
    .modal-body p {height: auto;}
  }
</style>

<?php
if($res_count == 0) { ?>

  <div class="card card-primary card-outline" style="margin-top:20px;">    
      <div class="card-body">  
        <div class="well" style="text-align: center; background: transparent;">
           <?php 
             if ($questions != NULL) {
             foreach ($questions as $key ) {}
             $xmid = $key->xmid;
             $xm = $this->Question_model->exam($xmid);
             foreach ($xm as $key => $xm) {}	
           ?>
           <h3> Exam Title : <?php echo $xm->title ; ?> </h3> <hr>
           <?php $sl = 0; foreach ($questions as $key => $question) {$sl++; } ?>
           <h5> Exam Time Remaining : <b> <span id="time"><?php echo $sl; ?> </span> </b> </h5>
           <p style="color:red;">( After Exam time new Question will be provide )</p>
        </div>

        <form method="post" action="<?php echo base_url();?>question/submit/<?php echo $xm->id ; ?>">

            <input type="hidden" name="limit" value="<?php echo $sl; ?>">
            <div class="row water-mark">
               <?php
                  $sl = 0;
                  foreach ($questions as $key => $question) {
                  	$sl++;
                  ?>
               <div class="col-sm-3">
                  <div class="panel panel-default">
                     <div class="panel-heading" >
                        <?php echo $sl .' : ' ; echo $question->content ?>
                     </div>
                     <div class="panel-body">
                        <input type="hidden" name="questionIds[]" value="<?php echo $question->id; ?>">
                        <ol type="A">
                           <?php foreach ($this->Question_model->findAnswersByQuestion($question->id) as $answer) { ?>
                           <li>
                              <input type="radio" required name="question_<?php echo $question->id; ?>" value="<?php echo $answer->id ;?>">
                              <?php echo $answer->content ?>
                           </li>
                           <?php } ?>
                        </ol>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <div class="col-sm-12">
                <input class="btn btn-primary" type="submit" value="Submit & View Result" >
               </div> 
               <?php 
                } else {
                  echo "No Question Found";
               } ?>
             </div>
        </form>
      </div>
    </div>

<!--	
   <form method="post" action="<?php echo base_url();?>question/submit">
   	<ol type="1" >
   		<?php foreach ($questions as $key => $question) { ?>
   
   			<li>
   				<?php echo $question->content ?>
   				<input type="hidden" name="questionIds[]" value="<?php echo $question->id; ?>">
   				<ol type="A">
   					<?php foreach ($this->Question_model->findAnswersByQuestion($question->id) as $answer) { ?>
   						<li>
   							<input type="radio"  name="question_<?php echo $question->id; ?>" value="<?php echo $answer->id ;?>">
   							<?php echo $answer->content ?>
   						</li>
   					<?php } ?>
   				</ol>
   			</li>
   
   		<?php } ?>
   	</ol>
   	<input type="submit" value="Submit Now" >
   </form>
   </div> -->

   <script type="text/javascript">
   function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration; 
        }
        else {
         time = 'Expired';
         time = duration;        
        }
        if(--duration < 1) {            
            location.reload();
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * <?php echo $sl ; ?> ,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>





<?php } else{ ?>





  <div class="text-center">
  <!-- Button trigger modal -->
  <div class="card card-primary card-outline" style="margin-top:20px; width: 100%;">    
      <div class="card-body">        
        <h4>You have already participated in this exam.</h4>
        <a href="#" class="btn btn-primary btn-result" data-toggle="modal" data-target="#exampleModalCenter">View Result</a>
      </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">View Result</h5>
        </div>
        <div class="modal-body">
          <?php 
          foreach ($questions as $key ) { }
          $xmid = $key->xmid ;
          $xm = $this->Question_model->exam($xmid);
          foreach ($xm as $key => $xm) { }
          ?>
          <div class="well" style="text-align: center; background: transparent;">
           <span> Exam No : <?php echo $xm->id; ?> </span>
           <h3> Exam Title : <?php echo $xm->title; ?> </h3> <hr>
           <h5 style="margin-bottom: 10px;"> Total Question : <b> <span><?php echo $res->total_ques; ?> </span> </b> </h5>
           <h5 style="margin-bottom: 10px;"> Correct Answer : <b> <span><?php echo $res->correct_ans; ?> </span> </b> </h5>
           <h5 style="margin-bottom: 10px;"> Wrong Answer : <b> <span><?php echo $res->wrong_ans; ?> </span> </b> </h5>
           <h5 style="margin-bottom: 10px;"> Result Status: <b> <span> <?php echo $res->res_status; ?> </span>
          
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
