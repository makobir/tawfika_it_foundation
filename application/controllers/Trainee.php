<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Question_model', '', TRUE);
        $this->load->model('Exam_model', '', TRUE);
        $this->load->model('Institute_model', '', TRUE);
        $this->load->model('Wallet_model', '', TRUE);
        $admin_id = $this->session->userdata('id');
        if ($admin_id == NULL) {
            redirect('authenticator', 'refresh');
        } 
        if ($this->session->userdata('usertype') != 'trainee') {
            redirect('authenticator', 'refresh');
        }
        if ($this->session->userdata('usertype') == 'super_admin') {
            redirect('super_admin', 'refresh');
        }
        //$site = $this->Authenticator_model->site();
       // $this->data = array(
            //'theme' => $site->theme,
            //'type' => $site->type,
        //   'language' => $site->lang
       	// );
      	//  $this->lang->load('language',$this->data['language']);


		date_default_timezone_set("Asia/Dhaka");
		$this->data['now'] = date("d-m-Y h:i A");
		
		//echo date('y');
		//$x=11;
		//$value = str_pad($x,2,"0",STR_PAD_LEFT);
		// //echo $value;
		// echo $this->session->userdata('icode');
		// echo $this->session->userdata('id');
		// echo $this->session->userdata('usertype');
    }


	public function index()
	{
		$data = array();
		$data['menu'] = "";
		$data['title'] = "Home";
		$id = $this->session->userdata('trainee_id');
		$data['payment'] = $this->Institute_model->payment($id);
		$data['course'] = $this->Institute_model->courseinfo($id);
		$data['admit'] = $this->Exam_model->regiinfo($id);
		$data['exam'] = $this->Exam_model->admitinfo($id);
		$data['private'] = $this->load->view('back/trainee/pages/home',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}

	public function enroll()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Enroll";
		$data['private'] = $this->load->view('back/trainee/exams/index',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}	


	public function test_enroll()
	{
		$data = array();
		$data['menu'] = "";
		$data['title'] = "Test Exam";
		$data['private'] = $this->load->view('back/trainee/test/index',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}

	public function result()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Result";
		$data['private'] = $this->load->view('back/trainee/exams/result',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}


	public function marksheet()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Marksheet";
		$id = $this->session->userdata('trainee_id');
		$data['subject_result'] = $this->Exam_model->subjects_result($id);
		$data['trainee'] = $this->Exam_model->trainee_information($id);
		$data['private'] = $this->load->view('back/trainee/exams/marksheet',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}




	public function typingtest()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Typing Test";
		$data['private'] = $this->load->view('back/trainee/exams/typing',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}
	

	public function question_bank()
	{
		$data = array();
		$data['menu'] = "Question Bank";
		$data['title'] = "Question Bank";
		$cid = $this->Question_model->courseinfo();
		$id = $cid->course_id;
        $data['questions'] = $this->Super_admin_model->questionsby($id);
        $data['que'] = $this->Super_admin_model->questionsby($id);
		$data['private'] = $this->load->view('back/trainee/exams/question_bank',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}
	

	public function store_performance()
	{
		$data = array();
		$data['menu'] = "Exam";
		$data['title'] = "Profile";
		$data['private'] = $this->load->view('back/trainee/exams/store_performance',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}
	



	
	public function profile()
	{
		$data = array();
		$data['menu'] = "Settings";
		$data['title'] = "Profile";
		$data['private'] = $this->load->view('back/trainee/pages/profile',$data,true);	
		$this->load->view('back/trainee/index',$data);
	}
	







}


