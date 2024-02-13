<style type="text/css">
   .submit {
   padding: 5px 10px;
   }
   .panel-body {
   background: transparent ;
   }
   .panel-body:hover {
   background: transparent !important;
   }
</style>

 <?php 
  foreach ($questions as $key ) { }
 
  $xmid = $key->xmid ;
  $xm = $this->Question_model->exam($xmid);
  foreach ($xm as $key => $xm) { }

 // $uid = $this->session->userdata('id');

 ?>

   <div class="card card-primary card-outline" style="text-align: center;  width: 100%;">
  	 <span> Exam No : <?php echo $xm->id; ?> </span>
  	 <h3> Exam Title : <?php echo $xm->title; ?> </h3> <hr>
  	 <h5 style="margin-bottom: 10px;"> Total Question : <b> <span><?php echo $res->total_ques; ?> </span> </b> </h5>
  	 <h5 style="margin-bottom: 10px;"> Correct Answer : <b> <span><?php echo $res->correct_ans; ?> </span> </b> </h5>
  	 <h5 style="margin-bottom: 10px;"> Wrong Answer : <b> <span><?php echo $res->wrong_ans; ?> </span> </b> </h5>
     <h5 style="margin-bottom: 10px;"> Result Status: <b> <span>
      <?php
      if($res->res_status == "Passed"){
        echo "<font style='color: green;'>".$res->res_status."</font>";
      }else{
        echo "<font style='color: red;'>".$res->res_status."</font>";
      }
      ?>
     </span></b></h5>
     <h5 style="margin-bottom: 10px;"> Position : <b> <span>
      <?php
      // function get_position($uid) {
      //   $condition = " uid = $uid ";
      //   $sql = "SELECT id, correct_ans, FIND_IN_SET( (correct_ans), 
      //           ( SELECT GROUP_CONCAT( (correct_ans) ORDER BY correct_ans DESC )
      //           FROM result )) AS rank 
      //           FROM result 
      //           WHERE $condition";
      //   $ci = & get_instance();
      //   $result =  $ci->db->query($sql)->row();

      //   $rank = '';
      //   if(!empty($result)){
      //       $rank = $result->rank;
      //   }
                       
      //   if($rank == 1){
      //       return $rank.'st';
      //   }elseif($rank == 2){
      //      return $rank.'nd'; 
      //   }elseif($rank == 3){
      //      return $rank.'rd'; 
      //   }elseif($rank > 3 ){
      //       return $rank.'th';         
      //   }else{
      //       return '--'; 
      //   }
      // }

      //$position = get_position($uid);

      if($res->res_status == "Failed"){
        echo "--";
      }else{
        echo $position;
      }
      ?> 
     </span> </b> </h5>
   </div>

<!--  <div class="row">
     <div class="col-sm-12"><h4 style="margin-bottom: 10px;"> Answers : </h4> </div>
     <?php
        $no = 0;
        $all_ans = array();
        foreach ($_POST['questionIds'] as $questionId ) {
          $no++;
          $answerId = $_POST['question_'.$questionId];
          $answer = $this->Question_model->findAnswer($answerId);
          $all_ans[] = $answer->content;
        }
      ?>
 </div>
      -->
 <!-- <div class="row">
    <?php
      $sl = 0;
      foreach ($questions as $key => $question) {
      $sl++;
    ?>
    <div class="col-sm-4">
      <div class="panel panel-default">
         <div class="panel-heading" >
            <?php echo $sl .' : ' ; echo $question->content ?>
         </div>
         <div class="panel-body">
            <input type="hidden" name="questionIds[]" value="<?php echo $question->id; ?>">
            <ol type="A">
               <?php foreach ($this->Question_model->findAnswersByQuestion($question->id) as $answer) { ?>
               <li>
                  <input type="radio" name="question_<?php echo $question->id; ?>" value="<?php echo $answer->id ;?>" required <?php if($answer->correct == 1){echo "checked";} ?> disabled>
                  <?php
                  $s = ($sl-1);
                  if($answer->correct == 1 || $all_ans[$s] == $answer->content && $answer->correct == 1){
                    echo "<font style='color: green;'>".$answer->content."</font>";
                  }elseif($all_ans[$s] == $answer->content && $answer->correct != 1){
                    echo "<font style='color: red;'>".$answer->content."</font>";
                  }else{
                    echo $answer->content;
                  }
                  ?>
               </li>
               <?php } ?>
            </ol>
         </div>
      </div>
    </div>
   <?php } ?>
 </div> -->
