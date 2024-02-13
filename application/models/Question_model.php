<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_model extends CI_Model {

	public function findAll($id,$limit)
	{	
		$this->db->where('xmid',$id);
		//$this->db->order_by('rand()'); 
		$this->db->order_by('id', 'RANDOM');	
		$this->db->limit($limit);
		return $this->db->get('question')->result();
	}

	public function findAnswersByQuestion($questionId)
	{
		$this->db->where('question_id',$questionId );	
		return $this->db->get('answer')->result();
	}

	public function findAnswersIdCorrect($questionId)
	{
		$this->db->where('question_id',$questionId );
		$this->db->where('correct', 1);
		return $this->db->get('answer')->row()->id;
	}


	public function find_course($id) {
		$this->db->select('*');
		$this->db->from('subjects as s');
		$this->db->where('s.id', $id);
		$this->db->join('course AS c', 'c.id = s.course_id');
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}

	public function find_subjects($id) {
		$this->db->select('*');
		$this->db->from('subjects as s');
		$this->db->where('s.course_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->num_rows();
		return $result;
	}





	public function exam($xmid)
	{
		$this->db->where('id',$xmid );
		return $this->db->get('exams')->result();
	}

	public function count_questions($id) {
		$this->db->select('*');
		$this->db->from('question');
		$this->db->where('xmid',$id);
		$query_result = $this->db->get();
		$result = $query_result->num_rows();
		return $result;
	}

	public function findAnswer($answerId) {
		$this->db->select('*');
		$this->db->from('answer');
		$this->db->where('id', $answerId);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}


	
	public function single_result($id) {
		$uid = $this->session->userdata('id');
		$this->db->from('result');
		$this->db->where('uid', $uid);
		$this->db->where('exm_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
    }	


	public function test_single_result($id) {
		$uid = $this->session->userdata('id');
		$this->db->from('test_result');
		$this->db->where('uid', $uid);
		$this->db->where('exm_id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
    }
   
   function courseinfo() {
		$uid = $this->session->userdata('id');
		$this->db->select('ce.*');
		$this->db->from('users as u');		
        $this->db->where('u.id', $uid);
		$this->db->join('course_enroll AS ce','ce.trainee_id = u.trainee_id');
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
    }
    
    function res_count($uid, $id){
        $this->db->where('uid', $uid);
        $this->db->where('exm_id', $id);
        return $this->db->get('result')->num_rows();            
    }    

    function test_res_count($uid, $id){
    	$date = date('d-m-Y');
        $this->db->where('uid', $uid);
        $this->db->where('exm_id', $id);
       // $this->db->where('res_date', date('d-m-Y',strtotime("yesterday".$date)));
        return $this->db->get('test_result')->num_rows();            
    }
    
    function win_res($uid){
        $this->db->where('uid', $uid);
        return $this->db->get('winners')->num_rows();            
    }

    function exam_winner($exm_id) {
		$this->db->select('*');
		$this->db->from('winners AS W');
		$this->db->join('users AS U', 'U.id = W.uid');
		$this->db->join('shipping AS S', 'S.uid = W.uid');
		$this->db->where('W.exm_id', $exm_id);
		$this->db->order_by('W.id', 'DESC');
		$this->db->limit(1);
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}

    function winner_result($uid){
        $this->db->where('uid', $uid);
        return $this->db->get('winners')->num_rows();            
    }
    
	public function top_results($id) {
		$this->db->select('R.*, U.name AS user_name');
		$this->db->from('result AS R');
		$this->db->join('users AS U', 'U.id = R.uid');
		$this->db->order_by('R.correct_ans', 'DESC');
		$this->db->where('R.exm_id', $id);
		$this->db->where('R.res_status', 'Passed');
		$this->db->limit(10);
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}



    
	public function trainee_info($uid) {
		$this->db->select('ee.*');
		$this->db->from('users AS u');
		$this->db->join('exam_enroll AS ee', 'ee.trainee_id = u.trainee_id');
		$this->db->where('u.id', $uid);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}    
	public function trainee_infor($uid) {
		$this->db->select('ee.*');
		$this->db->from('users AS u');
		$this->db->join('course_enroll AS ee', 'ee.trainee_id = u.trainee_id');
		$this->db->where('u.id', $uid);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}


	public function result_info($rdata) {
		$this->db->insert('result', $rdata);
	}


	public function add_mark_info($edata) {
		$this->db->insert('exam_marks', $edata);
	}
	public function update_mark_info($trainee_id, $mdata) {
		$this->db->where('trainee_id', $trainee_id);
		$this->db->update('exam_marks', $mdata);
	}
    
	public function enroll_info($id) {
		$this->db->select('ee.*');
		$this->db->from('users AS u');
		$this->db->join('exam_enroll AS ee', 'ee.trainee_id = u.trainee_id');
		$this->db->where('u.id', $id);
		$this->db->where('ee.status', 'Approved');
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}	

	public function test_enroll_info($id) {
		$this->db->select('ee.*');
		$this->db->from('users AS u');
		$this->db->join('course_enroll AS ee', 'ee.trainee_id = u.trainee_id');
		$this->db->where('u.id', $id);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}

	public function subjects($course_id) {
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->where('course_id', $course_id);
		$query_result = $this->db->get();
		$result = $query_result->result();
		return $result;
	}

	public function checkmarks($uid) {
		$this->db->select('em.*');
		$this->db->from('users AS u');
		$this->db->join('exam_marks AS em', 'em.trainee_id = u.trainee_id');
		$this->db->where('u.id', $uid);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}	

	public function testcheckmarks($uid) {
		$this->db->select('em.*');
		$this->db->from('users AS u');
		$this->db->join('test_exam_marks AS em', 'em.trainee_id = u.trainee_id');
		$this->db->where('u.id', $uid);
		$query_result = $this->db->get();
		$result = $query_result->row();
		return $result;
	}

}

