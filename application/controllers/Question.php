<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	 public function __construct() {
        parent::__construct();        
        $this->load->model('Question_model', '', TRUE);
       
        $admin_id = $this->session->userdata('id');
        if ($admin_id == NULL && $this->session->userdata('usertype') == 'branch') {
            redirect('authenticator', 'refresh');
        }
        if ($this->session->userdata('usertype') == 'super_admin') {
            redirect('super_admin', 'refresh');
        }
    }

public function mcq($id)
{
    
    //=== Check enroll Status =====================
    
        // $type = 'exam';
        // $eid = $id;
        // $check = $this->Studypoints_model->check_enroll($type,$eid);
        // if ($check == null) {  
        //     $ldata = array();        
        //     $ldata['exam'] = $id;
        //     $ldata['uid'] = $this->session->userdata('uid');
        //     $this->Checkout_model->saveEnroll2($ldata);
        // }

    $data = array();
    $data['menu'] = 'Studypoint Exam';
    $data['title'] = 'Exam';
    $data['sub'] = 'Exam';
    $data['view'] = 'Exam';
    $data['res'] = $this->Question_model->single_result($id);

    $find_course = $this->Question_model->find_course($id);
    if(isset($find_course )){
        $find_subjects = $this->Question_model->find_subjects($find_course->course_id);
        $limit = 50 / $find_subjects;
    } else  { 
        $limit = 10;
    };
    $data['questions']= $this->Question_model->findAll($id,$limit);
    $data['limit']= $limit;
    $uid = $this->session->userdata('id');
    $data['res_count'] = $this->Question_model->res_count($uid, $id);
    $data['private'] = $this->load->view('back/trainee/question/index', $data, true);
    $this->load->view('back/trainee/index', $data);
	
}



public function submit($id)
{
    error_reporting(0);
	$score = 0;
	foreach ($_POST['questionIds'] as $questionId ) {
		if($this->Question_model->findAnswersIdCorrect($questionId) == $_POST['question_'.$questionId]) {
			$score++;
		}
	}
    
    $limit = $_POST['limit'];
	$data = array();
    $data['menu'] = 'Exam';
    $data['sub'] = 'Result'; 
   // $data['questions'] = $this->Question_model->findAll($id);
	$data['score'] = $score;
    $score = $data['score'];

    date_default_timezone_set('Asia/Dhaka');
    $res_date = date('d-m-Y');
    $rdata = array();
    $rdata['uid'] = $this->session->userdata('id');
    $rdata['exm_id'] = $id;
    $rdata['total_ques'] = $_POST['limit'];
    $rdata['correct_ans'] = $score;
    $rdata['wrong_ans'] = ($limit-$score);
    $pass_score = ($limit*50)/100;
    if ($score >= $pass_score) {
        $rdata['res_status'] = 'Passed';
    } else {
        $rdata['res_status'] = 'Failed';
    }
    $rdata['res_date'] = $res_date;

     $uid = $this->session->userdata('id');
     $exam_id = $id;
     $res = $this->Question_model->single_result($id);

     if($uid != $res->uid && $exam_id != $res->exm_id){

       $this->Question_model->result_info($rdata);

       $trainee = $this->Question_model->trainee_info($uid);

       $marks = $this->Question_model->checkmarks($uid);
       if (isset($marks)) {
        $mdata['mcq'] = $marks->mcq + $score; 
       } else {
        $edata['mcq'] = $score;
       }       
       $edata['trainee_id'] = $trainee->trainee_id;
       $edata['roll'] = $trainee->roll;
       if (isset($marks)) {
            $trainee_id = $marks->trainee_id;
            $this->Question_model->update_mark_info($trainee_id, $mdata);
        }else {
            $this->Question_model->add_mark_info($edata);
        }
     }else{
        redirect('question/mcq/'.$id);
     }
    $data['res'] = $this->Question_model->single_result($id); 
	$data['private'] = $this->load->view('back/trainee/question/result', $data, true);
    $this->load->view('back/trainee/index', $data);
}







