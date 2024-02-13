<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Exam_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $admin_id = $this->session->userdata('id');
        $usertype = $this->session->userdata('usertype');
        if ($admin_id == NULL and $usertype != 'super_admin' ) {
            redirect('authenticator', 'refresh');
        }
        if ($usertype != 'super_admin' ) {
            redirect('authenticator/thanks', 'refresh');
        }
        $site = $this->Authenticator_model->site();
        $this->data = array(
            //'theme' => $site->theme,
            //'type' => $site->type,
         //   'language' => $site->lang
        );
      //  $this->lang->load('language',$this->data['language']);


		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		//echo $this->data['now'];
		//echo $usertype;
    }





	public function trainee()
	{
		$data = array();
		$data['menu'] = "Exam Management";
		$data['title'] = "Trainee";
		$data['private'] = $this->load->view('back/exam/trainee',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function trainee_edit($id)
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Trainee Edit";
		$data['trainee'] = $this->Exam_model->trainee_information($id);
		$data['private'] = $this->load->view('back/exam/trainee',$data,true);	
		$this->load->view('back/index',$data);
	}

	function update_trainee($id) {
		$data['name'] = $this->input->post('name',true);
		$data['father'] = $this->input->post('father',true);
		$data['mother'] = $this->input->post('mother',true);
		$this->db->where('regi',$id);
		$this->db->update('trainee',$data);
		$sdata['message'] = 'Trainee Info Updated!';
		$this->session->set_userdata($sdata);
		redirect('exam/trainee_edit/'.$id);
	}



	public function examinee()
	{
		$data = array();
		$data['menu'] = "Exam Management";
		$data['title'] = "Passed";
		$data['private'] = $this->load->view('back/exam/examinee',$data,true);	
		$this->load->view('back/index',$data);
	}

	

	public function marksheet($id)
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Marksheet";
		$data['subject_result'] = $this->Exam_model->subjects_result($id);
		$data['trainee'] = $this->Exam_model->trainee_information($id);
		$data['private'] = $this->load->view('back/certificate/marksheet',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function marks_edit($id)
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Marksheet";
		$data['subject_result'] = $this->Exam_model->subjects_result($id);
		$data['trainee'] = $this->Exam_model->trainee_information($id);
		$data['private'] = $this->load->view('back/exam/marks_edit',$data,true);	
		$this->load->view('back/index',$data);
	}

	public function marksupdate() {
		$id = $this->input->post('trainee_id');
		if($this->input->post('course_id') == 1 || $this->input->post('course_id') == 2 || $this->input->post('course_id') == 3 ) {
			if($this->input->post('attendance') <= 20 ){ 
				$m['attendance'] = $this->input->post('attendance');
			}else {
				$sdata['message'] = 'Attendance Marks should not larger than 20';
			}if($this->input->post('typing') <= 20 ){ 
				$m['typing'] = $this->input->post('typing');
			}else {
				$sdata['message'] = 'Typing Test Marks should not larger than 20';
			}	if($this->input->post('viva') <= 20 ){ 
				$m['viva'] = $this->input->post('viva');
			}else {
				$sdata['message'] = 'Viva Marks should not larger than 20';
			}if($this->input->post('practical') <= 80 ){ 
				$m['practical'] = $this->input->post('practical');
			}else {
				$sdata['message'] = 'Practical Marks should not larger than 80';
			}

			if($this->input->post('attendance') <= 20 && $this->input->post('typing') <= 20 && $this->input->post('viva') <= 20 && $this->input->post('practical') <= 80   ) {
				
				$this->db->where('trainee_id',$id);
				$this->db->update('exam_marks',$m);
				$sdata['message'] = 'Marks Updated!';
				$this->session->set_userdata($sdata);
				redirect('exam/examinee');
			}else {
				$this->session->set_userdata($sdata);
				redirect('exam/marks_edit/'.$id);
			}
		
		} 
		//====================== To others courses ============================
		else {
			if($this->input->post('attendance') <= 20 ){ 
				$m['attendance'] = $this->input->post('attendance') ;
			}else {
				$sdata['message'] = 'Attendance Marks should not larger than 20';
			}if($this->input->post('viva') <= 20 ){ 
				$m['viva'] = $this->input->post('viva');
			}else {
				$sdata['message'] = 'Viva Marks should not larger than 20';
			}if($this->input->post('practical') <= 100 ){ 
				$m['practical'] = $this->input->post('practical');
			}else {
				$sdata['message'] = 'Practical Marks should not larger than 100';
			}

			if($this->input->post('attendance') <= 20 || $this->input->post('viva') <= 20 || $this->input->post('practical') <= 100   ) {
				
				$this->db->where('trainee_id',$id);
				$this->db->update('exam_marks',$m);
				$sdata['message'] = 'Marks Updated!';
				$this->session->set_userdata($sdata);
				redirect('exam/examinee');
			}else {
				$this->session->set_userdata($sdata);
				redirect('exam/marks_edit/'.$id);
			}
		}
	}




    function delete_examinee($id) {
        $this->Exam_model->delete_examinee($id);
        redirect('exam/examinee');
    }































	public function download($fileName = NULL) {   
	   if ($fileName) {
	    $file = realpath ( "download" ) . "\\" . $fileName;
	    // check file exists    
	    if (file_exists ( $file )) {
	     // get file content
	     $data = file_get_contents ( $file );
	     //force download
	     force_download ( $fileName, $data );
	    } else {
	     // Redirect to base url
	     redirect ( base_url ('super_admin/myList') );
	    }
	   }
	  }











}