public function testmcq($id)
{
    
    //=== Check enroll Status =====================
    
        // $type = 'exam';
        // $eid = $id;
        // $check = $this->Studypoints_model->check_enroll($type,$eid);
        // if ($check == null) {  
        //     $ldata = array();        
        //     $ldata['exam'] = $id;
        //     $ldata['uid'] = $this->session->userdata('uid');
        //     $this->Checkout_model->saveEnroll2($ldata);
        // }

    $data = array();
    $data['menu'] = 'Studypoint Exam';
    $data['title'] = 'Exam';
    $data['sub'] = 'Exam';
    $data['view'] = 'Exam';
    $data['res'] = $this->Question_model->test_single_result($id);

    $find_course = $this->Question_model->find_course($id);
    if(isset($find_course )){
        $find_subjects = $this->Question_model->find_subjects($find_course->course_id);
        $limit = 50 / $find_subjects;
    } else  { 
        $limit = 10;
    };
    $data['questions']= $this->Question_model->findAll($id,$limit);
    $data['limit']= $limit;
    $uid = $this->session->userdata('id');
    $data['res_count'] = $this->Question_model->test_res_count($uid, $id);
    $data['private'] = $this->load->view('back/trainee/test_question/index', $data, true);
    $this->load->view('back/trainee/index', $data);    
}

public function submitTest($id)
{
    error_reporting(0);
    $score = 0;
    foreach ($_POST['questionIds'] as $questionId ) {
        if($this->Question_model->findAnswersIdCorrect($questionId) == $_POST['question_'.$questionId]) {
            $score++;
        }
    }
    
    $limit = $_POST['limit'];
    $data = array();
    $data['menu'] = 'Exam';
    $data['sub'] = 'Result'; 
   // $data['questions'] = $this->Question_model->findAll($id);
    $data['score'] = $score;
    $score = $data['score'];

    date_default_timezone_set('Asia/Dhaka');
    $res_date = date('d-m-Y');
    $rdata = array();
    $rdata['uid'] = $this->session->userdata('id');
    $rdata['exm_id'] = $id;
    $rdata['total_ques'] = $_POST['limit'];
    $rdata['correct_ans'] = $score;
    $rdata['wrong_ans'] = ($limit-$score);
    $pass_score = ($limit*50)/100;
    if ($score >= $pass_score) {
        $rdata['res_status'] = 'Passed';
    } else {
        $rdata['res_status'] = 'Failed';
    }
    $rdata['res_date'] = $res_date;

     $uid = $this->session->userdata('id');
     $exam_id = $id;
     $res = $this->Question_model->test_single_result($id);

     if($uid != $res->uid && $exam_id != $res->exm_id){
       $this->db->insert('test_result', $rdata);
       $trainee = $this->Question_model->trainee_info($uid);

       $marks = $this->Question_model->testcheckmarks($uid);
       if (isset($marks)) {
        $mdata['mcq'] = $marks->mcq + $score; 
       } else {
        $edata['mcq'] = $score;
       }
       if($trainee != NULL) {
        $edata['trainee_id'] = $trainee->trainee_id;
        $edata['roll'] = $trainee->roll;
       } else {        
        $trainee = $this->Question_model->trainee_infor($uid);
        $edata['trainee_id'] = $trainee->trainee_id;
        $edata['roll'] = 0;
       }
       

       if (isset($marks)) {
            $trainee_id = $marks->trainee_id;
            $this->db->where('trainee_id', $trainee_id);
            $this->db->update('test_exam_marks', $mdata);
        }else {            
            $this->db->insert('test_exam_marks', $edata);
        }
     }else{
        redirect('question/testmcq/'.$id);
     }
    $data['res'] = $this->Question_model->test_single_result($id); 
    $data['private'] = $this->load->view('back/trainee/question/result', $data, true);
    $this->load->view('back/trainee/index', $data);
}

public function delete_test_result($id,$emx)
{
   $this->db->where('id',$id);
   $this->db->delete('test_result');
   redirect('question/testmcq/'.$emx);
}












}



